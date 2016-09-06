<?php

use Illuminate\Database\Seeder;

class ShowtimestestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showtimestest')->insert([
            [
                'id' => 1,
                'date' => '2016-09-01',
                'film_id' => 1,
                'cinema_id' => 1,
                'screen1' => '14h30',
                'screen2' => '18h30',
                'screen3' => '21h'
            ],
            [
                'id' => 2,
                'date' => '2016-09-02',
                'film_id' => 1,
                'cinema_id' => 1,
                'screen1' => null,
                'screen2' => '18h30',
                'screen3' => '21h',
            ]
        ]);
    }
}
