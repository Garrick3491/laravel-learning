<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\FileUpload\UploadHandler;
use App\Providers\RouteServiceProvider;

class DeviceUploadController extends Controller
{
    public function uploadFile(Request $request, UploadHandler $uploadHandler)
    {
        $request->validate([
            'file' => 'mimes:csv|max:2048'
        ]);

        $file = $request->file('file');

        $destinationPath = 'uploads';
        Storage::put('uploads/'.$request->user()->id .'/' . $file->getClientOriginalName(), file_get_contents($file->getRealPath()));

        $string = Storage::get('uploads/'.$request->user()->id .'/' . $file->getClientOriginalName());

        $csv = Reader::createFromString($string);
        $csv->setHeaderOffset(0);

        $json = json_encode($csv);

        $successMessage = $uploadHandler->uploadDevices($json);
        
        dd($successMessage);

        if ($successMessage = 'Success!')
        {
            Session::flash('sucess', 'The device upload was successful!');
        }
        else {
            Session::flash('error', $success);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
