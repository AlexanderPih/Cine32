<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class MemberController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    public function index()
    {
        $members = Member::all();

        return view('member.index')
            ->with('count', $this->count)
            ->with('members', $members);
    }

    public function newMembers()
    {
        $members = Member::where('treatement', '=', 0)->get();

        return view('member.new')
            ->with('members', $members)
            ->with('count', $this->count);
    }

    public function update($id)
    {
        $member = Member::findOrFail($id);

        $member->treatement = 1;
        $member->save();

        Session::flash('success', 'La demande d\'adhérer a été traité.');

        return redirect()->route('member.new');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        return view('member.show')
            ->with('member', $member)
            ->with('count', $this->count);
    }
}
