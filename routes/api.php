<?php

use App\Http\Controllers\API\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\DeviceController;
use App\Http\Controllers\API\CategoryController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function(): void{
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('forgot_password', 'forgotPassword');
    Route::get('reset_password/{token}', 'resetPassword');
});

Route::get('categories', [CategoryController::class, 'index']);

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(UserController::class)->group(function(){
    Route::get('user', 'getUser');
    Route::post('user/upload_avatar', 'uploadAvatar');
    Route::delete('user/remove_avatar','removeAvatar');
    Route::post('user/send_verification_email','sendVerificationEmail');
    Route::post('user/change_email', 'changeEmail');
    Route::post('user/add_device_to_collection/{deviceId}', [UserController::class, 'addDeviceToCollection']);
    Route::delete('user/remove_from_collection/{deviceId}', [UserController::class, 'removeFromCollection']);
    Route::get('user/collection', [UserController::class, 'getCollection']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('books', BookController::class);
    
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('devices', DeviceController::class);
    Route::post('device/{id}/upload_picture', [DeviceController::class, 'uploadPicture']);
    Route::delete('device/{id}/remove_picture', [DeviceController::class, 'removePicture']);
});

