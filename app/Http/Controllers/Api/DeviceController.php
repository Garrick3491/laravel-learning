<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Providers\RouteServiceProvider;
use Database\Factories\DeviceFactory;
use App\Exceptions\Api\MissingDataException;
use Illuminate\Support\Facades\Route;
use App\Models\File;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::paginate(10);

        $devices->withPath(Route('dashboard'));

        return response()->json($devices->toJson(), 200);
    }

    public function store(Request $request, DeviceFactory $deviceFactory)
    {
        $json = $request->get('json');
        $device = json_decode($json, true);

        try {
            $deviceFactory->createFromArray($device);
        }
        catch(MissingDataException $e)
        {
            return response()->json('Row ' . $device['name'] . ' caused an error with missing data for column: ' . $e->getMessage(), 500);
        }
        

        return response()->json(null, 200);

    }

    public function show(Device $device)
    {
        return response()->json($device->toJson(), 200);
    }

    public function destroy(Device $device)
    {
        $device->delete();

        return response()->json(null, 200);
    }

    public function update(Request $request, Device $device)
    {
        $data = json_decode($request->get('json'), true);
        $device->update($data);
        $device->save();

        return response()->json(null, 200);        
    }
}
