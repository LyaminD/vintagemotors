<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*------------------------ GESTION ACCEUIL ET PAGE DE COMPTE CLIENT  ---------------------------- */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/compte', [App\Http\Controllers\UserController::class, 'index'])->name('compte');

/*------------------------ MODIFICATION DES INFOS DU COMPTE  ---------------------------- */
Route::get('/editaccount', [App\Http\Controllers\UserController::class, 'edit'])->name('editaccount');
Route::post('/editaccount', [App\Http\Controllers\UserController::class, 'update'])->name('updateaccount');

/*------------------------ MODIFICATION DU MOT DE PASSE------------------------------------- */
Route::get('/editpassword', [App\Http\Controllers\UserController::class, 'editpassword'])->name('editpassword');
Route::post('/editpassword', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('updatepassword');

/*------------------------ AFFICHAGE DES ARTICLE  ---------------------------- */
Route::resource('/articles', App\Http\Controllers\ArticleController::class);

/*------------------------ AFFICHAGE DES ARTICLES TRIER PAR GAMMES ---------------------------- */
Route::resource('/gammes', App\Http\Controllers\GammeController::class);

/*------------------------ AFFICHAGE DES ARTICLES TRIER PAR NOTE ---------------------------- */
Route::get('/classement', [App\Http\Controllers\ArticleController::class, 'classement'])->name('articles.classement');

/*------------------------------------ GESTION DU PANIER ---------------------------------------- */
Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
Route::post('panier/add/{article}',[App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
Route::get('panier/remove/{article}',[App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
Route::get('panier/empty',[App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');

/*------------------------------------ GESTION DES COMMANDES ---------------------------------------- */
Route::resource('commande',App\Http\Controllers\CommandeController::class);

