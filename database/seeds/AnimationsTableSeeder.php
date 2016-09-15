<?php

use Illuminate\Database\Seeder;

class AnimationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animations')->insert([
            [
                'title' => 'CinEspaña',
                'body'  => '20h-Concert de Abarrejadis 
21h - projection de PACO DE LUCÍA, LÉGENDE DU FLAMENCO
Bulletin de réservation en bas de page

20h-Concert de Abarrejadis

Trio né dans le Gers en 2008, son nom est issu d’un mot occitan qui veut dire "pèle mêle", d’où une musique mélangée, entre jazz et musique espagnole.

21h - projection de PACO DE LUCÍA, LÉGENDE DU FLAMENCO 

Documentaire de Curro Sánchez (1h32)
On le pensait timide, réservé, toujours sérieux en interview. Et voilà Paco de Lucía, dieu du flamenco (et de la guitare en général), qui se met à nu face à la caméra de son fils, se livrant avec ­décontraction sur son rapport à la création, au rythme, au flamenco, à la célébrité ou à l’improvisation... Avec ces images tournées avant la mort de son père, en 2014, Curro Sánchez Varela nous convie dans l’inti­mité du maestro comme personne ne l’avait jamais fait. D’autres artistes témoignent (John McLaughlin, Chick Corea, Jorge Pardo ou encore Rubén Blades...), mais c’est cette confession assumée du musicien andalou, avec ses doutes et ses névroses, qui fait la réussite du film : un document d’exception, émouvant pour les fans comme pour les néophytes, dont chaque palo joué invite à dévorer dans son intégralité l’oeuvre d’un génie de ce siècle.',
                'date'        => '2016-09-19',
                'photo'       => 'cinespana.jpg',
                'reservation' => true
            ]
        ]);
    }
}
