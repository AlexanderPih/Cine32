<?php

use Illuminate\Database\Seeder;

class ShowtimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showtimes')->insert([
            [
                'id' => 1,
                'date' => '2016-09-10',
                'film_id' => 1,
                'cinema_id' => 1,
                'screenone_id' => 1,
                'screentwo_id' => 1,
                'screenthree_id' => 1
            ],
            [
                'id' => 2,
                'date' => '2016-09-11',
                'film_id' => 1,
                'cinema_id' => 1,
                'screenone_id' => null,
                'screentwo_id' => 2,
                'screenthree_id' => 2,
            ]
        ]);
    }
}
