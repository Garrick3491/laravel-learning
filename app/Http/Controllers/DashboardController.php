<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\DeviceHandler\ApiDeviceHandler;
use App\Exceptions\Api\ApiErrorException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request, ApiDeviceHandler $deviceHandler)
    {
        try {
            $page = $request->get('page') ?: 1;

            $pagination = $deviceHandler->getAllDevices($page);

            if ($pagination)
            {
                $devices = $pagination->data;

                $links = $pagination->links;
            }
            else {
                $devices = [];
                $links = [];
            }
        }
        catch(ApiErrorException $e)
        {
            Session::flash('error', $e->getMessage());

            $devices = [];
            $links = [];
        }

        return view('dashboard', [
            'devices' => $devices,
            'links' => $links
        ]);
    }
}
