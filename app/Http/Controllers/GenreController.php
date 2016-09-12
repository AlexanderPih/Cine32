<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cinema;
use App\Genre;
use DB;
use Session;

class GenreController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    /**
     * Show all genres.
     * @return mixed
     */
    public function index()
    {
        $genres = Genre::all();

        return view('genre.index')
            ->with('genres', $genres);
    }

    public function genres()
    {
        $genres = Genre::all();

        return view('admin.genres')
            ->with('genres', $genres)
            ->with('count', $this->count);;
    }

    public function edit($id)
    {
        $genre = Genre::find($id);

        return view('genres.edit')
            ->with('genre', $genre)
            ->with('count', $this->count);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $genre = Genre::find($id);

        $genre->name = $request->name;

        $genre->save();

        Session::flash('success', 'Modification sauvegardée.');

        return redirect()->route('admin.genres');
    }

    /**
     * Filter the selection of films.
     * @param $slug
     * @param null $id
     * @return mixed
     */
    public function cinema($slug, $id = null)
    {
        // cinema is selected first, then genre:
        if ($slug && ($id != null)) {

            $films = Genre::filmsCinemaGenre($slug, $id);

            // get the names for display on filter
            $genreName = $this->getGenreName($id);
            $cinemaName = $this->getCinemaName($slug);
            // genreId is needed for cinema selector url (if genre has been selected first)
            $genreId = $id;


        // $slug is given, $id is null, $slug can be string or numerical (so $slug can be slug, or id)
        } elseif ($slug && ($id === null)) {
            // $slag is numeric: genre filter
            if (is_numeric($slug)) {
                $id = $slug;
                $films = Genre::filmsGenre($id);

                // only genre name is required
                $genreName = $this->getGenreName($id);
                $cinemaName = null;
                // genreId is needed for cinema selector url (if genre has been selected first)
                $genreId = $id;

            // $slug is string: cinema filter
            } else {

                $films = Genre::filmsCinema($slug);

                // only cinema name is required
                $cinemaName = $this->getCinemaName($slug);
                $genreName = null;
                // genreId is needed for cinema selector url (if genre has been selected first)
                $genreId = $id;
            }
        // genre is selected first, then cinema:
        } elseif (is_numeric($slug) && is_string($id)) {

            $films = Genre::filmsGenreCinema($slug, $id);

            // get the names for display on filter
            $genreName = $this->getGenreName($slug);
            $cinemaName = $this->getCinemaName($id);
        }

        // get all cinemas and genres for the filter section
        $cinemas = Cinema::all();
        $genres = Genre::all();
        return view('films.index')
            ->with('films', $films)
            ->with('cinemas', $cinemas)
            ->with('genres', $genres)
            ->with('genreName', $genreName)
            ->with('cinemaName', $cinemaName)
            ->with('genreId', $genreId);
    }


    /**
     * Get genre name for display on filter in view
     * @param $id
     * @return mixed
     */
    private function getGenreName($id)
        {
            $genreName = Genre::where('id', '=', $id)->select('name')->get();
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

}
