<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Seuls les invités non-connectés peuvent voir l'index (inscription + connexion)
        $this->middleware('guest')->only('index');
        
        //seuls les visiteurs connectés peuvent voir 
        $this ->middleware('auth')->only('home');
    }


    public function index() // renvoyer la page d'accueil du site (inscription + connexion)
    {                       // index.blade.php
        return view('index');
    }

    public function home() // renvoyer la page home.blade.php avec tous les messages 
    {
        //************RÉCUPERATION DES MESSAGES */


        // //1) syntaxe de base : on récupère tout les messages
        // $posts = Post::all();

        // //Je teste cette liste de messages
        // dd($posts);




        // //2) Syntaxe avec le + récent en 1er +
        // $posts = Post::latest()->get();

        // //Je teste cette liste de messages 
        // dd($posts);


        // //3)Syntaxe avec + récent en 1er + la p
        // $posts = Post::latest()->paginate(10);

        // //Je teste cette liste de messages 
        // dd($posts);

        //**************** EAGER LOADINGS DE BASE *******//

        //**************** EAGER LOADING méthode 1 : with *******//


        //4) Je veux charger en + de mes posts:
        // les commentaires associ"s à chaque post
        //l'utilisateur qui a posté chaque post
        // $posts = Post::with('comments', 'user')->latest()->paginate(10);

        // // comme a chaque fois je teste cette liste de messages
        // dd($posts);

        //**************** EAGER LOADING méthode 2 : load *******//

        //5) je récupère les messages avec le dernier en premier et par pages de 10
        //$posts = Post::latest()->paginate(10);

        // Je charge les relations souhaitées (comme ci-dessus)
        //$posts->load('comments', 'user');

        //Je teste cette liste de messages
        //dd($posts);

        //**************** EAGER LOADING AVANCE: Encaplusé ("nested eager loading") *******//

        //Je veux charger en + l'utilisateur qui a posté chaque commentaire
        $posts = Post::with('comments.user', 'user')->latest()->paginate(10);
        // dd($posts);

        //je retourne la vue home en y injectant les posts
        return view('home', ['posts' =>$posts]);

        //Autre syntaxe
        //return view('home', compact('posts'));<
    }

}
