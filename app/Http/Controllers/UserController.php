<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Message;

class UserController extends Controller
{



    //*********** show message *********/
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
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
}
