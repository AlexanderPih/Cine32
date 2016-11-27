<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Film extends Model
{

    /**
     * Relationship between films and directors.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function directors()
    {
        return $this->belongsToMany('App\Director');
    }
    
    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function classification()
    {
        return $this->belongsTo('App\Classification');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function cinemas()
    {
        return $this->belongsToMany('App\Cinema');
    }

    /**
     * Get all the films for the given cinema and the given genre
     *
     * @param $slug
     * @param $name
     * @return mixed
     */
    public static function filmsCinemaGenre($slug, $name)
    {
        $cinema_id = Film::getCinemaId($slug);
        $id = Film::getGenreId($name);
    
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
        $cinema_id = Film::getCinemaId($slug);
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
     * @param $name
     * @return mixed
     */
    public static function filmsGenreCinema($slug, $name)
    {
        $cinema_id = Film::getCinemaId($name);
        return DB::table('films')
            ->join('cinema_film', 'films.id', '=', 'cinema_film.film_id')
            ->join('film_genre', 'films.id', '=', 'film_genre.film_id')
            ->where('cinema_id', '=', $cinema_id)
            ->where('genre_name', '=', $slug)
            ->select('*')
            ->get();
    }

    /**
     * Get the cinema id from slug
     * @param $slug
     * @return mixed
     */
    public static function getCinemaId($slug)
    {
        $cinema_Id = Cinema::where('slug', '=', $slug)->select('id')->get();
        return $cinema_Id[0]->id;
    }

    /**
     * Get the genre id from genre name
     * @param $name
     * @return mixed
     */
    public static function getGenreId($name)
    {
        $genreId = Genre::where('slug', '=', $name)->select('id')->get();
        return $genreId[0]->id;
    }
}
