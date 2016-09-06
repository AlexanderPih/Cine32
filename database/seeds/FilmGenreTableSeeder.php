<?php

use Illuminate\Database\Seeder;

class FilmGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film_genre')->insert([
            [
                'film_id' => '1',
                'genre_id' => '1'
            ],
            [
                'film_id' => '1',
                'genre_id' => '18'
            ],
            [
                'film_id' => '2',
                'genre_id' => '2'
            ],
            [
                'film_id' => '2',
                'genre_id' => '4'
            ],
            [
                'film_id' => '3',
                'genre_id' => '1'
            ],
            [
                'film_id' => '3',
                'genre_id' => '4'
            ],
            [
                'film_id' => '3',
                'genre_id' => '18'
            ],
            [
                'film_id' => '5',
                'genre_id' => '8'
            ],[
                'film_id' => '4',
                'genre_id' => '8'
            ],[
                'film_id' => '4',
                'genre_id' => '13'
            ],

        ]);
    }
}
