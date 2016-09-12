<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Member;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class ClassificationController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    public function index()
    {
        $classifications = Classification::all();

        return view('classification.index')
            ->with('classifications', $classifications)
            ->with('count', $this->count);
    }

    public function edit($id)
    {
        $classification = Classification::find($id);

        return view('classification.edit')
            ->with('classification', $classification)
            ->with('count', $this->count);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $classification = Classification::find($id);

        $classification->name = $request->name;
        $classification->save();

        Session::flash('success', 'Modification enregistrée');

        return redirect()->route('classification.index');
    }
}
