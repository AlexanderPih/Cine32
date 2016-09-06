<?php

use Illuminate\Database\Seeder;

class DatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showtimeDates')->insert([
            [
                'showtimeDate' => '2016-08-16'
            ],
            [
                'showtimeDate' => '2016-08-17'
            ]
        ]);
    }
}
