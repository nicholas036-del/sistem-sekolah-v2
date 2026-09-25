<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication 
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Student Management (Resource)
Route::resource('students', StudentController::class)->parameters(['students' => 'id']);

// Class Management (Resource)
Route::resource('classes', SchoolClassController::class)->parameters(['classes' => 'id']);

// Teacher Management (Resource)
Route::resource('teachers', TeacherController::class)->parameters(['teachers' => 'id']); 

// Major Management (Resource)
Route::resource('majors', MajorController::class)->parameters(['majors' => 'id']);
