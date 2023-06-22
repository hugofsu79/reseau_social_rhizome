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
//******************************* page de connexion/Inscription ***************/

//Route méthode http ( url, [Emplacement du contrôleur concerné, méthode du ctrl concerné])-> nom de la rout
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//******************************* ACCUEIL (home.blade.php) liste des messages ***************/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

//******************************* ACCUEIL (home.blade.php) liste des messages ***************/
Auth::routes();

//******************************* ROUTE resource USER ***************/

Route::resource('/users', App\Http\Controllers\UserController::class)->except('index', 'creat','show');


//******************************* Ajoute message qui ce dirige à message.store ***************/
// Auth::routes(message.store);


//******************************* Route  resource POST ***************/

Route::resource('/posts', App\Http\Controllers\PostController::class)->except('index', 'create', 'show');


