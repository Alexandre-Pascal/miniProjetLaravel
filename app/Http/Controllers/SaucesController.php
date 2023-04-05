<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


// on veut pouvoir utiliser push et pop
//import Arr::push
use Illuminate\Support\Arr;





class SaucesController extends Controller
{
    public function afficheSauces(Request $request) {
        return view('sauces');
    }

    public function index()
{
    $sauces = Sauce::all();
    return view('sauces', ['sauces' => $sauces]);
}

public function show($id)
{
    $sauce = Sauce::find($id);
    return view('sauce', ['sauce' => $sauce]);

}

public function like($id)
{
    $sauce = Sauce::find($id);

    // On unserialize les tableaux pour pouvoir les utiliser
    $sauce->usersLiked = unserialize($sauce->usersLiked);
    $sauce->usersDisliked = unserialize($sauce->usersDisliked); 

    if (!in_array(Auth::user()->email, $sauce->usersDisliked)) {  
        
        if (in_array(Auth::user()->email, $sauce->usersLiked)) {
            //si l'utilisateur a déjà liké la sauce on enlève son like
            //obligé de faire ça car propriété surchargée si on fait unset
            $usersLiked = $sauce->usersLiked;
            $emailToRemove =  Auth::user()->email;
            $usersLiked = array_diff($usersLiked, [$emailToRemove]);
            $sauce->usersLiked = $usersLiked;

            $sauce->likes = $sauce->likes - 1;

            $sauce->usersLiked = serialize($sauce->usersLiked);
            $sauce->usersDisliked = serialize($sauce->usersDisliked);

            $sauce->save();
            return redirect()->route('sauces.show', ['id' => $id]);
        }
        else{
            //obligé de faire ça car propriété surchargée si on fait push
            $usersLiked = $sauce->usersLiked;
            $usersLiked[] = Auth::user()->email;
            $sauce->usersLiked = $usersLiked;
            
            //On reserialize les tableaux
            $sauce->usersLiked = serialize($sauce->usersLiked);
            $sauce->usersDisliked = serialize($sauce->usersDisliked);
            $sauce->likes = $sauce->likes + 1;
            $sauce->save();
            return redirect()->route('sauces.show', ['id' => $id]);
        }
    }
    else {
        //si l'utilisateur a déjà disliké la sauce on enlève son dislike       
        
        //obligé de faire ça car propriété surchargée si on fait unset
        $usersDisliked = $sauce->usersDisliked;
        $emailToRemove =  Auth::user()->email;
        $usersDisliked = array_diff($usersDisliked, [$emailToRemove]);
        $sauce->usersDisliked = $usersDisliked;

        //on enlève le dislike et on ajoute le like
        $sauce->dislikes = $sauce->dislikes - 1;
        $sauce->likes = $sauce->likes + 1;

        //obligé de faire ça car propriété surchargée si on fait push
        $usersLiked = $sauce->usersLiked;
        $usersLiked[] = Auth::user()->email;
        $sauce->usersLiked = $usersLiked;
        
        //On reserialize les tableaux
        $sauce->usersLiked = serialize($sauce->usersLiked);
        $sauce->usersDisliked = serialize($sauce->usersDisliked);
        
        $sauce->save();
        return redirect()->route('sauces.show', ['id' => $id]);
    }
}

public function dislike($id){
    $sauce = Sauce::find($id);

    // On unserialize les tableaux pour pouvoir les utiliser
    $sauce->usersLiked = unserialize($sauce->usersLiked);
    $sauce->usersDisliked = unserialize($sauce->usersDisliked);

    if (!in_array(Auth::user()->email, $sauce->usersLiked)) {  
        
        if (in_array(Auth::user()->email, $sauce->usersDisliked)) {
            //si l'utilisateur a déjà disliké la sauce on enlève son dislike
            //obligé de faire ça car propriété surchargée si on fait unset
            $usersDisliked = $sauce->usersDisliked;
            $emailToRemove =  Auth::user()->email;
            $usersDisliked = array_diff($usersDisliked, [$emailToRemove]);
            $sauce->usersDisliked = $usersDisliked;

            $sauce->dislikes = $sauce->dislikes - 1;

            $sauce->usersLiked = serialize($sauce->usersLiked);
            $sauce->usersDisliked = serialize($sauce->usersDisliked);

            $sauce->save();
            return redirect()->route('sauces.show', ['id' => $id]);
        }
        else{
            //obligé de faire ça car propriété surchargée si on fait push
            $usersDisliked = $sauce->usersDisliked;
            $usersDisliked[] = Auth::user()->email;
            $sauce->usersDisliked = $usersDisliked;
            
            //On reserialize les tableaux
            $sauce->usersLiked = serialize($sauce->usersLiked);
            $sauce->usersDisliked = serialize($sauce->usersDisliked);
            $sauce->dislikes = $sauce->dislikes + 1;
            $sauce->save();
            return redirect()->route('sauces.show', ['id' => $id]);
        }
    }
    else {
        //si l'utilisateur a déjà liké la sauce on enlève son like       
        
        //obligé de faire ça car propriété surchargée si on fait unset
        $usersLiked = $sauce->usersLiked;
        $emailToRemove =  Auth::user()->email;
        $usersLiked = array_diff($usersLiked, [$emailToRemove]);
        $sauce->usersLiked = $usersLiked;

        //on enlève le like et on ajoute le dislike
        $sauce->likes = $sauce->likes - 1;
        $sauce->dislikes = $sauce->dislikes + 1;

        //obligé de faire ça car propriété surchargée si on fait push
        $usersDisliked = $sauce->usersDisliked;
        $usersDisliked[] = Auth::user()->email;
        $sauce->usersDisliked = $usersDisliked;

        //On reserialize les tableaux
        $sauce->usersLiked = serialize($sauce->usersLiked);
        $sauce->usersDisliked = serialize($sauce->usersDisliked);

        $sauce->save();
        return redirect()->route('sauces.show', ['id' => $id]);
        }
    }

    
    public function edit($id)
    //Méthode qui permet d'afficher le formulaire de modification d'une sauce ou 
    {
        $sauce = Sauce::find($id);
        // On redirige l'utilisateur vers la page de modification de la sauce 
        //le deuxième paramètre est un tableau associatif qui contient la sauce à modifier
        return view('ajoutSauce', ['sauce' => $sauce]);
    }

    //Méthode qui permet de modifier une sauce dans la base de données
    public function update(Request $request, $id)
    {
        $sauce = Sauce::find($id);
        $sauce->name = $request->input('name');
        $sauce->description = $request->input('description');
        $sauce->manufacturer = $request->input('manufacturer');
        $sauce->mainPepper = $request->input('mainPepper');
        $sauce->heat = $request->input('heat');

        // On vérifie si l'utilisateur a envoyé une image
        if ($request->hasFile('imageUrl')) {
            // On enregistre l'image dans le dossier storage/images
            $file = $request->file('imageUrl');
            $fileName = $file->getClientOriginalName();
            $file->move('storage/images', $fileName);
            
            // On enregistre le nom de l'image dans la base de données
            $file = $request->file('imageUrl');
            $sauce->imageUrl = $file->getClientOriginalName();
        }
        
        $sauce->save();
        return redirect()->route('sauces.show', ['id' => $id]);
    }

    //Méthode qui permet de supprimer une sauce de la base de données
    public function destroy($id)
    {
        $sauce = Sauce::find($id);
        $sauce->delete();
        return redirect()->route('sauces'); //redirection vers la page d'accueil
    }
    
}