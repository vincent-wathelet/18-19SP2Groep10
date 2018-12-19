<?php

namespace App\Http\Controllers;

use App\Inschrijving;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyEntriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Inschrijving::where('userid', Auth::user()->id)->get();

        return view('myeventsentries', compact('entries'));
    }

    public function details($id)
    {
        $evententries = Event::find($id);

        /* echo "<pre>"; print_r($evententries); "</pre>";
        exit(); */

        return view('myevententriesdetails', compact('evententries'));
    }

    public function delete($id) {
        Inschrijving::find($id)->delete();
        return redirect()->back();
    }
}