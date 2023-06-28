<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // $request c'est les données qui viennent du formulaire
    {                                      //$request['content'] = "Salut les gars"

        //1) On valide les champs en précisant les critères attendus
        $request->validate([
            //'name de l'input-> [critères]
            'content' => 'required|min:25|max:1000',
            'image' => 'nullable|string',
            'tags' => 'required|min:3|max:50'
            // Autre syntaxe possible : 'content' => ['required', 'min:25', 'max:1000']
        ]);

        //2) Sauvegarde du commentaire => Va lancer un insert into en SQL
        Comment::create([                                  // 3 syntaxe possibles pour accéder au contenu de $request
            'content' => $request->content,              // Syntaxe objet 
            'tags' => $request['tags'],                 // syntaxe tableau associatif
            'image' => $request->input('image'),        // autre syntaxe
            'user_id' => Auth::user()->id,               // J'accède à l'id du user connecté
            'post_id' => $request->post_id
        ]);

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('home')->with('message', 'Commentaire créé avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // $this->Authorize('delete', $post);
        $comment->delete();
        return redirect()->route('home')->with('message', 'Commentaire supprimé avec succès');;
    }

    // public function getImage(Post $post)
    // {
    //     $path = storage_path('app/public/images/plnts' . $post->image_path);

    //     if (file_exists($path)) {
    //         return response()->file($path);
    //     }


    //     // Si l'image n'existe pas, une image par défaut ou une réponse d'erreur
    //     $defaultImagePath = storage_path('app/public/default_image.jpg');

    //     if (file_exists($defaultImagePath)) {
    //         return response()->file($defaultImagePath);
    //     }

    //     // Ou retourner une réponse d'erreur avec un message approprié
    //     return response()->json(['error' => 'Image not found'], 404);
    // }
}

//commentaire, 