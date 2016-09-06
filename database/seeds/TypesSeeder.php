<?php

use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'SN'
            ],
            [
                'name' => 'dès 3 ans'
            ],
            [
                'name' => 'dès 6 ans'
            ],
            [
                'name' => 'dès 7 ans'
            ],
            [
                'name' => '2d'
            ],
            [
                'name' => '3d'
            ],
            [
                'name' => 'VO'
            ],
            [
                'name' => 'JLC'
            ]
        ]);
    }
}
