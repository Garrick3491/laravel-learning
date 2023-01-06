<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\UploadHandler\CsvHandler;
use League\Csv\Statement;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\DeviceHandler\DeviceUploadHandler;
use App\Providers\RouteServiceProvider;

class DeviceUploadController extends Controller
{
    public function uploadFile(Request $request, DeviceUploadHandler $uploadHandler, CsvHandler $csvHandler)
    {
        $request->validate([
            'file' => 'mimes:csv'
        ]);

        $file = $request->file('file');

        $json = $csvHandler->saveCsvAndConvertToJson($file, $request->user()->id);

        $successMessage = $uploadHandler->uploadDevices($json);
        
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
