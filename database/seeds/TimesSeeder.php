<?php

use Illuminate\Database\Seeder;

class TimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        db::table('times')->insert([
            [
                'time' => '15h'
            ],
            [
                'time' => '21h'
            ]
        ]);
    }
}
