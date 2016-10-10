<?php

namespace App\Http\Controllers;

use App\History;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Member;
use GuzzleHttp\Client;

class AboutController extends Controller
{

    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    /**
     * View for the association page.
     * @return mixed
     */
    public function association()
    {
        return view('about.association');
    }

    public function team()
    {
        $teams = Team::all();

        return view('about.team')
            ->with('teams', $teams);
    }

    /**
     * View for the member form on public side.
     * @return mixed
     */
    public function member()
    {
        return view('member.member');
    }

    /**
     * Store the member request in DB.
     * @param Request $request
     * @return mixed
     */
    public function memberstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'firstname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'profession' => 'required',
            'birthday' => 'sometimes|date'
        ]);

        //regex:\^[0-9]{5,5}$\
        //|regex:\^(\d\d\s){4}(\d\d)$\

        // google recaptcha
        $token = $request->input('g-recaptcha-response');

        if($token) {
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params'  => [
                    'secret'   => '6Len9ikTAAAAAIiBjz34bY8fzMayUl9LzrMYgyVx',
                    'response' => $token
                ]
            ]);
            $result = json_decode($response->getBody()->getContents());

            if($result->success) {
                $member = new Member();

                $member->name       = $request->name;
                $member->firstname  = $request->firstname;
                $member->address    = $request->address;
                $member->city       = $request->city;
                $member->postal     = $request->postal;
                $member->phone      = $request->phone;
                $member->email      = $request->email;
                $member->profession = $request->profession;


                if($request->birthday) {
                    $member->birthday = Carbon::parse($request->birthday)->format('Y-m-d');
                } else {
                    $member->birthday = 0;
                }

                $member->save();

                Session::flash('success', 'Votre demande d\'adhérer a été envoyée!');

                return redirect()->route('about.member');
            } else {
                Session::flash('error', 'Echec de l\'envoi du formulaire. Merci de reessayer dans quelques instants');

                return redirect()->route('about.member');
            }
        } else {
            return redirect()->route('about.member');
        }

    }

    /**
     * View for the History page public side.
     * @return mixed
     */
    public function history()
    {
        $histories = History::orderBy('year', 'desc')->get();


        return view('about.history')
            ->with('histories', $histories);
    }

    /**
     * View for the history index admin side.
     * @return mixed
     */
    public function historyindex()
    {
        $histories = History::orderBy('year', 'desc')->get();

        return view('about.historyindex')
            ->with('histories', $histories)
            ->with('count', $this->count);
    }

    /**
     * Edit a history entry.
     * @param $id
     * @return mixed
     */
    public function historyedit($id)
    {
        $history = History::find($id);

        return view('about.historyedit')
            ->with('history', $history)
            ->with('count', $this->count);
    }

    /**
     * Save history entry to DB.
     * @param Request $request
     * @return mixed
     */
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

    /**
     * Update a history entry.
     * @param Request $request
     * @param $id
     * @return mixed
     */
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

    /**
     * Delete a history entry.
     * @param $id
     * @return mixed
     */
    public function historydelete($id)
    {
        $history = History::find($id);

        $history->delete();

        Session::flash('success', 'L\'étape a été supprimée!');

        return redirect()->route('history.index');
    }

}
