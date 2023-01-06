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
    public function getAllDevices(): Collection
    {
        $response = Http::get(Route('devices.index'));

        if ($response->status() > 200)
        {
            throw new ApiErrorException($response->getErrorMessage());
        }

        $data = collect(json_decode($response->json()));
        
        return $data;
    }

    public function getDevice(int $id)
    {
        $response = Http::get(Route('devices.show', $id));

        if ($response->status() > 200)
        {
            throw new ApiErrorException($response->getErrorMessage());
        }

        $data = json_decode($response->json());
        
        // dd($data);

        return $data;
    }
    
    public function updateDevice(array $deviceDetails):bool
    {
        $response = Http::withHeaders([
            // 'Authorization' => Auth::user()->tokens->last()->token
        ])->put(Route('devices.update', $deviceDetails['id']), ['json' => json_encode($deviceDetails)]);

        if ($response->status() > 200)
        {
            dd($response->reason());
            throw new ApiErrorException($response->reason());
        }

        return true;
    }

    public function deleteDevice(int $deviceId)
    {
        $response = Http::withHeaders([
            // 'Authorization' => Auth::user()->tokens->last()->token
        ])->delete(Route('devices.destroy', $deviceId));

        if ($response->status() > 200)
        {
            throw new ApiErrorException($response->reason());
        }

        return true;
    }
}