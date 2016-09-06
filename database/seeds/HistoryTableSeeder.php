<?php

use Illuminate\Database\Seeder;

class HistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history')->insert([
            [
                'year' => '1967',
                'body' => 'Un ciné-club voit le jour au Lycée Salinis d’Auch sous l’impulsion d’un professeur de lettres, Alain Bouffartigue.'
            ],
            [
                'year' => '1971',
                'body' => 'Installation du ciné-club dans les locaux de la FALEP.'
            ],
            [
                'year' => '1978',
                'body' => ' La FALEP ouvre rue Lafayette la salle Ciné 32 à vocation art et essai : quatrième écran à Auch, à côté du Familia, du Rex et de l’Eden. '
            ],
            [
                'year' => '1978',
                'body' => 'Le 19/10, 103 spectateurs assistent à la première séance publique de Ciné 32. Padre padrone.'
            ],
            [
                'year' => '1983',
                'body' => 'Ouverture de la deuxième salle au premier étage. Ouverture par la FALEP de salles Ciné 32 en collaboration avec les communes à Samatan, Mauvezin, Castéra Verduzan, puis Masseube. '
            ],
            [
                'year' => '1984',
                'body' => 'Acquisition en viager des salles du circuit Brana (Condom, Eauze, Fleurance, Nogaro, Mirande, Vic-Fezensac) suivie de Barbotan (location) puis l’Isle Jourdain et Gimont.'
            ],
            [
                'year' => '1985',
                'body' => 'Débuts d’une entente régionale de programmation en Midi-Pyrénées qui, en dix ans, va finir par représenter près d’un million de spectateurs par an. '
            ],
            [
                'year' => '1987',
                'body' => 'Acquisition par Ciné 32 du complexe Le Rex, la seule salle privée restée ouverte à Auch, devenu Ciné 32 Alsace : la FALEP assure désormais la charge des quatre salles d’Auch et de celles du département (à l’exception de deux communes). '
            ],
            [
                'year' => '1986/88',
                'body' => 'La fréquentation baissant inexorablement, comme partout en France, les salles d’Auch ne peuvent compenser le déficit de l’ensemble. Démarches multiples auprès des communes puis du Département pour sauver le cinéma. '
            ],
            [
                'year' => '1988',
                'body' => 'Réunion plénière du Conseil Général entièrement consacrée au sauvetage et à la relance du cinéma dans le Gers où les propositions de la FALEP sont soumises à la réflexion des élus du département et des communes concernées. Création de l’Association Ciné 32 distincte de la FALEP. '
            ],
            [
                'year' => '1989',
                'body' => 'Signature de la première convention Etat/Département, la première de ce type en France, avec un volet Cinéma décisif (notamment le plan Cinéma Jeunesse).'
            ],
            [
                'year' => '1991',
                'body' => 'Mise en place de projets d’école, lancement de l’opération " La Première séance " en direction du Jeune Public. '
            ],
            [
                'year' => '1992',
                'body' => 'A la suite de Milou en Mai, création des Régies de Gascogne qui veut encourager le tournage de films dans le Département : Le sourire de Claude Miller (1994), Le bonheur est dans le pré de Etienne Chatiliez (1995), L’arrière-pays de Jacques Nolot (1998), André le magnifique de Thibault Staib et Emmanuel Silvestre, (1999)… '
            ],
            [
                'year' => '1992',
                'body' => 'Parrainage de Ciné 32 par Daniel Toscan du Plantier avec le soutien du Centre National de la Cinématographie (C.N.C.) et de l’Agence pour le Développement Régional du Cinéma (A.D.R.C.) '
            ],
            [
                'year' => '1995',
                'body' => 'Création d’une 3ème salle rue Lafayette. '
            ],
            [
                'year' => '1998',
                'body' => '1ère édition du Festival Ciné 32 " Indépendance(s) et Création " pour les vingt ans de Ciné 32. '
            ],
            [
                'year' => '1999',
                'body' => 'Ciné 32 et la SAGEC constituent un GIE de programmation regroupant leurs deux ententes, avec la volonté de promouvoir le cinéma de proximité : 204 écrans sur 24 départements, 2 millions et demi de spectateurs, une majorité de films recommandés art et essai. Accueil de la douzième édition du festival biennal du film d’animation en collaboration avec l’AFCA (Association française du cinéma d’animation) qui avait lieu alors à Marly-Le-Roy. '
            ],
            [
                'year' => '2009',
                'body' => 'Création de Véo, SNC en remplacement de SAGEC-Ciné32, qui regroupe aujourd’hui 258 salles de cinéma. '
            ],
            [
                'year' => '2009',
                'body' => 'Juin: Lors de l’assemblée générale de l’association, le Maire d’Auch annonce qu’un terrain à la caserne d’Espagne sera cédé à Ciné32 pour accueillir le projet de construction d’un nouveau complexe cinématographique. '
            ],
            [
                'year' => '2010',
                'body' => 'Mars: Le collectif encore heureux architectes est retenu pour l’élaboration du projet. (www.encoreheureux.org)'
            ],
            [
                'year' => '2009',
                'body' => 'A Auch , 4 318 séances, 430 films ont été présentés (hors festival). plus des deux tiers des séances étaient composées de films recommandés Art et Essai. Films recommandés Art et Essai : 48% des séances Films français : 35 % des titres. Nombre d’entrées : 129 318

Dans le Gers (sans Auch) : Sur 5 569 séances, 462 films ont été présentés. Les films français représentaient 36% de la programmation. Films recommandés Art et Essai : 47 % des séances. Films français : 36% des titres. Nombre d’entrées : 168 285'
            ],
            [
                'year' => '2010',
                'body' => 'A Auch , 4 177 séances, 435 films ont été présentés (hors festival). plus des deux tiers des séances étaient composées de films recommandés Art et Essai. Films recommandés Art et Essai : 46% des séances Films français : 40 % des titres. Nombre d’entrées : 131 060

Dans le Gers (sans Auch) : Sur 5 662 séances, 468 films ont été présentés. Nombre d’entrées : 158 923 '
            ],
            [
                'year' => '2012',
                'body' => 'A Auch , le 13 juin, ouverture du complexe de 5 salles sur le nouveau site'
            ]
        ]);
    }
}
