<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventDetailsController extends Controller
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

        return view('eventdetails');
    }

    

    public function insert(Request $request){
        $titel = $request->input('titel');
        $categorie = $request->input('categorie');
        $startdatum = $request->input('startdatum');
        $einddatum = $request->input('einddatum');
        $autoaccept = $request->input('autoaccept');
        $computer = $request->input('computer');
        $lokaal = $request->input('lokaal');
        $lokalen = $request->input('lokalen');
        $description = $request->input('description');

        DB::insert('insert into event (titel) values(?)',[$titel]);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
     }
}