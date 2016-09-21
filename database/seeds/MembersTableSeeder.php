<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->truncate();

        $faker = Faker::create('fr_FR');

        foreach(range(1,10) as $index)
        {
            DB::table('members')->insert([
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'postal' => $faker->postcode,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'profession' => $faker->jobTitle,
                'birthday' => $faker->dateTimeThisDecade($max = 'now'),
                'treatement' => $faker->boolean
            ]);
        }
    }
}
