<?php

use App\Http\Controllers\AuthAPIController;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('login', [AuthAPIController::class, 'login']);
Route::post('register', [AuthAPIController::class, 'register']);
Route::post('forgot-password', [AuthAPIController::class, 'forgotPassword']);
Route::post('reset-password', [AuthAPIController::class, 'resetPassword']);
Route::post('logout', [AuthAPIController::class, 'logout']);

//Courses Routes
Route::post('courses', [APIController::class, 'getCourses']);
Route::post('course', [APIController::class, 'getIndividualCourse']);
Route::post('professors', [APIController::class, 'getProfessors']);
Route::post('professor', [APIController::class, 'getIndividualProfessor']);