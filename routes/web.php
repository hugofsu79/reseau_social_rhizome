<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\LayoutController;
// use App\Models\Publication;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|Voici où vous pouvez enregistrer les routes web de votre application. Ces
|routes sont chargées par le RouteServiceProvider et toutes seront
|assignées au groupe de middleware "web". Faites quelque chose de génial !
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

Route::resource('/users', App\Http\Controllers\UserController::class)->except('index', 'creat', 'show');


//******************************* Ajoute message qui ce dirige à message.store ***************/
// Auth::routes(message.store);


//******************************* Route  resource POST ***************/

Route::resource('/posts', App\Http\Controllers\PostController::class)->except('index', 'create', 'show');


// route::delete()

//******************************* Route  resource comment ***************/

Route::resource('/comments', App\Http\Controllers\CommentController::class)->except('index');


//******************************* Route  resource img ***************/
// Route::get('/publication/{id}', 'PublicationController@show')->name('publication.show');


// routes/web.php ou routes/api.php

Route::post('/comments/{comment}/replies', [CommentReplyController::class, 'store'])->name('comment.replies.store');


// route comment

Route::get('/layouts/{comment}/edit', [LayoutController::class, 'edit'])->name('layouts.edit');
