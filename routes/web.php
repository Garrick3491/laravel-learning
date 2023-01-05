<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceUploadController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/device-upload', [
    DeviceUploadController::class, 'uploadFile'
])->middleware(['auth', 'verified'])->name('device-upload');


Route::post('/tokens/create', function(Request $request) {
    $token = $request->user()->createToken('api_key');

    return ['token' => $token];
});

require __DIR__.'/auth.php';
