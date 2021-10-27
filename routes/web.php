<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Espace commun ----
// Accueil / liste des formations (view)
Route::get('/', [TrainingController::class, 'listView'])->name('trainingListView');
// Détail d'une formation (view)
Route::get('/training/{id}', [TrainingController::class, 'detailView'])->name('trainingDetailView');
// Contact formulaire (view)
Route::get('/contact', [ContactController::class, 'contactView'])->name('contactView');
// Contact formulaire (envoi formulaire)
Route::post('/sendContact', [ContactController::class, 'sendContact'])->name('sendContact');

// Espace loggé ----
//Page profile (view)
Route::get('/profile', [UserController::class, "profileView"])->name('profileView');
// Envoi formulaire edition profile
Route::put('/edit/user/{id}', [UserController::class, 'editUser'])->name('editUser');
// Page list de mes formations (view)
Route::get('/myTraining', [TrainingController::class, 'myTrainView'])->name('myTrainView');
// Page edit Training (view)
Route::get('edit/training/{id}', [TrainingController::class, 'editTrainingView'])->name('editTrainingView');
// Fonction edition d'un Training
Route::put('/edit/training/{id}', [TrainingController::class, 'editTraining'])->name('editTraining');
// Fonction de suppression d'un Training
Route::delete('remove/training/{id}', [TrainingController::class, 'removeTraining'])->name('removeTraining');

// Espace admin ----
// Dashboard admin (view)
Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('dashboardView');
// Validation d'un utilisateur
Route::put('/valid/user/{id}', [AdminController::class, 'validUser'])->name('validUser');
// Suppression d'un utilisateur
Route::delete('/remove/user/{id}', [UserController::class, "removeUser"])->name('removeUser');

require __DIR__.'/auth.php';
