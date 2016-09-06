<?php

use Illuminate\Database\Seeder;

class DirectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directors')->insert([
            [
                'name' => 'Paul Greengrass'
            ],
            [
                'name' => 'Michael Grandage'
            ],
            [
                'name' => 'Yarrow Cheney'
            ],
            [
                'name' => 'Chris Renaud'
            ],
            [
                'name' => 'Jon M. Chu'
            ],
            [
                'name' => 'Stephen Hopkins'
            ]
        ]);
    }
}
