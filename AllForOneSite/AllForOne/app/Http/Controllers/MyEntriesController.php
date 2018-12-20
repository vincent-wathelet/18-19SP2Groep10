<?php

namespace App\Http\Controllers;

use App\Inschrijving;
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
        //redirect & store entry in array entries
    }


    public function delete($id) {
        Inschrijving::find($id)->delete();
        return redirect()->back();
        //redirect
    }
}