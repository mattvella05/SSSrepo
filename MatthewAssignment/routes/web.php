<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for colleges and students
Route::resource('colleges', CollegeController::class);
Route::resource('students', StudentController::class);

// Optional filtering route for students by college
Route::get('students/filter', [StudentController::class, 'filter'])->name('students.filter');
