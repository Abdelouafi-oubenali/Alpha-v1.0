<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormationControler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ParcourController;

Route::view('/', 'welcome');

Route::resource('departements', DepartmentController::class);
Route::resource('users', UserController::class);
Route::resource('formasion', FormationControler::class);
Route::resource('posts',PostController::class);
Route::resource('parcours',ParcourController::class);

Route::view('/test', 'employe.formulaire-conge');


// Route::post('departements', [DepartmentController::class, 'store'])->name('departements.store');

// Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departements.update');




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
