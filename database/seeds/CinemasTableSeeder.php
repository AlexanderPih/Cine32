<?php

use Illuminate\Database\Seeder;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinemas')->insert([
            [
            'name'    => 'Auch',
            'slug'    => 'auch',
            'address' => 'Allée des Arts 32000 Auch',
            'phone1'  => '0562606111',
            'phone2'  => '0562606104',
            'email'   => 'anim@cine32.com',
            'screens' => '5',
            'photo'   => 'auch.jpg',
            'lat'     => '43.651725',
            'lng'     => '0.593232'
            ],
            [
            'name'    => 'Vic-Fezensac',
            'slug'    => 'vic-fezensac',
            'address' => '6 Place Julie St Avit',
            'phone1'  => null,
            'phone2'  => '0562644090',
            'email'   => 'cinequanoncinevic@free.fr',
            'screens' => '1',
            'photo'   => 'vic-fezensac.jpg',
            'lat'     => '43.757939',
            'lng'     => '0.302690'
            ]
        ]);
    }
}
