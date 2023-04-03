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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \DB::table('sauces')->insert([[
            'userId' => 'admin',
            'name' => 'Ketchup',
            'manufacturer' => 'Heinz',
            'description' => 'Un délicieux gout de tomate',
            'mainPepper' => 'Aucun',
            'heat' => 0,
            'imageUrl' => 'imageUrl1.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Tabasco',
            'manufacturer' => 'Tabasco',
            'description' => 'Un délicieux gout de piment',
            'mainPepper' => 'Piment',
            'heat' => 5,
            'imageUrl' => 'imageUrl2.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Salsa',
            'manufacturer' => 'Salsa',
            'description' => 'Un délicieux gout de tomate et de piment',
            'mainPepper' => 'Piment',
            'heat' => 3,
            'imageUrl' => 'imageUrl3.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Mayonnaise',
            'manufacturer' => 'Heinz',
            'description' => 'Un délicieux gout d\'oeuf',
            'mainPepper' => 'Aucun',
            'heat' => 0,
            'imageUrl' => 'imageUrl4.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Sauce soja',
            'manufacturer' => 'Soy',
            'description' => 'Un délicieux gout de soja',
            'mainPepper' => 'Aucun',
            'heat' => 0,
            'imageUrl' => 'imageUrl5.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Sauce barbecue',
            'manufacturer' => 'Heinz',
            'description' => 'Un délicieux gout de viande',
            'mainPepper' => 'Aucun',
            'heat' => 0,
            'imageUrl' => 'imageUrl6.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Sauce Worcestershire',
            'manufacturer' => 'Worcestershire',
            'description' => 'Un délicieux gout de viande',
            'mainPepper' => 'Aucun',
            'heat' => 0,
            'imageUrl' => 'imageUrl7.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],

        [
            'userId' => 'admin',
            'name' => 'Sauce piquante',
            'manufacturer' => 'Salsa',
            'description' => 'Un délicieux gout de piment',
            'mainPepper' => 'Piment',
            'heat' => 5,
            'imageUrl' => 'imageUrl8.jpg',
            'likes' => 0,
            'dislikes' => 0,
            'usersLiked' => '[]',
            'usersDisliked' => '[]',
        ],
    ]);

    }
}
