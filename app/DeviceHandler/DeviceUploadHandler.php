<?php

namespace App\DeviceHandler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class DeviceUploadHandler
{
    public function uploadDevices(string $json): string
    {
        $response = Http::withHeaders([
            // 'Authorization' => Auth::user()->tokens->last()->token
        ])->post(Route('devices.store'), ['json' => $json]);

        if ($response->status() > 200)
        {
            return $response->body();
        }

        return 'Success!';
    }
}