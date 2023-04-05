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
    // private $myArray = [];
    // public function __get($name) {
    //     if ($name === 'myArray') {
    //         return $this->myArray;
    //     }
    // }

    // public function __set($name, $value) {
    //     if ($name === 'usersLiked') {
    //         // Utilisez la fonction array_push() pour ajouter la valeur à la fin du tableau
    //         array_push($this->usersLiked, $value);
    //         // Vous pouvez également utiliser l'opérateur [] pour ajouter une valeur à la fin du tableau
    //         // $this->usersLiked[] = $value;
    //     }
    // }

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
}