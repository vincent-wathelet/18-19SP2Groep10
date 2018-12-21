<?php
/**
 * AllEventsController.php
 * Author: Abdelali Ez Zyn
 * Last update: 20/12/2018
 */
namespace App\Http\Controllers;

use App\Categorie;
use App\Event;
use App\Inschrijving;
use App\Notifications\UserSubscribeNotification;
use App\Notifications\UserUnSubscribeNotification;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class AllEventsController extends Controller
{

    public function subscribe(Request $request)
    {

        $user = Auth::user();

        $eventid = $request->eventId;
        $bevestigt = '0';
        $aanwezig = '0';
        $userEvents = Inschrijving::where(['eventid' => $eventid, 'userid' => $user->id])->get();
        $action = '';
        $event = Event::find($eventid);
        if ($userEvents->count() == 0) {

            $insert = Inschrijving::insert([
                'userid' => $user->id,
                'eventid' => $eventid,
                'bevestigt' => $bevestigt,
                'aanwezig' => $aanwezig
            ]);
            $action = 'insert';
            $user->notify(new UserSubscribeNotification($event));
        } else {

            $delete = Inschrijving::where('eventid', '=', $eventid)->where('userid', '=', $user->id)->delete();
            $action = 'delete';
            $user->notify(new UserUnSubscribeNotification($event));


        }
        return $action;
    }

    /* public function subscribedelete(Request $request)
    {
        $userid = '10';
        $eventid =  $request->eventId;
        $bevestigt = '0';
        $aanwezig = '0';

        $delete = Inschrijving::where('eventid', '=', $eventid)->where('userid', '=', $userid)->delete();
        return redirect('allevents');
    }   
 */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // All events filter 
    public function index(Request $request)
    {   
        $selectcategory = $request->selectcategory;

        $category = explode(",",$selectcategory);                    // Using explode function string convert array
        
        $categoriesEvents = [];
        $categories = Categorie::all();
        $categoriesArray = [];

        if (!empty($category) && !in_array(0, $category)) {
            $categoriesArray = $category;
        } else {
            $categoriesArray = $categories->pluck('id')->toArray();
        }

        foreach ($categoriesArray as $categoryId) {
            $cateogeryEvents = Event::where('categorieId', '=', $categoryId)->get();
            $categoriesEvents[$categoryId] = $cateogeryEvents;
        }

        if (empty($category) || in_array(0, $category)) {
            $categoriesArray = [0];
        }


        $ins = Inschrijving::where('userid', Auth::user()->id)->get();
        $userEvents = $ins->pluck('eventid')->toArray();


        if ($request->ajax()) {
            return view("shared.alleventslist", compact('categoriesEvents'))->with('categories', $categories)->with('categoriesArray', $categoriesArray)
                ->with('userEvents', $userEvents);
        } else {
            return view("allevents", compact('categoriesEvents'))->with('categories', $categories)->with('categoriesArray', $categoriesArray)
                ->with('userEvents', $userEvents);
        }
    }

    public function show($id)
    {
        $events = Event::Find($id);
        $inschrijving = $events->inschrijvings();

        return view("event")->with('event', $events)->with('inschrijving', $inschrijving);

        if($request->ajax()){
            return view("shared.alleventslist", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray)
            ->with('userEvents',$userEvents);                       // Ajax viwe page
        }else{
            return view("allevents", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray)
            ->with('userEvents',$userEvents);                       // Normal view page
        }
    }

    /*public function show($id)
    {
        $events = Event::Find($id);
        $inschrijving = $events->inschrijvings();

        return view("event")->with('event',$events)->with('inschrijving',$inschrijving);
    }*/
}