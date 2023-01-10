<?php

namespace App\DeviceHandler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class DeviceUploadHandler
{
    public function uploadDevice(string $json): string
    {
        $response = Http::withToken(Auth::user()->tokens->last()->token)->post(Route('devices.store'), ['json' => $json]);

        if ($response->status() > 200)
        {
            return $response->body();
        }

        return 'Success!';
    }
}