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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/compte', [App\Http\Controllers\UserController::class, 'index'])->name('compte');

/*------------------------ MODIFICATION DES INFOS DU COMPTE  ---------------------------- */
Route::get('/editaccount', [App\Http\Controllers\UserController::class, 'edit'])->name('editaccount');
Route::post('/editaccount', [App\Http\Controllers\UserController::class, 'update'])->name('updateaccount');

/*------------------------ MODIFICATION DU MOT DE PASSE------------------------------------- */
Route::get('/editpassword', [App\Http\Controllers\UserController::class, 'editpassword'])->name('editpassword');
Route::post('/editpassword', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('updatepassword');
