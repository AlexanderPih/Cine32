<?php

namespace App\Http\Controllers;

use App\Animation;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Purifier;

class AnimationController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Member::getCount();
    }

    /**
     * Show all the animations.
     *
     * @return mixed
     */
    public function index()
    {
        $animations = Animation::all();

        return view('animations.index')
            ->with('animations', $animations);
    }

    /**
     * Index page on admin side.
     *
     * @return mixed
     */
    public function adminIndex()
    {
        $animations = Animation::all();

        return view('animations.adminindex')
            ->with('animations', $animations)
            ->with('count', $this->count);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $animation = Animation::findOrFail($id);

        return view('animations.show')
            ->with('animation', $animation);
    }

    /**
     * Show the creation form
     *
     * @return mixed
     */
    public function create()
    {
        return view('animations.create')
            ->with('count', $this->count);
    }

    /**
     * Validate and store.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body'  => 'required',
            'date'  => 'required|date',
            'photo' => 'sometimes'
        ]);

        $animation = new Animation();

        $animation->title = $request->title;
        $animation->body  = Purifier::clean($request->title);
        $animation->date  = Carbon::parse($request->date)->format('Y m d');
        $animation->reservation = $request->reservation;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = $animation->title . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/animations/' . $filename);
            Image::make($image)->save($location);

            $animation->photo = $filename;
        }

        $animation->save();

        Session::flash('success', 'Animation enregistrée!');

        return redirect()->route('animation.index');
    }
}
