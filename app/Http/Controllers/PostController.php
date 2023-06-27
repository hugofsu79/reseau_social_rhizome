<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // $request c'est des données qui viennent du formulaire
    {                                      //$request['content'] = "Salut les gars"
        //1) On valide les champs en précisant les critères attendus
        $request->validate([
            //'name de l'input-> [critères]
            'content' => 'required|min:25|max:1000',
            'image' => 'nullable|string',
            'tags' => 'required|min:3|max:50'
            // Autre syntaxe possible : 'content' => ['required', 'min:25', 'max:1000']
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        Post::create([                                  // 3 syntaxe possibles pour accéder au contenu de $request
            'content' => $request->content,              // Syntaxe objet 
            'tags' => $request['tags'],                 // syntaxe tableau associatif
            'image' => $request->input('image'),        // autre syntaxe
            'user_id' => Auth::user()->id               // J'accède à l'id du user connecté
        ]);

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('home')->with('message', 'Message créé avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Post $post)
    {
        // Je renvoie une vue en y injectant le message
        // $this->authorize('update', $post);
        return view('posts/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {                                      //$request['content'] = "Salut les gars"
        //1) On valide les champs en précisant les critères attendus
        $request->validate([
            //'name de l'input-> [critères]
            'content' => 'required|min:25|max:1000',
            'image' => 'nullable|string',
            'tags' => 'required|min:3|max:50'
            // Autre syntaxe possible : 'content' => ['required', 'min:25', 'max:1000']
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        $post->update($request->all());

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('home')->with('message', 'Message modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $this->Authorize('delete', $post);
        $post->delete();
        return redirect()->route('home')->with('message', 'Message supprimé avec succès');;
    }
}
