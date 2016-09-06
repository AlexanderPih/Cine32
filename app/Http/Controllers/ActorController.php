<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class ActorController extends Controller
{

    /**
     * Index page with all actors.
     * @return mixed
     */
    public function index()
    {
        $actors = Actor::orderBy('name')->get();

        return view('actor.index')->with('actors', $actors);
    }

    /**
     * Show Edit page with the given actor.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $actor = Actor::find($id);

        return view('actor.edit')->with('actor', $actor);
    }

    /**
     * Validate and Store an Actor into DB.
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'actorname' => 'required|max:255'
        ]);

        $actor = new Actor();

        $actor->name = $request->actorname;
        $actor->save();

        Session::flash('successActor', 'Acteur '. $actor->name . ' a été ajouté.');

        return redirect()->route('films.create');
    }

    /**
     * Update an Actor.
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $actor = Actor::find($id);
        $actor->name = $request->name;

        $actor->save();

        Session::flash('success', 'Modification enregistrée');

        return redirect()->route('actor.index');
    }
}
