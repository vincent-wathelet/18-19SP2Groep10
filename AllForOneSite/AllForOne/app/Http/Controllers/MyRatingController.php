<?php

namespace App\Http\Controllers;
use App\Event;
use App\Feedbackevent;
use App\Feedbackuser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MyRatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
     {
            return view('Rating');
     }

     public function addeventrevieuw(Request $request)
     {

         Feedbackevent::updateOrCreate(['userId' => Auth::user()->id,'eventId' => $request['eventid']],['titel' => $request['EventTitel'], 'tekst' => $request['EventText']]);
         return back();

     }

     public function getUserReview($idUser,$eventid)
     {
            $event = Event::where('id',$eventid)->firstOrFail();
            $user = User::where('id' , $idUser)->firstOrFail();
            return view('userreviewenter')->with('event',$event)->with('user',$user);
     }
    public function adduserrevieuw(Request $request)
    {
        //Feedbackuser::updateOrCreate([]);
        return $request;
    }
}