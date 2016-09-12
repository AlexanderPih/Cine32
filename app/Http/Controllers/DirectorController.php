<?php

namespace App\Http\Controllers;

use App\Director;
use App\Member;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class DirectorController extends Controller
{

    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }
    /**
     * Show all Directors on index page.
     * @return mixed
     */
    public function index()
    {
        $directors = Director::orderBy('name')->get();

        return view('director.index')
            ->with('directors', $directors)
            ->with('count', $this->count);;
    }

    /**
     * Edit the given Director.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $director = Director::find($id);

        return view('director.edit')
            ->with('director', $director)
            ->with('count', $this->count);
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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $director = Director::find($id);

        $director->name = $request->name;
        $director->save();

        Session::flash('successDirector', 'Le nom du réalisateur a été modifié.');

        return redirect()->route('director.index');
    }
}
