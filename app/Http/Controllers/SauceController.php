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

        //appelle la fonction saveImg pour enregistrer l'image dans le dossier images
        $this->saveImg($request);


        // 'App\Models\Sauce'::create($request->all());

        $sauce = new Sauce;
        $sauce->fill($request->all());
        $file = $request->file('imageUrl');
        $sauce->imageUrl = $file->getClientOriginalName();
        $sauce->save();

        return back()->with('success', 'Les données ont été enregistrées avec succès.'); }

        public function saveImg(Request $request) {
            $file = $request->file('imageUrl');
            $fileName = $file->getClientOriginalName();
            $path = $file->move('storage/images', $fileName);
                    

        }

    

}


