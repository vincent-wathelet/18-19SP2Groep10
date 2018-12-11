<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Event;
use App\User;
use App\Inschrijving;
use App\Lokaal;
use App\Organisatoren;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvetsEntriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $organizations = Organisatoren::where('userId', Auth::User()->id)->get();
        

        return view('events', compact('organizations'));
    }

    public function detail()
    {
        $categories = Categorie::all();
        $lokaal = Lokaal::all();

        return view('eventdetails', compact('categories', 'lokaal'));
    }

    public function show($id)
    {
        $entries = Inschrijving::where('eventid', $id)->get();

        return view('myentries', compact('entries', 'id'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $lokaal = Lokaal::all();

        $user = Auth::User();
       
        return view('eventdetails', compact('categories', 'lokaal', 'user'));
    }

    public function save($id=null, Request $request)
    {
        if ($id) {
            $event = Event::find($id);
        } else {
            $event = new Event();
        }
        $event->categorieId = $request->categorieId;
        $event->naam = $request->naam;
        $event->lokaalId = $request->lokaalId;
        $event->begindate = date("Y-m-d H:i:s", strtotime($request->begindate));
        $event->enddate = date("Y-m-d H:i:s", strtotime($request->enddate));
        $event->description = $request->description;
        $event->maxInschrijvingen = $request->maxInschrijvingen;
        $event->hidden = 0;
        


        /* $new_startdate = date("Y-m-d H:i:s", strtotime($event->begindate));

        if (!is_null($event->enddate)) {
            $new_enddate = date("Y-m-d H:i:s", strtotime($event->enddate));

            $datetime1 = new DateTime($new_startdate);
            $datetime2 = new DateTime($new_enddate);

            $interval = date_diff($datetime1, $datetime2);
            $year = $interval->format('%Y');
            $month = $interval->format('%M');
            $day = $interval->format('%D');
            $hour = $interval->format('%H');
            $min = $interval->format('%I');
            $sec = $interval->format('%S');

            $res = "00".$year."-".$month."-".$day." ".$hour.":".$min.":".$sec;

            $event->date = $res;
        }

        $event->date = $new_startdate;
 */

       if (isset($request->autoaccept) && $request->autoaccept == 'on') {
            $event->autoaccept = true;
        } else {
            $event->autoaccept = false;
        }

        $event->save();
    
            if (!$id) {
                $organization = new Organisatoren();
            } else {
                $organization = Organisatoren::find($event->id);
            }
            $organization->eventId = $event->id;
            $organization->userId = Auth::User()->id;
           /*  $organization->naam = $request->naam; */
            $organization->save();
        return redirect('myevents');
    }


    public function delete($id) {
        
        Inschrijving::where('eventid', $id)->delete();
        Event::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id) {
        
        $event = Event::find($id);

//        $newdate = $event->addtime('2018-11-24 12:23:00', '0000-01-00 00:00:00');
//        return $newdate;


        $categories = Categorie::all();
        $lokaal = Lokaal::all();
        return view('eventdetails', compact('categories', 'lokaal', 'event'));
    }

    public function accept($id) {
        $entry = Inschrijving::find($id);

        if($entry->bevestigt == 1) {

            $entry->bevestigt = 0;
        } else if ($entry->bevestigt == 0) {

            $entry->bevestigt = 1;
        }

        $entry->save();
        return redirect()->back();
    }
}
