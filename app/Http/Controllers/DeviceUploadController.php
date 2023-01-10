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

class DeviceUploadController extends Controller
{
    public function uploadFile(Request $request, DeviceUploadHandler $uploadHandler, CsvHandler $csvHandler)
    {
        $request->validate([
            'file' => 'mimes:csv'
        ]);

        $file = $request->file('file');

        $csv = $csvHandler->saveCsvAndReturnArrayOfRecords($file, $request->user()->id);


        return view('approve', [
            'filename' => $file->getClientOriginalName(),
            'recordCount' => count($csv),
            'csvJson' => json_encode($csv)
        ]);
    }

    public function approvedFile(Request $request, DeviceUploadHandler $uploadHandler)
    {
        $csv = json_decode($request->get('csv'), true);

        $numberOfJobsPerMin = 25;

        $runNumber = 0;

        $cycle = 1;

        $delay = 1;

        foreach ($csv as $deviceRecord)
        {

            if (!array_filter($deviceRecord))
            {
                continue;
            }

            if ($runNumber % $numberOfJobsPerMin == 0)
            {
                $delay = 30 * $cycle;
                $cycle += 1;
            }
            // dd(json_encode($deviceRecord));
            // dispatch(new ProcessDevice(json_encode($deviceRecord)));
            ProcessDevice::dispatch(json_encode($deviceRecord), Auth::user()->tokens->last()->token)->delay($delay);
            $runNumber += 1;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
