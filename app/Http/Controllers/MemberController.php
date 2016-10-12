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
        //$this->middleware('auth');

        $this->count = Member::getCount();
    }

    /**
     * Show all members (admin side)
     * @return mixed
     */
    public function index()
    {
        $members = Member::all();

        return view('member.index')
            ->with('members', $members)
            ->with('count', $this->count);
    }

    /**
     * Show the new members page.
     * @return mixed
     */
    public function newMembers()
    {
        $members = Member::where('treatement', '=', 0)->get();

        return view('member.new')
            ->with('members', $members)
            ->with('count', $this->count);
    }

    /**
     * Update a member
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $member = Member::findOrFail($id);

        $member->treatement = 1;
        $member->save();

        Session::flash('success', 'La demande d\'adhérer a été traité.');

        return redirect()->route('member.new');
    }

    /**
     * Show a member
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);

        return view('member.show')
            ->with('member', $member)
            ->with('count', $this->count);
    }
}
