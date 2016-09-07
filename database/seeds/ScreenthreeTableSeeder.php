<?php

use Illuminate\Database\Seeder;

class ScreenthreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screenthrees')->insert([
            [
                'time' => '14h30',
                'type_id' => 6
            ],
            [
                'time' => '21h',
                'type_id' => 6
            ]
        ]);
    }
}
