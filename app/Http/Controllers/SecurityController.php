<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function login()
    {
        return view('security.login');
    }
}
