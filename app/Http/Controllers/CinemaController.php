<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cinema;
use App\Tarif;
use Storage;
use Session;
use Image;

class CinemaController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Show all cinemas on index page
     *
     * @return view
     */
    public function index()
    {
        $cinemas = Cinema::all();

        return view('cinemas.index')->with('cinemas', $cinemas);
    }

    /**
     * Show the given Cinema
     *
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {
        $cinema = Cinema::where('slug', '=', $slug)->first();
        $tarifs = Tarif::all();

        return view('cinemas.show')->with('cinema', $cinema)->with('tarifs', $tarifs);
    }

    public function edit($id)
    {
        $cinema = Cinema::find($id);

        return view('cinemas.edit')->with('cinema', $cinema);
    }

    public function update(Request $request, $id)
    {
        /*$this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required',
            'phone1' => 'sometimes|regex:#^0[1-68]([-. ]?[0-9]{2}){4}$#',
            'phone2' => 'sometimes|regex:#^0[1-68]([-. ]?[0-9]{2}){4}$#',
            'email' => 'required|email',
            'screens' => 'required',
            'lat' => 'required|regex:"/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/"'
        ]);*/
        $rules = [
            'name'    => ['required' , 'max:255'],
            'address' => ['required'],
            'phone1'  => ['sometimes', 'regex:#^0[1-68]([-. ]?[0-9]{2}){4}$#'],
            'phone2'  => ['sometimes', 'regex:#^0[1-68]([-. ]?[0-9]{2}){4}$#'],
            'email'   => ['required', 'email'],
            'screens' => ['required'],
            'photo'   => ['image'],
            'lat'     => ['required', 'regex:^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$^'],
            'lng'     => ['required', 'regex:^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$^']
        ];
        $this->validate($request, $rules);

        $cinema = Cinema::find($id);

        $cinema->name = $request->name;
        $cinema->address = $request->address;
        $cinema->phone1 = $request->phone1;
        $cinema->phone2 = $request->phone2;
        $cinema->email = $request->email;
        $cinema->screens = $request->screens;
        $cinema->lat = $request->lat;
        $cinema->lng = $request->lng;

        if($request->hasFile('photo')) {
            $oldfilename = $cinema->photo;
            Storage::disk('cinemadisk')->delete($oldfilename);
            
            $image = $request->file('photo');
            $filename = $cinema->slug . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/cinemas/' . $filename);
            Image::make($image)->save($location);


            $cinema->photo = $filename;

        }

        $cinema->save();

        Session::flash('success', 'Modifications enregistrées.');

        return redirect()->route('admin.cinemas');
    }
}
