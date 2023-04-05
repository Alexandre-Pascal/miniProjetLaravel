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
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Ketchup',
            'manufacturer' => 'Heinz',
            'description' => 'A delicious taste of tomato',
            'mainPepper' => 'None',
            'heat' => 0,
            'imageUrl' => 'ketchup.png',
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Tabasco',
            'manufacturer' => 'Tabasco',
            'description' => 'A delicious taste of pepper',
            'mainPepper' => 'Mexican Red Pepper',
            'heat' => 5,
            'imageUrl' => 'tabasco.png',
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Mayonnaise',
            'manufacturer' => 'Heinz',
            'description' => 'A delicious taste of egg',
            'mainPepper' => 'None',
            'heat' => 0,
            'imageUrl' => 'mayonnaise.png',
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Barbecue',
            'manufacturer' => 'Heinz',
            'description' => 'A delicious taste of smoked meat',
            'mainPepper' => 'None',
            'heat' => 0,
            'imageUrl' => 'bbq.png',
        ],

        [
            'userId' => 'alexandre.pascal.ep@gmail.com',
            'name' => 'Harissa',
            'manufacturer' => 'Jouda',
            'description' => 'A delicious taste of pepper',
            'mainPepper' => 'Tunisian Red Pepper',
            'heat' => 2,
            'imageUrl' => 'harissa.png',
        ],
    ]);

    }
}
