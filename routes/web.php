<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Resource Routes (wajib login)
Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('classes', SchoolClassController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('majors', MajorController::class);
});