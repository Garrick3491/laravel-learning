<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\UploadHandler\CsvHandler;
use League\Csv\Statement;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\DeviceHandler\DeviceUploadHandler;
use App\Providers\RouteServiceProvider;
use App\Jobs\ProcessDevice;
use App\Http\Controllers\Session;
use App\Models\File;
use Database\Factories\FileFactory;
use Illuminate\Support\Facades\Storage;

class DeviceUploadController extends Controller
{
    public function uploadFile(Request $request, DeviceUploadHandler $uploadHandler, CsvHandler $csvHandler, FileFactory $fileFactory)
    {
        $request->validate([
            'file' => 'mimes:csv'
        ]);

        $file = $request->file('file');

        $fileName = $csvHandler->saveCsvAndReturnFileName($file, $request->user()->id);

        $csv = $csvHandler->getFileForFileName($fileName);

        $modelFile = $fileFactory->createFromArray(
            [
                'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'location' => $fileName,
                'user_id' => Auth::user()->id,
                'expected_device_count' => count($csv)
            ]
        );

        return redirect()->route('approve-list', $modelFile);
    }

    public function approveList(Request $request, File $file, CsvHandler $csvHandler)
    {
        $page = $request->get('page') ?: 1;
        $csv = $csvHandler->getFileForFileName($file->location);


        $devices = collect($csv)->forPage($page, 10);

        if ($page == 1)
        {
            $previousLink = null;
        }
        else {
            $previousPage = $page - 1;
            $previousLink = url()->current() . '?page=' . $previousPage;
        }

        if ($page * 10 >= $file->expected_device_count)
        {
            $nextLink = null;
        }
        else {
            $nextPage = $page + 1;
            $nextLink = url()->current() . '?page=' . $nextPage;
        }

        $links = [
            'previous' => ['url' => $previousLink, 'label' => '&laquo; Previous'],
            'next' => ['url' => $nextLink, 'label' => 'Next &raquo;']
        ];


        return view('approve', [
            'devices' => $devices,
            'recordCount' => $file->expected_device_count,
            'csvJson' => json_encode($csv),
            'links' => $links,
            'file' => $file
        ]);
    }

    public function approvedFile(Request $request, File $file, DeviceUploadHandler $uploadHandler, CsvHandler $csvHandler)
    {
        $csv = $csvHandler->getFileForFileName($file->location);

        $numberOfJobsPerMin = 25;

        $runNumber = 0;

        $cycle = 1;

        $delay = 1;
        
        foreach ($csv as $deviceRecord)
        {

            $deviceRecord['file_id'] = $file->id;

            if (!array_filter($deviceRecord))
            {
                continue;
            }

            if ($runNumber % $numberOfJobsPerMin == 0)
            {
                $delay = 60 * $cycle;
                $cycle += 1;
            }


            ProcessDevice::dispatch(json_encode($deviceRecord))->delay($delay);
            $runNumber += 1;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    
    public function deleteFile(File $file)
    {
        Storage::delete($file->location);
        $file->delete();

        return redirect()->route('dashboard');
    }
}
