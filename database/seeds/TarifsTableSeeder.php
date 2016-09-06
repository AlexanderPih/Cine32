<?php

use Illuminate\Database\Seeder;

class TarifsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifs')->insert([
            [
                'name'  => 'full',
                'value' => '7.00'
            ],
            [
                'name'  => 'reduced',
                'value' => '5.50'
            ],
            [
                'name'  => 'member',
                'value' => '5.00'
            ],
            [
                'name'  => 'whitch',
                'value' => '4.00'
            ],
            [
                'name'  => 'screening',
                'value' => '4.00'
            ],
            [
                'name'  => 'jlc',
                'value' => '3.00'
            ],
            [
                'name'  => 'kid',
                'value' => '4.50'
            ],
            [
                'name'  => 'rsa',
                'value' => '3.00'
            ],
            [
                'name'  => 'threed',
                'value' => '1.00'
            ],
            [
                'name'  => 'card',
                'value' => '55.00'
            ],
            [
                'name'  => 'single',
                'value' => '20.00'
            ],
            [
                'name'  => 'couple',
                'value' => '35.00'
            ]
        ]);
    }
}
