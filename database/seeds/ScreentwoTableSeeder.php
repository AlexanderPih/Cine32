<?php

use Illuminate\Database\Seeder;

class ScreentwoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screentwos')->insert([
            [
                'time' => '18h30',
                'type_id' => 5
            ],
            [
                'time' => '18h30',
                'type_id' => 6
            ]
        ]);
    }
}
