<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::table('sauces')->insert([[
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Ketchup',
            'manufacturer' => 'Heinz',
            'description' => 'A delicious taste of tomato',
            'mainPepper' => 'None',
            'heat' => 0,
            'imageUrl' => 'ketchup.png',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => "a:0:{}",
            'usersDisliked' => "a:0:{}",
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Tabasco',
            'manufacturer' => 'Tabasco',
            'description' => 'A delicious taste of pepper',
            'mainPepper' => 'Mexican Red Pepper',
            'heat' => 5,
            'imageUrl' => 'tabasco.png',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => "a:0:{}",
            'usersDisliked' => "a:0:{}",
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Mayonnaise',
            'manufacturer' => 'Heinz',
            'description' => 'A delicious taste of egg',
            'mainPepper' => 'None',
            'heat' => 0,
            'imageUrl' => 'mayonnaise.png',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => "a:0:{}",
            'usersDisliked' => "a:0:{}",

        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Barbecue',
            'manufacturer' => 'Heinz',
            'description' => 'A delicious taste of smoked meat',
            'mainPepper' => 'None',
            'heat' => 0,
            'imageUrl' => 'bbq.png',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => "a:0:{}",
            'usersDisliked' => "a:0:{}",
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Harissa',
            'manufacturer' => 'Jouda',
            'description' => 'A delicious taste of pepper',
            'mainPepper' => 'Tunisian Red Pepper',
            'heat' => 2,
            'imageUrl' => 'harissa.png',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => "a:0:{}",
            'usersDisliked' => "a:0:{}",
        ],
    ]);

    }
}
