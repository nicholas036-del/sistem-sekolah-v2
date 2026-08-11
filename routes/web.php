<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Student Management (Resource)
Route::resource('students', StudentController::class)->parameters(['students' => 'id']);

// Class Management (Resource)
Route::resource('classes', SchoolClassController::class)->parameters(['classes' => 'id']);

// Teacher Management (Resource)
Route::resource('teachers', TeacherController::class)->parameters(['teachers' => 'id']);

// Major Management (Resource)
Route::resource('majors', MajorController::class)->parameters(['majors' => 'id']);
