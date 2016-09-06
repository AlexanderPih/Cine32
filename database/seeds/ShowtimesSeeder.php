<?php

use Illuminate\Database\Seeder;

class ShowtimesSeeder extends Seeder
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
                'film_id' => '1',
                'cinema_id' => '1',
                'showtimedates_id' => '1'
            ],
            [
                'film_id' => '1',
                'cinema_id' => '1',
                'showtimedates_id' => '2'
            ],
        ]);
    }
}
