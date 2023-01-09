<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeviceHandler\ApiDeviceHandler;

class DeviceController extends Controller
{
    public function viewDevice($id, ApiDeviceHandler $deviceHandler)
    {
        $device = $deviceHandler->getDevice($id);

        return view('view-device', [
            'device' => $device
        ]);
    }
    
    public function updateDeviceForm($id, ApiDeviceHandler $deviceHandler)
    {

        $device = $deviceHandler->getDevice($id);

        return view('edit-device', [
            'device' => $device
        ]);
    }

    public function updateDevicePost(Request $request, ApiDeviceHandler $deviceHandler)
    {
        $attributes = $request->validate([
            'id' => 'required|min:1',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'longitude' => 'required|max:255',
            'latitude' => 'required|max:255',
            'device_type' => 'required|max:255',
            'manufacturer' => 'required|max:255',
            'model' => 'required|max:255',
            'install_date' => 'required|max:255',
            'notes' => 'required|max:255',
            'eui' => 'required|max:255',
            'serial_number' => 'required|max:255'
        ]);

        $updateSuccess = $deviceHandler->updateDevice($attributes);

        if ($updateSuccess)
        {
            return redirect()->to('/');
        }
    }

    public function deleteDevice($id, ApiDeviceHandler $deviceHandler)
    {
        $success = $deviceHandler->deleteDevice($id);

        if ($success)
        {
            return redirect()->to('/');
        }
    }

}
