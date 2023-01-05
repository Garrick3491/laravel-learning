<?php

namespace App\FileUpload;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class UploadHandler
{
    public function uploadDevices(string $json): string
    {
        dd(Route('devices.store'));

        $response = Http::withHeaders([
            'Authorization' => Auth::user()->tokens->last()->token
        ])->post(Route('devices.store'), ['json' => $json]);

        if ($response->status() > 200)
        {
            return $response->getErrorMessage();
        }

        return 'Success!';
    }
}