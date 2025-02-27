<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;


Route::view('/', 'welcome');

Route::resource('departments', DepartmentController::class);
Route::resource('users', UserController::class);

Route::post('departments', [DepartmentController::class, 'store'])->name('departements.store');

Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
