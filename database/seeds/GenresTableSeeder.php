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
                'name' => 'Action'
            ],
            [
                'name' => 'Animation'
            ],
            [
                'name' => 'Aventure'
            ],
            [
                'name' => 'Comédie'
            ],
            [
                'name' => 'Comédie dramatique'
            ],
            [
                'name' => 'Divers'
            ],
            [
                'name' => 'Documentaire'
            ],
            [
                'name' => 'Drame'
            ],
            [
                'name' => 'Epouvante-horreur'
            ],
            [
                'name' => 'Famille'
            ],
            [
                'name' => 'Fantastique'
            ],
            [
                'name' => 'Guerre'
            ],
            [
                'name' => 'Historique'
            ],
            [
                'name' => 'Musical'
            ],
            [
                'name' => 'Policier'
            ],
            [
                'name' => 'Romance'
            ],
            [
                'name' => 'Science fiction'
            ],
            [
                'name' => 'Thriller'
            ],
            [
                'name' => 'Western'
            ]
        ]);
    }
}
