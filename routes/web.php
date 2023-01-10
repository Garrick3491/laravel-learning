<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceUploadController;
use App\Http\Controllers\DeviceController;
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
Route::get('/device/{id}', [DeviceController::class, 'viewDevice'])->middleware(['auth', 'verified'])->name('view-device');

Route::post('/device-upload', [
    DeviceUploadController::class, 'uploadFile'
])->middleware(['auth', 'verified'])->name('device-upload');

Route::post('/device-upload/approve', [
    DeviceUploadController::class, 'approvedFile'
])->middleware(['auth', 'verified'])->name('device-upload-approve');


Route::post('/tokens/create', function(Request $request) {
    $token = $request->user()->createToken('api_key');

    return ['token' => $token->plainTextToken];
});

Route::get('/device/{id}/update', [DeviceController::class, 'updateDeviceForm'])->middleware(['auth', 'verified'])->name('update-device-form');
Route::post('/device/{id}/update', [DeviceController::class, 'updateDevicePost'])->middleware(['auth', 'verified'])->name('update-device-post');
Route::get('/device/{id}/delete', [DeviceController::class, 'deleteDevice'])->middleware(['auth', 'verified'])->name('delete-device');

require __DIR__.'/auth.php';
