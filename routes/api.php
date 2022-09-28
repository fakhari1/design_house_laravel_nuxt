<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest:api')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('verification/verify', [VerificationController::class, 'verify']);
    Route::post('verification/resend', [VerificationController::class, 'resend']);
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {

});
