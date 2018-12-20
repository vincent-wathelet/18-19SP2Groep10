<?php
/**
 * EventDetailsController.php
 * Author: Abdelali Ez Zyn
 * Last update: 20/12/2018
 */
namespace App\Http\Controllers;
use App\Event;
use App\Organisatoren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show($id){
        if(Organisatoren::where(['eventid'=>$id,'userId'=> Auth::User()->id])->first() != null )  {
             return view('event',['event'=> Event::find($id)]);
        }else{
            return redirect('myEntries');
        }       
    }
}