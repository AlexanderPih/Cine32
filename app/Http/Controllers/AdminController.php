<?php

namespace App\Http\Controllers;

use App\Cinema;
use Illuminate\Http\Request;
use App\Member;
use App\Http\Requests;

class AdminController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    public function index()
    {
        return view('admin.index')
            ->with('count', $this->count);
    }


}
