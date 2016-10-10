<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            [
                'name' => 'Alain Bouffartigue',
                'title' => 'Président',
                'phone' => '0562606119',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Sylvie Buscail',
                'title' => 'Déléguée Générale, Programmation',
                'phone' => '0562606102',
                'email' => 'prog@cine32.com',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Carine Vene',
                'title' => 'Administration',
                'phone' => '0562606113',
                'email' => 'carine.vene@cine32.com',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Sabine Mendousse',
                'title' => 'Comptabilité Générale',
                'phone' => '0562606112',
                'email' => 'gestion@cine32.com',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Marie-Héléne Claverie',
                'title' => 'Coordination',
                'phone' => '0562606101',
                'email' => 'mariehelene.claverie@cine32.com',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Alice Faure',
                'title' => 'Communication, Logistique des animations, Centres aérés',
                'phone' => '0562606118',
                'email' => 'anim@cine32.com',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Julie Farge',
                'title' => 'Comtabilité Ciné32 et affiches',
                'phone' => '0562606111',
                'email' => 'comta@cine32.com',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Nicolas Dufor',
                'title' => 'Projectionniste Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Bernard Villanueva',
                'title' => 'Projectionniste Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Sylvain Paradis',
                'title' => 'Projectionniste Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Vincent Laurens',
                'title' => 'Café Ciné',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Talliesin Amouroux',
                'title' => 'Café Ciné',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Pascale Cheneau',
                'title' => 'Café Ciné',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Marion Buono',
                'title' => 'Caissière Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Cécile Masson',
                'title' => 'Caissière Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Emmanuelle Charrier',
                'title' => 'Caissière Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Evangéline Despin-Guitard',
                'title' => 'Caissière Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Jane Bellido Mucha Cazeaux',
                'title' => 'Agent Entretien Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Fatima Ouaddan',
                'title' => 'Agent Entretien Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Najwa Ouaddan',
                'title' => 'Agent Entretien Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Shiman El Amrani',
                'title' => 'Agent Entretien Auch',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ],
            [
                'name' => 'Brigitte Vidal',
                'title' => 'Distribution Communication',
                'phone' => '',
                'email' => '',
                'photo' => 'default.jpg'
            ]
        ]);
    }
}
