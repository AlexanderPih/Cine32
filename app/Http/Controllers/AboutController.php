<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Member;

class AboutController extends Controller
{

    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    public function association()
    {
        return view('about.association');
    }

    public function member()
    {
        return view('about.member');
    }

    public function memberstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'firstname' => 'required',
            'address' => 'requried',
            'city' => 'required',
            'postal' => 'required|regex:\^[0-9]{5,5}$',
            'phone' => 'required|regex:\^(\d\d\s){4}(\d\d)$',
            'email' => 'required|email',
            'profession' => 'required',
            'birthday' => 'sometimes|date'
        ]);


    }

    public function history()
    {
        $histories = History::orderBy('year', 'desc')->get();


        return view('about.history')
            ->with('histories', $histories);
    }

    public function historyindex()
    {
        $histories = History::orderBy('year', 'desc')->get();

        return view('about.historyindex')
            ->with('histories', $histories)
            ->with('count', $this->count);
    }

    public function historyedit($id)
    {
        $history = History::find($id);

        return view('about.historyedit')
            ->with('history', $history)
            ->with('count', $this->count);
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

        return redirect()->route('history.index');
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

        return redirect()->route('history.index');
    }

    public function historydelete($id)
    {
        $history = History::find($id);

        $history->delete();

        Session::flash('success', 'L\'étape a été supprimée!');

        return redirect()->route('history.index');
    }

}
