<?php

use Illuminate\Database\Seeder;

class ScreenoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screenones')->insert([
            [
                'time' => '14h30',
                'type_id' => 6
            ]
        ]);
    }
}
