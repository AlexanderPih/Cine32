<?php

use Illuminate\Database\Seeder;

class DirectorFilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('director_film')->insert([
            [
                'film_id' => 1,
                'director_id' => 1
            ],
            [
                'film_id' => 2,
                'director_id' => 3
            ],
            [
                'film_id' => 2,
                'director_id' => 4
            ],
            [
                'film_id' => 3,
                'director_id' => 5
            ],
            [
                'film_id' => 4,
                'director_id' => 6
            ],
            [
                'film_id' => 5,
                'director_id' => 2
            ],

        ]);
    }
}
