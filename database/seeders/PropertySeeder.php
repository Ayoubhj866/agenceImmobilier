<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("properties")->insert(
            [
                [
                    'title' => 'ma deuxième appartement',
                    'description' => 'Jolie appartement',
                    'address' => 'Rue Bouchouk N°1, Hay karima',
                    'city' => 'rabat',
                    'country' => 'maroc',
                    'price' => 150000,
                    'bedrooms' => 2,
                    'bathrooms' => 1,
                    'size' => 80,
                    'sold' => true
                ]
            ]
        );
    }
}
