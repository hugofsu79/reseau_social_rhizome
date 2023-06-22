<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Message;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */

    //************************  UPDATE : Permet de valider les mofications effectuées   ************************//

    public function update(Request $request, user $user)
    {
        $request->validate([
            'pseudo' => 'required|max:40',
            'image' => 'nullable|string'
        ]);

        //on modifie les infos de l'utilisateur
        $user->pseudo = $request->input('pseudo');
        $user->image = $request->input('image');

        //on sauvegarde les changements en bdd
        $user->save();

        // on redirige sur la page précédente
        return back()->with('message', 'le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */

    //*********** DESTROY : pour supprimer l'utilisateur *********/

    public function destroy(User $user)
    {
        //on vérifie que c'est vien l'utilisateur connecté qui fait la demande suppression
        //(les id doivent être identiques)
        if (Auth::user()->id == $user->id) {
            $user->delete();
            return redirect()->route('index')->with('message', 'Le compte a bien été supprimé');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'suppression du compte impossible']);
        }
    }


    //***********  *********/

    public function storeMessage(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
            'hashtags' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048', // Validation pour une image
        ]);

        // Gérer le téléchargement de la photo (s'il y en a une)
        if ($request->hasFile('photo')) {
            // Traitez le téléchargement de la photo ici, par exemple :        
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public'); // stockage de la photo dans le dossier "photos" du répertoire "public"

            // Ajoutez la logique pour utiliser $photoPath comme chemin de stockage de la photo dans votre modèle ou votre base de données
        }

        // Créez le message dans la base de données
        $message = Message::create([
            'content' => $validatedData['content'],
            'hashtags' => $validatedData['hashtags'],
            'photo_path' => isset($photoPath) ? $photoPath : null, // Si une photo a été téléchargée, stockez le chemin dans la base de données
            'user_id' => auth()->user()->id, // Exemple : si le message est associé à un utilisateur authentifié
        ]);

        return redirect()->route('home')->with('success', 'Le message a été ajouté avec succès.');
    }
}
