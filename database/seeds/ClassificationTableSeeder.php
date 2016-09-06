<?php

use Illuminate\Database\Seeder;

class ClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classifications')->insert([
            [
                'name' => 'Tous public'
            ],
            [
                'name' => 'Tous public avec avertissement'
            ],
            [
                'name' => 'Interdit aux moins de 12 ans'
            ],
            [
                'name' => 'Interdit aux moins de 12 ans avec avertissement'
            ],
            [
                'name' => 'Interdit aux moins de 16 ans'
            ],
            [
                'name' => 'Interdit aux moins de 16 ans avec avertissement'
            ]
        ]);
    }
}
