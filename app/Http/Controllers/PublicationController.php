<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Publication;


class PublicationController extends Controller
{
    public function show($id)
    {
        // Récupérer la publication à partir de son identifiant $id
        $publication = Publication::find($id);

        if (!$publication) {
            // Gérer le cas où la publication n'est pas trouvée, par exemple, rediriger vers une page d'erreur
            return redirect()->route('erreur');
        }

        // Récupérer la liste des fichiers d'images dans le dossier 'public/images/plnts'
        $imageFiles = Storage::files('public/images/plnts');

        // Sélectionner une image aléatoire parmi les fichiers disponibles
        $randomImage = $imageFiles[rand(0, count($imageFiles) - 1)];

        // Récupérer le nom de fichier uniquement (sans le chemin complet)
        $image = pathinfo($randomImage, PATHINFO_FILENAME);

        // Générer l'URL de l'image
        $imageUrl = Storage::url("images/plnts/{$image}");

        // Passer les données à la vue
        return view('publication.show', compact('publication', 'imageUrl'));
    }
}
