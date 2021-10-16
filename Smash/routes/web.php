<?php

use Illuminate\Support\Facades\Auth;
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

//Création de la route PROFILES.SHOW qui récupère l'utilisateur par son prénom
Route::get('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profiles.show');
Route::get('/profiles/create/{user}', [App\Http\Controllers\ProfileController::class, 'create'])->name('profiles.create'); //route pour afficher le formulaire
//Route::get('/profiles/edit/{user}', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit'); //route pour afficher le formulaire
Route::patch('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update'); //route pour modifier les informations



//création des posts
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');


//route des posts
Route::get('/posts/publications', [App\Http\Controllers\PostController::class, 'publication'])->name('posts.publications');

