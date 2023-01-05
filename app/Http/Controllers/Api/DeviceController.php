<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Providers\RouteServiceProvider;

class DeviceController extends Controller
{
    public function index()
    {
        dd('inside');
        $devices = Device::all();

        return $response->json($devices, 200);
    }

    public function store(Request $request)
    {
        $json = $request->get('json');
        $devices = json_decode($json);

        echo 'I AM IN THE API!';

        return $response->json(null, 500);

    }

    public function show(Device $device)
    {
        return $response->json($device, 200);
    }

    public function destroy(Device $device)
    {
        $device->delete();

        return response()->json(null, 200);
    }

    public function update(Request $request, Device $device)
    {

    }
}
