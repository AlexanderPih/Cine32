<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Member;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class ActorController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    /**
     * Index page with all actors.
     * @return mixed
     */
    public function index()
    {
        $actors = Actor::orderBy('name')->get();

        return view('actor.index')
            ->with('actors', $actors)
            ->with('count', $this->count);;
    }

    /**
     * Show Edit page with the given actor.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $actor = Actor::find($id);

        return view('actor.edit')
            ->with('actor', $actor)
            ->with('count', $this->count);;
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
