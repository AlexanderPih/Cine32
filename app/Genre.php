<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cinema;
use DB;

class Genre extends Model
{

    /**
     * Relationship, one genre has many films
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function films()
    {
        return $this->belongsToMany('App\Film');
    }

    /**
     * Get all the films for the given cinema and the given genre
     *
     * @param $slug
     * @param $id
     * @return mixed
     */
    public static function filmsCinemaGenre($slug, $id)
    {
        $cinema_id = Genre::getCinemaId($slug);
        
        return DB::table('films')
            ->join('cinema_film', 'films.id', '=', 'cinema_film.film_id')
            ->join('film_genre', 'films.id', '=', 'film_genre.film_id')
            ->where('cinema_id', '=', $cinema_id)
            ->where('genre_id', '=', $id)
            ->select('*')
            ->get();
    }

    /**
     * Get all the films of the given genre
     *
     * @param $id
     * @return mixed
     */
    public static function filmsGenre($id)
    {
        return DB::table('films')
            ->join('film_genre', 'films.id', '=', 'film_genre.film_id')
            ->where('genre_id', '=', $id)
            ->select('*')
            ->get();
    }

    /**
     * Get all the films of the given cinema
     *
     * @param $slug
     * @return mixed
     */
    public static function filmsCinema($slug)
    {
        $cinema_id = Genre::getCinemaId($slug);
        return DB::table('films')
            ->join('cinema_film', 'films.id', '=', 'cinema_film.film_id')
            ->where('cinema_id', '=', $cinema_id)
            ->select('*')
            ->get();
    }

    /**
     * Get all the films for the given genre for the given cinema
     *
     * @param $slug
     * @param $id
     * @return mixed
     */
    public static function filmsGenreCinema($slug, $id)
    {
        $cinema_id = Genre::getCinemaId($id);
        return DB::table('films')
            ->join('cinema_film', 'films.id', '=', 'cinema_film.film_id')
            ->join('film_genre', 'films.id', '=', 'film_genre.film_id')
            ->where('cinema_id', '=', $cinema_id)
            ->where('genre_id', '=', $slug)
            ->select('*')
            ->get();
    }

    /**
     * Get the cinema id from slug
     * @param $slug
     * @return mixed
     */
    private static function getCinemaId($slug)
    {
        $cinema_Id = Cinema::where('slug', '=', $slug)->select('id')->get();
        return $cinema_Id[0]->id;
    }
}
