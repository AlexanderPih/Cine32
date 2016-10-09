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
use App\Member;

class FilmController extends Controller
{

    private $count;

    /**
     * Create, store and update only for authenticated users.
     * FilmController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index', 'show']]);

        $this->count = Member::getCount();
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

        return view('admin.filmsindex')
            ->with('films', $films)
            ->with('count', $this->count);
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

            $showtimes = Showtime::where('id', '=', $film_id)->get();

            // TODO: get cinema name
            $cinema = Cinema::lists('name')->where('slug', '=', $slug);

        }
        // $slug is cinema, show film with given cinemas screenings:
        if($isCinema) {
            $film = Film::where('slug', '=', $name)->first();
            // TODO: show screenings of the film for the given cinema

            $film_id = $film->id;
            $cinema = Cinema::where('slug', '=', $slug)->first();
            $cinema_id = $cinema->id;

            $showtimes = Showtime::where('film_id', '=', $film_id)->where('cinema_id', '=', $cinema_id)->get();

        }



        return view('films.show')
            ->with('film', $film)
            ->with('showtimes', $showtimes);
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
            ->with('directors', $directors)
            ->with('count', $this->count);
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

        Session::flash('success', 'Le Film '. $film->title . ' a été enregistré.');

        return redirect()->route('adminfilms.index');
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
            ->with('genres', $genres)
            ->with('count', $this->count);;
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
     * Filter the selection of films.
     * @param $slug
     * @param $name
     * @return mixed
     */
    public function filter($slug, $name = "")
    {

        // cinema is selected first, then genre or the other way round:
        if ($this->isCinema($slug) && !empty($name)) {

            $films = Film::filmsCinemaGenre($slug, $name);

            // get the names for display on filter
            $genreName = $name;
            $cinemaName = $this->getCinemaName($slug);


        // $slug is given, $name is empty, $slug can be cinema or genre
        } elseif ($slug && empty($name)) {

            // if $slag is genre: genre filter
            if ($this->isGenre($slug)) {

                $id = Film::getGenreId($slug);
                $films = Film::filmsGenre($id);

                // only genre name is required
                $genreName = $slug;
                $cinemaName = null;

                // $slug is cinema: cinema filter
            } else {
                $films = Film::filmsCinema($slug);

                // only cinema name is required
                $cinemaName = $this->getCinemaName($slug);
                $genreName = null;
            }
        }


        // get all cinemas and genres for the filter section
        $cinemas = Cinema::all();
        $genres = Genre::all();
        return view('films.index')
            ->with('films', $films)
            ->with('cinemas', $cinemas)
            ->with('genres', $genres)
            ->with('genreName', $genreName)
            ->with('cinemaName', $cinemaName);
    }


    /**
     * Get genre name for display on filter in view
     * @param $name
     * @return mixed
     */
    private function getGenreName($name)
    {
        $genreName = Genre::where('name', '=', $name)->select('name')->get();
        $genreName = $genreName[0]->name;

        return $genreName;
    }


    /**
     * Get cinema name for display on filter in view
     * @param $slug
     * @return mixed
     */
    private function getCinemaName($slug)
    {
        $cinemaName = Cinema::where('slug', '=', $slug)->select('name')->get();
        $cinemaName = $cinemaName[0]->name;

        return $cinemaName;
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

    private function isGenre($search)
    {
        $objects = Genre::lists('name');
        $array = $objects->toArray();

        $result = in_array($search, $array);

        return $result;
    }

}
