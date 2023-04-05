<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class SauceController extends Controller
{
    // permet d’appeler votre view pour afficher le formulaire
    public function createSauceForm(Request $request) {
        return view('ajoutSauce');
    }

    public function SauceForm(Request $request) {
        // validation de formulaire
        $this->validate($request, [
        'name' => 'required',
        'manufacturer'=>'required',
        'description' => 'required',
        'mainPepper' => 'required',
        'heat' => 'required',
        ]);
        // Enregistrer dans la base de données

        // On enregistre l'image dans le dossier images
        $file = $request->file('imageUrl');
        $fileName = $file->getClientOriginalName();
        $file->move('storage/images', $fileName);

        // 'App\Models\Sauce'::create($request->all());

        $sauce = new Sauce;
        
        // On transforme les tableaux en chaînes de caractères pour les enregistrer dans la base de données
        $utilisateursLike = serialize($sauce->usersLiked);
        $sauce->usersLiked = $utilisateursLike;
        $utilisateursDislike = serialize($sauce->usersDisliked);
        $sauce->usersDisliked = $utilisateursDislike;
        
        // On enregistre les données du formulaire dans la base de données
        $sauce->fill($request->all());

        // On enregistre le nom de l'image dans la base de données
        $file = $request->file('imageUrl');
        $sauce->imageUrl = $file->getClientOriginalName();

        
        $sauce->save();

        return back()->with('success', 'Les données ont été enregistrées avec succès.'); }

        public function saveImg(Request $request) {
            
        }

    

}


