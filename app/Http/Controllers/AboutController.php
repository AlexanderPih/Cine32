<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

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
}
