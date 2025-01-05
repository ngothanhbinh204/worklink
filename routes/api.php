<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YourController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
// use App\Http\Controllers\Api\AuthController;

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);

Route::middleware('auth:api')->group(function () {
    Route::get('auth/me', [AuthController::class, 'getMe']);
});