<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Classification;
use App\Director;
use App\Genre;
use App\Showtime;
use App\Showtimestest;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;
use App\Film;
use App\Cinema;
use DB;
use Session;

class FilmController extends Controller
{

    /**
     * Create, store and update only for authenticated users.
     * FilmController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show all films
     * @return mixed
     */
    public function index()
    {
        $films = Film::all();
        $cinemas = Cinema::all();
        $genres = Genre::all();


        return view('films.index')
            ->with('films', $films)
            ->with('cinemas', $cinemas)
            ->with('genres', $genres);
    }

    public function adminindex()
    {
        $films = Film::all();

        return view('admin.filmsindex')->with('films', $films);
    }

    /**
     * Show films with screenings for the given film for all cinemas or the given one
     * @param $slug
     * @param null $name
     * @return mixed
     */
    public function show($slug, $name = null)
    {
        /*TODO:
        2 options here: $slug can be cinema->slug or film->slug. This needs to be sorted out first.
        
        if $slug = film->slug, then show the film with all cinema screenings

        if $slug = cinema->slug, then show the film with the screenings from that cinema.
        for that: I have the cinema_id.

        */

        // Check if $slug is the slug of cinema
        $isCinema = $this->isCinema($slug);

        // if $slug is not the slug of cinema, then there is no cinema->slug passed through.
        // Therefore, show film with all cinema screenings:
        if(!$isCinema) {
            $film = Film::where('slug', '=', $slug)->first();
            $film_id = $film->id;
            // TODO: show all cinemas and the films screenings
            $showtimes = DB::table('showtimes')
                ->join('showtimedates', 'showtimedates.id', '=', 'showtimedates_id')
                ->join('cinemas', 'cinema_id', '=', 'cinemas.id')
                ->join('showtimes_times', 'showtimes_times.showtimes_id', '=', 'showtimes.id')
                ->join('times', 'times.id', '=', 'showtimes_times.times_id')
                ->join('times_types', 'times_types.times_id', '=', 'times.id')
                ->join('types', 'times_types.types_id', '=', 'types.id')
                ->where('showtimes.film_id', '=', $film_id)
                ->select('cinemas.name as cinemaName', 'showtimeDate', 'times.time as time', 'types.name as type')
                ->get();

        }
        // $slug is cinema, show film with given cinemas screenings:
        if($isCinema) {
            $film = Film::where('slug', '=', $name)->first();
            // TODO: show screenings of the film for the given cinema

            $film_id = $film->id;
            $cinema = Cinema::where('slug', '=', $slug)->first();
            $cinema_id = $cinema->id;

            $showtimes = Showtimestest::where('film_id', '=', $film_id)->where('cinema_id', '=', $cinema_id)->get();




            /*$showtimes = DB::table('showtimes')
                ->join('showtimedates', 'showtimedates.id', '=', 'showtimedates_id')
                ->join('cinemas', 'cinema_id', '=', 'cinemas.id')
                ->join('showtimes_times', 'showtimes_times.showtimes_id', '=', 'showtimes.id')
                ->join('times', 'times.id', '=', 'showtimes_times.times_id')
                ->join('times_types', 'times_types.times_id', '=', 'times.id')
                ->join('types', 'times_types.types_id', '=', 'types.id')
                ->where('showtimes.cinema_id', '=', $cinema_id)
                ->where('showtimes.film_id', '=', $film_id)
                ->select('cinemas.name as cinemaName', 'showtimeDate', 'times.time as time', 'types.name as type')
                ->get();*/

            //dd($showtimes);
        }



        return view('films.show')->with('film', $film)->with('showtimes', $showtimes);
    }

    /**
     * Load the Create Film page with all the necessary data for the selections.
     * @return mixed
     */
    public function create()
    {
        $classifications = Classification::lists('name', 'id');
        $genres = Genre::lists('name', 'id');
        $actors = Actor::lists('name', 'id');
        $directors = Director::lists('name', 'id');

        return view('films.create')
            ->with('classifications', $classifications)
            ->with('genres', $genres)
            ->with('actors', $actors)
            ->with('directors', $directors);
    }

    /**
     * Validates Form Input and Stores it in the DB.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'synopsis'    => 'required',
            'nationality' => 'required',
            'runtime'     => 'required',
            'year'        => 'required|digits:4',
            'trailer'     => 'required',
            'poster'      => 'required|image'
        ]);

        $film = new Film();

        $film->title = $request->title;
        $film->slug  = str_slug($request->title, '-');
        $film->classification_id = $request->classification_id[0];
        $film->synopsis = $request->synopsis;
        $film->nationality = $request->nationality;
        $film->runtime = $request->runtime;
        $film->year = $request->year;
        $film->trailer = $request->trailer;
        
        if($request->hasFile('poster')) {
            $image = $request->file('poster');
            $filename = $film->slug . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/posters/' . $filename);
            Image::make($image)->save($location);

            $film->poster = $filename;
        }

        $film->save();

        $film->genres()->sync($request->genre_id, false);
        $film->actors()->sync($request->actor_id, false);
        $film->directors()->sync($request->director_id, false);
    }

    /**
     * Load the edit page with all relevant data.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $film            = Film::find($id);
        $directors       = Director::lists('name', 'id');
        $actors          = Actor::lists('name', 'id');
        $classifications = Classification::lists('name', 'id');
        $genres          = Genre::lists('name', 'id');

        return view('films.edit')
            ->with('film', $film)
            ->with('directors', $directors)
            ->with('actors', $actors)
            ->with('classifications', $classifications)
            ->with('genres', $genres);
    }

    /**
     * Update film.
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'synopsis'    => 'required',
            'nationality' => 'required',
            'runtime'     => 'required',
            'year'        => 'required|digits:4',
            'trailer'     => 'required',
            'poster'      => 'image'
        ]);

        $film = Film::find($id);

        $film->title = $request->title;
        $film->slug  = str_slug($request->title, '-');
        $film->classification_id = $request->classification_id[0];
        $film->synopsis = $request->synopsis;
        $film->nationality = $request->nationality;
        $film->runtime = $request->runtime;
        $film->year = $request->year;
        $film->trailer = $request->trailer;

        $film->save();

        if($request->hasFile('poster')) {
            $oldfilename = $film->poster;
            Storage::disk('filmdisk')->delete($oldfilename);

            $image = $request->file('poster');
            $filename = $film->slug . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/posters/' . $filename);
            Image::make($image)->save($location);

            $film->poster = $filename;
        }

        // if xxx_id list is empty, we sync with an empty array to erase all previous tags
        // if xxx_id list is not empty, we sync with the selected ids
        // TODO: xxx_id shouldn't be empty, change all this:
        if(isset($request->genre_id)) {
            $film->genres()->sync($request->genre_id, true);
        } else {
            $film->genres()->sync(array());
        }
        if(isset($request->director_id)) {
            $film->directors()->sync($request->director_id, true);
        } else {
            $film->directors()->sync(array());
        }
        if(isset($request->actor_id)) {
            $film->actors()->sync($request->actor_id, true);
        } else {
            $film->actors()->sync(array());
        }

        Session::flash('success', 'Le film ' . $film->title . ' a été modifiée.');

        return redirect()->route('adminfilms.index');
    }

    /**
     * Checks if $search (which is a slug) corresponds to a cinema slug.
     *
     * @param $search
     * @return true or false
     */
    private function isCinema($search)
    {
        $objects = Cinema::lists('slug');
        $array = $objects->toArray();

        $result = in_array($search, $array);

        return $result;
    }

}
