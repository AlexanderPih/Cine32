<?php

use Illuminate\Database\Seeder;

class CinemaFilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinema_film')->insert([
            [
                'cinema_id' => 1,
                'film_id' => 1
            ],
            [
                'cinema_id' => 2,
                'film_id' => 2
            ],
            [
                'cinema_id' => 1,
                'film_id' => 4
            ]
        ]);
    }
}
