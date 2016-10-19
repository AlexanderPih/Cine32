<?php

namespace App\Http\Controllers;

use App\Association;
use App\History;
use App\Report;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mews\Purifier\Purifier;
use Session;
use App\Http\Requests;
use App\Member;
use GuzzleHttp\Client;
use Image;

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
        $association = Association::get()->first();
        $pdfs = Report::all()->sortByDesc('year');

        return view('about.association')
            ->with('association', $association)
            ->with('pdfs', $pdfs);
    }

    /**
     * Load edit page of the presentation of the association.
     * @return mixed
     */
    public function editassociation()
    {
        $association = Association::get()->first();

        return view('about.editassociation')
            ->with('association', $association)
            ->with('count', $this->count);
    }

    public function updateassociation(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $association = Association::findOrFail($id);

        $association->description = clean($request->description);
        $association->timestamps = false;

        $association->save();

        Session::flash('success', 'Modification enregistrée!');

        return redirect()->route('edit.association');

    }

    /**
     * Save Annual Report pdf
     * @param Request $request
     * @return mixed
     */
    public function reportstore(Request $request)
    {
        $this->validate($request, [
            'pdf' => 'mimes:pdf',
            'year' => 'required|max:4'
        ]);

        $pdf = new Report();

        $pdf->year = $request->year;
        $pdf->timestamps = false;

        if($request->hasFile('pdf')) {
            $filename = $request->year . '.' . $request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move(public_path('pdf/') , $filename);

            $pdf->pdf = $filename;
        }

        $pdf->save();

        Session::flash('success', "Rapport sauvegardé!");

        return redirect()->route('edit.association');
    }

    /**
     * Load public team page
     * @return mixed
     */
    public function team()
    {
        $teams = Team::all();

        return view('about.team')
            ->with('teams', $teams);
    }

    /**
     * Load admin team page
     * @return mixed
     */
    public function adminteam()
    {
        $teams = Team::all();

        return view('about.adminteam')
            ->with('teams', $teams)
            ->with('count', $this->count);
    }

    public function teamedit($id)
    {
        $member = Team::findOrFail($id);

        return view('about.teamedit')
            ->with('member', $member)
            ->with('count', $this->count);
    }

    /**
     * Update a member.
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function teamupdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'phone' => 'sometimes',
            'email' => 'sometimes',
            'photo' => 'sometimes'
        ]);

        $member = Team::findOrFail($id);

        $member->name = $request->name;
        $member->title = $request->title;
        $member->phone = $request->phone;
        $member->email = $request->email;

        if($request->hasFile('photo')) {
            $oldfilename = $member->photo;
            Storage::disk('memberdisk')->delete($oldfilename);

            $image = $request->file('photo');
            $filename = $member->str_slug($member->name). '.' . $image->getClientOriginalExtension();
            $location = public_path('img/team/' . $filename);
            Image::make($image)->sace($location);

            $member->photo = $filename;
        }

        $member->save();

        Session::flas('success', 'Membre modifié!');

        return redirect()->route('admin.team');
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
