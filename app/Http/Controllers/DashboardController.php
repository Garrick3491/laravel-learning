<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DashboardController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('dashboard', [
            'devices' => $devices
        ]);
    }
}
