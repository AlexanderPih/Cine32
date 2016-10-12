<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'name' => 'Action',
                'slug' => 'action'
            ],
            [
                'name' => 'Animation',
                'slug' => 'animation'
            ],
            [
                'name' => 'Aventure',
                'slug' => 'aventure'
            ],
            [
                'name' => 'Comédie',
                'slug' => 'comédie'
            ],
            [
                'name' => 'Comédie dramatique',
                'slug' => 'comédie-dramatique'
            ],
            [
                'name' => 'Divers',
                'slug' => 'divers'
            ],
            [
                'name' => 'Documentaire',
                'slug' => 'documentaire'
            ],
            [
                'name' => 'Drame',
                'slug' => 'drame'
            ],
            [
                'name' => 'Epouvante-horreur',
                'slug' => 'epouvante-horreur'
            ],
            [
                'name' => 'Famille',
                'slug' => 'famille'
            ],
            [
                'name' => 'Fantastique',
                'slug' => 'fantastique'
            ],
            [
                'name' => 'Guerre',
                'slug' => 'guerre'
            ],
            [
                'name' => 'Historique',
                'slug' => 'historique'
            ],
            [
                'name' => 'Musical',
                'slug' => 'musical'
            ],
            [
                'name' => 'Policier',
                'slug' => 'policier'
            ],
            [
                'name' => 'Romance',
                'slug' => 'romance'
            ],
            [
                'name' => 'Science fiction',
                'slug' => 'science-fiction'
            ],
            [
                'name' => 'Thriller',
                'slug' => 'thirller'
            ],
            [
                'name' => 'Western',
                'slug' => 'western'
            ]
        ]);
    }
}
