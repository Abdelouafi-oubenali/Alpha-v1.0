<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormationControler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ParcourController;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;





Route::view('/', 'welcome');


Route::middleware('role:Admin|RH')->group(function(){
Route::resource('departements', DepartmentController::class);
Route::resource('formasion', FormationControler::class);
Route::resource('posts',PostController::class);
Route::resource('parcours',ParcourController::class);
});

Route::middleware('role:Admin|RH|Manager')->group(function(){
   Route::resource('mail', MailController::class);
});

// Route::middleware('role:Admin|RH|Manager')->group(function(){
//     Route::resource('mail', MailController::class);
//  });



Route::middleware('role:Admin|RH|Manager')->group(function(){
    Route::resource('users', UserController::class);
    Route::put('/demandes/{id}/accepter', [MailController::class, 'accepter'])->name('demandes.accepter');
    Route::put('/demandes/{id}/refuser', [MailController::class, 'refuser'])->name('demandes.refuser');
    Route::get('/demandes/{id}/view', [MailController::class, 'view'])->name('demandes.view');
});


Route::middleware('role:Employe|Manager')->group(function(){
    Route::resource('conges', CongesController::class);
Route::view('/attonte', 'conges.attonte');

});

// Route::get('/conges/attonte', [CongesController::class, 'attonte'])->name('conges.attonte');
// Route::get('/conges/{id}', [CongesController::class, 'show'])->name('conges.show');
// Route::post('departements', [DepartmentController::class, 'store'])->name('departements.store');
// Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departements.update');
Route::get('/user/formation', [UserController::class, 'showFormations']);
Route::post('/user/formation', [UserController::class, 'assignFormation'])->name('assignFormation'); //clack sur assign formasion
Route::post('/user/formation', [UserController::class, 'assignFormation'])->name('assignFormation');
// Route::post('/user/formation/{formationId}', [UserController::class, 'assignFormation'])->name('assignFormation');


Route::resource('emploiyee/profile', ProfileController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

require __DIR__.'/auth.php';
