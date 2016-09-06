<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            [
                'title'               => 'Jason Bourne',
                'slug'                => 'jason-bourne',
                'classification_id'   => '1',
                'synopsis'            => 'La traque de Jason Bourne par les services secrets américains se poursuit. Des îles Canaries à Londres en passant par Las Vegas...',
                'nationality'         => 'USA',
                'runtime'             => '123',
                'year'                => '2016',
                'poster'              => 'jason-bourne.jpg',
                'trailer'             => 'euya1zwQ6U0'
            ],
            [
                'title'               => 'Comme des Bêtes',
                'slug'                => 'comme-des-betes',
                'classification_id'   => '1',
                'synopsis'            => 'La vie secrète que mènent nos animaux domestiques une fois que nous les laissons seuls à la maison pour partir au travail ou à l’école.',
                'nationality'         => 'USA',
                'runtime'             => '87',
                'year'                => '2016',
                'poster'              => 'comme-des-betes.jpg',
                'trailer'             => 'IJf_wGAtPk0'
            ],
            [
                'title'               => 'Insaisissables 2',
                'slug'                => 'insaisissables-2',
                'classification_id'   => '1',
                'synopsis'            => 'Un an après avoir surpassé le FBI et acquis l’admiration du grand public grâce à leurs tours exceptionnels, les 4 Cavaliers reviennent ! 
Pour leur retour sur le devant de la scène, ils vont dénoncer les méthodes peu orthodoxes d’un magnat de la technologie à la tête d’une vaste organisation criminelle.
Ils ignorent que cet homme d’affaires, Walter Marbry, a une longueur d’avance sur eux, et les conduit dans un piège : il veut que les magiciens braquent l’un des systèmes informatiques les plus sécurisés du monde. Pour sortir de ce chantage et déjouer les plans de ce syndicat du crime, ils vont devoir élaborer le braquage le plus spectaculaire jamais conçu.',
                'nationality'         => 'USA',
                'runtime'             => '125',
                'year'                => '2016',
                'poster'              => 'insaisissables-2.jpg',
                'trailer'             => '0iGn57DVJIc'
            ],
            [
                'title'               => 'La Couleur De La Victoire',
                'slug'                => 'la-couleur-de-la-victoire',
                'classification_id'   => '1',
                'synopsis'            => 'Dans les années 30, Jesse Owens, jeune afro-américain issu du milieu populaire, se prépare à concourir aux Jeux d’été de 1936 à Berlin. Cependant, alors qu’Owens lutte dans sa vie personnelle contre le racisme ambiant, les Etats-Unis ne sont pas encore certains de participer à ces Jeux, organisés en Allemagne nazie. Le débat est vif entre le président du Comité Olympique Jeremiah Mahoney et le grand industriel Avery Brundage. Pourtant, la détermination de Jesse à se lancer dans la compétition est intacte…',
                'nationality'         => 'Canada, Allemand',
                'runtime'             => '123',
                'year'                => '2016',
                'poster'              => 'la-couleur-de-la-victoire.jpg',
                'trailer'             => 'IJf_wGAtPk0'
            ],
            [
                'title'               => 'Genius',
                'slug'                => 'genius',
                'classification_id'   => '1',
                'synopsis'            => 'Écrivain à la personnalité hors du commun, Thomas Wolfe est révélé par le grand éditeur Maxwell Perkins, qui a découvert F. Scott Fitzgerald et Ernest Hemingway. Wolfe ne tarde pas à connaître la célébrité, séduisant les critiques grâce à son talent littéraire fulgurant. 
Malgré leurs différences, l\'auteur et son éditeur nouent une amitié profonde, complexe et tendre, qui marquera leur vie à jamais.',
                'nationality'         => 'Britannique, Américain',
                'runtime'             => '104',
                'year'                => '2016',
                'poster'              => 'genius.jpg',
                'trailer'             => 'XFKfJUuvSdc'
            ]
        ]);
    }
}
