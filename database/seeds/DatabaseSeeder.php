<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(ActorsTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        $this->call(ActorFilmTableSeeder::class);
        $this->call(DirectorsTableSeeder::class);
        $this->call(DirectorFilmTableSeeder::class);

        $this->call(CinemasTableSeeder::class);
        $this->call(CinemaFilmTableSeeder::class);

        $this->call(ClassificationTableSeeder::class);
        $this->call(DatesSeeder::class);

        $this->call(GenresTableSeeder::class);
        $this->call(FilmGenreTableSeeder::class);

        $this->call(ShowtimesSeeder::class);
        $this->call(TarifsTableSeeder::class);
        $this->call(TimesSeeder::class);
        $this->call(TypesSeeder::class);

        $this->call(HistoryTableSeeder::class);*/

        //test:
        $this->call(ShowtimestestSeeder::class);

    }
}
