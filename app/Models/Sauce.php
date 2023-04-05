<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Sauce;
use App\Models\User;


//importe Auth pour récupérer l'id de l'utilisateur connecté
use Illuminate\Support\Facades\Auth;



class Sauce extends Model
{
    use HasFactory;


    public function up(){ // permet de créer la table sauce dans la base de données
        Schema::create('saucesss', function (Blueprint $table) {
            $table->id();
            $table->string('userId, 255, true, true');
            $table->string('name');
            $table->string('manufacturer');
            $table->string('description');
            $table->string('mainPepper');
            $table->string('imageUrl');
            $table->integer('heat');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->array('usersLiked');
            $table->array('usersDisliked');
            $table->timestamps();
        });
    }

    public $fillable = [ // permet de récupérer les données du formulaire
        'name',
        'manufacturer',
        'description',
        'mainPepper',
        'heat',
    ];

    public static function boot() // permet de récupérer l'id de l'utilisateur connecté
    {
        parent::boot();

        static::creating(function ($sauce) {
            $sauce->userId = auth()->user()->email; 
        });


    }
    
    public $attributes =[ // permet de définir des valeurs par défaut
        'likes' => 0,
        'dislikes' => 0,
        'usersLiked' => [],
        'usersDisliked' => []
    ];


}

