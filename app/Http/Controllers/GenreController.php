<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Genre;
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

    /**
     * Show all genres.
     * @return mixed
     */
    public function genres()
    {
        $genres = Genre::all();

        return view('admin.genres')
            ->with('genres', $genres)
            ->with('count', $this->count);;
    }

    /**
     * Call the edit Genre page.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $genre = Genre::find($id);

        return view('genres.edit')
            ->with('genre', $genre)
            ->with('count', $this->count);
    }

    /**
     * Update Genre
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $genre = Genre::find($id);

        $genre->name = $request->name;
        $genre->slug = str_slug($request->name);

        $genre->save();

        Session::flash('success', 'Modification sauvegardée.');

        return redirect()->route('admin.genres');
    }

}
