<?php

use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([
            [
                'name' => 'Stephan James'
            ],
            [
                'name' => 'Jason Sudeikis'
            ],
            [
                'name' => 'Eli Goree'
            ],
            [
                'name' => 'Jeremy Irons'
            ],
            [
                'name' => 'Carice Ban Houton'
            ],
            [
                'name' => 'Jesse Eisenberg'
            ],
            [
                'name' => 'Mark Ruffalo'
            ],
            [
                'name' => 'Woody Harrelson'
            ],
            [
                'name' => 'Dave Franco'
            ],
            [
                'name' => 'Daniel Radcliffe'
            ],
            [
                'name' => 'Lizzy Caplan'
            ],
            [
                'name' => 'Jay Chou'
            ],
            [
                'name' => 'Sanaa Lahtan'
            ],
            [
                'name' => 'Philippe Lacheau'
            ],
            [
                'name' => 'François Damiens'
            ],
            [
                'name' => 'Willy Rovelli'
            ],
            [
                'name' => 'Florence Foresti'
            ],
            [
                'name' => 'colin Firth'
            ],
            [
                'name' => 'Jude Law'
            ],
            [
                'name' => 'Nicole Kidman'
            ],
            [
                'name' => 'Laura Linney'
            ],
            [
                'name' => 'Vanessa Kirby'
            ],
            [
                'name' => 'Guy Pearce'
            ],
            [
                'name' => 'Dominic West'
            ],
            [
                'name' => 'Demetri Goritsas'
            ],
            [
                'name' => 'Matt Damon'
            ],
            [
                'name' => 'Julia Stiles'
            ],
            [
                'name' => 'Tommy Lee Jones'
            ],
            [
                'name' => 'Alicia Vikander'
            ],
            [
                'name' => 'Vincent Cassell'
            ],
            [
                'name' => 'Riz Ahmed'
            ]
        ]);
    }
}
