<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;


Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('auth/refresh', [AuthController::class, 'refresh']);

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);

Route::post('forget-password', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::middleware('api')->group(function () {
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});
Route::middleware('auth:api')->group(function () {
    Route::get('auth/me', [AuthController::class, 'getMe']);

    // Admin có thể xóa user
    Route::apiResource('users', UserController::class)->except(['destroy']);
    Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware('admin');

    // Route::apiResource('user-profile', UserProfileController::class);
});

Route::middleware(['auth:api', 'role:admin,super-admin'])->group(function () {
    Route::apiResource('user-profile', UserProfileController::class)->except(['store', 'destroy']);
});
