<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

// Accueil / liste des formations (view)
Route::get('/', [TrainingController::class, 'listView'])->name('trainingListView');
// Détail d'une formation (view)
Route::get('/training/{id}', [TrainingController::class, 'detailView'])->name('trainingDetailView');
// Contact formulaire (view)
Route::get('/contact', [ContactController::class, 'contactView'])->name('contactView');
// Contact formulaire (envoi formulaire)
Route::post('/sendContact', [ContactController::class, 'sendContact'])->name('sendContact');
// Validation d'un utilisateur
Route::get('/valid/user/{token}', [ContactController::class, 'validUser'])->name('validUser'); // A REFAIRE -> Allez sur le dashboard

require __DIR__.'/auth.php';
