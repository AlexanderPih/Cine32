<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class AboutController extends Controller
{

    public function association()
    {
        return view('about.association');
    }

    public function history()
    {
        $histories = History::orderBy('year', 'desc')->get();

        return view('about.history')->with('histories', $histories);
    }

    public function historyindex()
    {
        $histories = History::orderBy('year', 'desc')->get();

        return view('about.historyindex')->with('histories', $histories);
    }

    public function historyedit($id)
    {
        $history = History::find($id);

        return view('about.historyedit')->with('history', $history);
    }

    public function historystore(Request $request)
    {
        $this->validate($request, [
            'year' => 'required|max:4',
            'body' => 'required'
        ]);

        $history = new History();

        $history->year = $request->year;
        $history->body = $request->body;

        $history->save();

        Session::flash('success', 'Etape enregistrée!');

        return redirect()->route('about.historyindex');
    }

    public function historyupdate(Request $request, $id)
    {
        $this->validate($request, [
            'year' => 'required|max:4',
            'body' => 'required'
        ]);

        $history = History::find($id);

        $history->year = $request->year;
        $history->body = $request->body;

        $history->save();

        Session::flash('success', 'L\'étape a été modifiée!');

        return redirect()->route('about.historyindex');
    }

    public function historydelete($id)
    {
        $history = History::find($id);

        $history->delete();

        Session::flash('success', 'L\'étape a été supprimée!');

        return redirect()->route('about.historyindex');
    }
}
