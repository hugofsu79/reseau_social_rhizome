<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
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