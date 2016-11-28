<?php

use Illuminate\Database\Seeder;

class AssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('associations')->insert([
            'text' => "L’association Ciné 32 a progressivement mis en place pour l’ensemble du Gers un dispositif interassociatif permettant à chaque association de gérer librement le cinéma de sa commune. 
- Ciné 32 coordonne ainsi la diffusion et l’animation dans les 23 salles du département et assure, au sein de l’entente de programmation SAGEC-Ciné 32 devenu VEO, la programmation de 244 salles dans 24 départements, dont une soixantaine en Midi-Pyrénées. 
- Une politique d’accueil de tournages a également été mise en place avec les Régies de Gascogne. 
- De nombreux débats et rencontres avec des professionnels du cinéma : cinéastes, acteurs, techniciens, critiques,..

La coordination départementale Toutes les salles du Gers (19 écrans au total) sont gérées par des associations locales et regroupées au sein de Ciné 32 qui assure le rôle de programmation, coordination, conseil, régulation, de formation ainsi que la totalité des tâches administratives et d’organisation à travers son Centre de Soutien Logistique.

Le Plan Cinéma Jeunesse Il s’applique de la maternelle à la terminale : Un film pour tous, Ecole au Cinéma, Collège au Cinéma, Lycéens et Jeunes au Cinéma en Midi-Pyrénées, formation d’enseignants, interventions dans les classes...

Le festival Indépendance(s) et création L’ambition de ce festival, qui prolonge le travail conduit depuis vingt-quatre ans par Ciné 32, est simple : défendre et illustrer une certaine idée du cinéma qui, au sein du mouvement Art et Essai, va de pair avec la réalité vivante des salles de proximité. Montrer ces films d’aujourd’hui, qui résistent à l’uniformisation du prêt à consommer, et les aider à rencontrer leur public, c’est le premier moyen pour résister : l’esprit d’indépendance n’a de sens que s’il encourage la création, que s’il stimule le désir de la découverte et le plaisir de la surprise. Un festival pas comme les autres, sans paillettes ni palmarès, où il est affirmé que le cinéma, ici comme ailleurs, est bien vivant si nous le faisons vivre.

L’accueil de tournage - Les Régies de Gascogne Les Régies de Gascogne accueillent des réalisateurs, des régisseurs et des équipes de tournage. Elles mettent à disposition leur connaissance du terrain, des sites et des décors ainsi qu’un fichier de techniciens, acteurs et figurants. Elles peuvent aider dans leurs démarches administratives, le choix de prestataires de service, la recherche de figuration et de casting local ainsi que pour l’intendance journalière. "
        ]);
    }
}
