<?php

namespace App\Http\Controllers;

use App\Classification;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class ClassificationController extends Controller
{

    public function index()
    {
        $classifications = Classification::all();

        return view('classification.index')->with('classifications', $classifications);
    }

    public function edit($id)
    {
        $classification = Classification::find($id);

        return view('classification.edit')->with('classification', $classification);
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
