<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class DirectorController extends Controller
{

    /**
     * Show all Directors on index page.
     * @return mixed
     */
    public function index()
    {
        $directors = Director::orderBy('name')->get();

        return view('director.index')->with('directors', $directors);
    }

    /**
     * Edit the given Director.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $director = Director::find($id);

        return view('director.edit')->with('director', $director);
    }

    /**
     * Validate and Store Director into DB.
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'directorname' => 'required|max:255'
        ]);

        $director = new Director();

        $director->name = $request->directorname;
        $director->save();

        Session::flash('successDirector', 'Réalisateur '. $director->name . ' à été crée.');

        return redirect()->route('films.create');
    }
}
