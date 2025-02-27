<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormationControler;

Route::view('/', 'welcome');

Route::resource('departements', DepartmentController::class);
Route::resource('users', UserController::class);
Route::resource('formasion', FormationControler::class);


Route::post('departements', [DepartmentController::class, 'store'])->name('departements.store');

Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departements.update');




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
