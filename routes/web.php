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

Auth::routes();
/*------------------------ GESTION ACCEUIL ET PAGE DE COMPTE CLIENT  ---------------------------- */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/compte', [App\Http\Controllers\UserController::class, 'index'])->name('compte');

/*------------------------ MODIFICATION DES INFOS DU COMPTE  ---------------------------- */
Route::get('/editaccount', [App\Http\Controllers\UserController::class, 'edit'])->name('editaccount');
Route::post('/editaccount', [App\Http\Controllers\UserController::class, 'update'])->name('updateaccount');

/*------------------------ MODIFICATION DES ADRESSES DU COMPTE  ---------------------------- */
Route::get('/adresse.edit', [App\Http\Controllers\AdresseController::class, 'edit'])->name('adresse.edit');
Route::post('/adresse.update', [App\Http\Controllers\AdresseController::class, 'update'])->name('adresse.update');
Route::post('/adresse.create', [App\Http\Controllers\AdresseController::class, 'create'])->name('adresse.create');
Route::post('/adresse.delete', [App\Http\Controllers\AdresseController::class, 'delete'])->name('adresse.delete');

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

/*------------------------------------ AFFICHAGE DES PROMOTIONS ---------------------------------------- */
Route::resource('promotion',App\Http\Controllers\PromotionController::class);


/*------------------------ GESTION ACCEUIL PANNEAU ADMIN  ---------------------------- */
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/article', [App\Http\Controllers\ArticleController::class, 'article'])->name('adminarticle');
Route::get('/admin/promo', [App\Http\Controllers\PromotionController::class, 'promotion'])->name('adminpromo');
Route::get('/admin/client', [App\Http\Controllers\UserController::class, 'user'])->name('adminclient');
Route::get('/admin/gamme', [App\Http\Controllers\GammeController::class, 'gamme'])->name('admingamme');

/*------------------------ MODIFICATION DES ARTICLES  ---------------------------- */
Route::get('/modifarticle', [App\Http\Controllers\ArticleController::class, 'edit'])->name('modifarticle');
Route::post('/modifarticle', [App\Http\Controllers\ArticleController::class, 'update'])->name('updatearticle');

/*--------------------------------------- UPLOAD IMAGES ---------------------------------------------- */
Route::post('image-upload', [App\Http\Controllers\ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');