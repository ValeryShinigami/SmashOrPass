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
//Route::patch('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update'); //route pour modifier les informations
Route::post('/profiles/{userId}/follow', [App\Http\Controllers\ProfileController::class, 'follow'])->name('profiles.follow'); //route pour follow

//Route::post('/profiles/{userId}/follow2', [App\Http\Controllers\ProfileController::class, 'follow2'])->name('profiles.follow2'); //route pour follow




//création des posts
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
//Route::post('/posts/like2', [App\Http\Controllers\PostController::class, 'like2'])->name('posts.like2');
//Route::get('/posts/show/{post}', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::post('/posts/{postId}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like'); //route like des utilisateurs sur les posts



//route des publications
Route::get('/posts/publications', [App\Http\Controllers\PostController::class, 'publication'])->name('posts.publications');

//route de subscribe équivalent de favoris
Route::get('/subscribe/index', [App\Http\Controllers\SubscribeController::class, 'index'])->name('subscribe.index');



