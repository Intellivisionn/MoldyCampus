<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Courses;


Route::get('/', function () {
    return view('pages.homepage');
})->name('homepage');

Route::get('/search-results', [SearchController::class, 'show'])->name('search.results');

Route::view('courses', 'pages.courses')->name('courses');

Route::view('professors', 'pages.professors')->name('professors');

Route::view('admin', 'pages.admin.admin')
->middleware(['auth', 'can:access-admin'])
->name('admin');

Route::view('addCourse', 'pages.admin.add_course')
->middleware(['auth', 'can:access-admin'])
->name('addCourse');

Route::view('addLecturer', 'pages.admin.add_lecturer')
->middleware(['auth', 'can:access-admin'])
->name('addLecturer');

Route::view('manageAdmins', 'pages.admin.manage_admins')
->middleware(['auth', 'can:access-admin'])
->name('manageAdmins');

Route::view('profile', 'pages.profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('course/{courseId}', function ($courseId) {
    return view('pages.course.show', compact('courseId'));
})->name('course.show');

Route::get('professor/{professorId}', function ($professorId) {
    return view('pages.professor.show', compact('professorId'));
})->name('professor.show');

Route::get('/images/courses/{filename}', function ($filename) {
    $path = storage_path('app/public/courses/'.$filename);
    $defaultPath = storage_path('app/public/courses/no-image.jpg');

    if (! File::exists($path)) {
        $path = $defaultPath;
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);

    return $response;
});

Route::get('/images/courses', function () {
    abort(404, 'Filename not provided');
});
Route::view('privacy-policy', 'pages.privacy-policy')
    ->name('privacy-policy');

Route::view('tos', 'pages.tos')
    ->name('tos');

Route::view('contact_us', 'pages.contact_us')
    ->name('contact_us');

require __DIR__.'/auth.php';
