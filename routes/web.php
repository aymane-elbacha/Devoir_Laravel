<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class)->except(['show']);
    Route::resource('books', BookController::class)->except(['show']);
    Route::resource('administrators', AdministratorController::class)->except(['show']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';