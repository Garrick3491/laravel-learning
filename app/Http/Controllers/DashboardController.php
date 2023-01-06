<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\DeviceHandler\ApiDeviceHandler;
use App\Exceptions\Api\ApiErrorException;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(ApiDeviceHandler $deviceHandler)
    {
        try {
            $devices = $deviceHandler->getAllDevices();
        }
        catch(ApiErrorException $e)
        {
            Session::flash('error', $e->getMessage());

            $devices = [];
        }

        return view('dashboard', [
            'devices' => $devices
        ]);
    }
}
