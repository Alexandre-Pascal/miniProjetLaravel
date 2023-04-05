<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;


//importe Auth pour récupérer l'id de l'utilisateur connecté
use Illuminate\Support\Facades\Auth;



class Sauce extends Model
{
    use HasFactory;
    
    
    public $fillable = [ // permet de récupérer les données du formulaire
        'name',
        'manufacturer',
        'description',
        'mainPepper',
        'heat',
    ];

    public $attributes =[ // permet de définir des valeurs par défaut
        'likes' => 0,
        'dislikes' => 0,
        'usersLiked' => [],
        'usersDisliked' => []
    ];

    public static function boot() // permet de récupérer l'id de l'utilisateur connecté
    {
        parent::boot();

        static::creating(function ($sauce) {
            $sauce->userId = auth()->user()->email; 
        });


    }
    
    


}

