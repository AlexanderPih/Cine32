<?php

namespace App\Http\Controllers;

use App\Cinema;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function cinemas()
    {
        $cinemas = Cinema::all();

        return view('admin.cinemas')->with('cinemas', $cinemas);
    }
}
