<?php

use App\Http\Controllers\AuthAPIController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthAPIController::class, 'login']);
Route::post('register', [AuthAPIController::class, 'register']);
Route::post('forgot-password', [AuthAPIController::class, 'forgotPassword']);
Route::post('reset-password', [AuthAPIController::class, 'resetPassword']);
Route::post('logout', [AuthAPIController::class, 'logout']);
