<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            [
                'pdf'  => '2015.pdf',
                'year' => '2015'
            ],
            [
                'pdf'  => '2014.pdf',
                'year' => '2014'
            ],
            [
                'pdf'  => '2013.pdf',
                'year' => '2013'
            ],
            [
                'pdf'  => '2012.pdf',
                'year' => '2012'
            ],
        ]);
    }
}
