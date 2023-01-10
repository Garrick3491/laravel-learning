<?php

namespace App\DeviceHandler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use Illuminate\Support\Collection;
use App\Exceptions\Api\ApiErrorException;

class ApiDeviceHandler
{
    // Returns a collection of Devices
    public function getAllDevices(int $page = 1): ?\StdClass
    {
        $response = Http::
        // withToken(Auth::user()->tokens->last()->token)->accept('application/json')->
        get(Route('devices.index') . '?page=' . $page . '&token=' . env('API_KEY'));

        if ($response->status() > 200)
        {
            if (gettype(json_decode($response->body())) == 'string')
            {
                throw new ApiErrorException(json_decode($response->body()));        
            }

            throw new ApiErrorException('Something has gone wrong: ' . $response->reason());
        }

        $data = json_decode($response->json());
        
        return $data;
    }

    public function getDevice(int $id): \StdClass
    {
        $response = Http::withToken(Auth::user()->tokens->last()->token)->get(Route('devices.show', $id), ['token' => env('API_KEY')]);

        if ($response->status() > 200)
        {
            throw new ApiErrorException(json_decode($response->body())->message);
        }

        $data = json_decode($response->json());
        
        return $data;
    }
    
    public function updateDevice(array $deviceDetails):bool
    {
        $response = Http::withToken(Auth::user()->tokens->last()->token)->put(Route('devices.update', $deviceDetails['id']), ['json' => json_encode($deviceDetails),'token' => env('API_KEY')]);

        if ($response->status() > 200)
        {
            throw new ApiErrorException(json_decode($response->body())->message);
        }

        return true;
    }

    public function deleteDevice(int $deviceId): bool
    {
        $response = Http::withToken(Auth::user()->tokens->last()->token)->delete(Route('devices.destroy', $deviceId), ['token' => env('API_KEY')]);

        if ($response->status() > 200)
        {
            throw new ApiErrorException(json_decode($response->body())->message);
        }

        return true;
    }
}