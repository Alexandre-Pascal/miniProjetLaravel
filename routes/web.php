<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

// Route pour afficher la page d'accueil
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('');




// Route pour afficher le formulaire d'ajout de sauce
Route::get('/ajoutSauce', [App\Http\Controllers\SauceController::class, 'createSauceForm'])->name('ajoutSauce'); 

// Route pour enregistrer les données du formulaire d'ajout de sauce
Route::post('/ajoutSauce', [App\Http\Controllers\SauceController::class, 'SauceForm'])->name('ajoutSauce');

// Route pour afficher la page des sauces
Route::get('/sauces', [App\Http\Controllers\SaucesController::class, 'index'])->name('sauces');

// Route pour afficher la page d'une sauce
Route::get('/sauces/{id}', [App\Http\Controllers\SaucesController::class, 'show'])->name('sauces.show');

// Route pour augmenter le compteur de likes
Route::post('/sauces/{id}/like', [App\Http\Controllers\SaucesController::class, 'like'])->name('sauces.like');

// Route pour augmenter le compteur de dislikes
Route::post('/sauces/{id}/dislike', [App\Http\Controllers\SaucesController::class, 'dislike'])->name('sauces.dislike');



//utiliser le @
