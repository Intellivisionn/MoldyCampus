<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthAPIController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthAPIController::class, 'login']);
Route::post('register', [AuthAPIController::class, 'register']);
Route::post('forgot-password', [AuthAPIController::class, 'forgotPassword']);
Route::post('reset-password', [AuthAPIController::class, 'resetPassword']);

//Courses Routes
Route::get('courses', [APIController::class, 'getCourses']);
Route::get('course', [APIController::class, 'getIndividualCourse']);
Route::get('professors', [APIController::class, 'getProfessors']);
Route::get('professor', [APIController::class, 'getIndividualProfessor']);
Route::get('reviews', [APIController::class, 'getReviews']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthAPIController::class, 'logout']);
    Route::put('updateUserProfile', [APIController::class, 'updateUserProfile']);
    Route::post('createAReview', [APIController::class, 'createAReview']);
    Route::delete('deleteAReview', [APIController::class, 'deleteAReview']);
});
