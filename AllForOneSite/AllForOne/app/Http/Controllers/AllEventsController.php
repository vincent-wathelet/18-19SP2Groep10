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
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class AllEventsController extends Controller
{

    // Subscribe function
    public function subscribe(Request $request)
    {
        
        $userid = Auth::user()['id'];                   // Current user ID
        $eventid =  $request->eventId;
        $bevestigt = '0';
        $aanwezig = '0';
        $userEvents = Inschrijving::where(['eventid'=>$eventid,'userid'=>$userid])->get(); // Inschrijving check eventid and userid
        $action = '';

        if($userEvents->count() == 0){                  // $userEvents check als 0 == 0 to insert data      
            $insert = Inschrijving::insert([
                'userid' => $userid,
                'eventid' => $eventid,
                'bevestigt' => $bevestigt,
                'aanwezig' => $aanwezig
            ]);
          $action = 'insert';                           // Ajax action insert
        } else{                                         // $userEvents check als 0 != 0 to delete data  
            $delete = Inschrijving::where('eventid', '=', $eventid)->where('userid', '=', $userid)->delete();
            $action = 'delete';                         // Ajax action delete
        }

        return $action; // Return action
    }

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

        if(!empty($category) && !in_array(0,$category)){            // $category check als not empty and not in_array 
            $categoriesArray = $category;                   
        } else{
           $categoriesArray = $categories->pluck('id')->toArray();  // $category check als empty and in_array
        }

        foreach ($categoriesArray  as $categoryId){
            $cateogeryEvents = Event::where('categorieId', '=',  $categoryId)->get();
            $categoriesEvents[$categoryId] = $cateogeryEvents;
        }
          
        if(empty($category) || in_array(0,$category)){               // $category check als empty or in_array 
            $categoriesArray = [0];
        }

        $ins = Inschrijving::where('userid', Auth::user()['id'])->get();        
        $userEvents = $ins->pluck('eventid')->toArray();

        if($request->ajax()){
            return view("shared.alleventslist", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray)
            ->with('userEvents',$userEvents);                       // Ajax viwe page
        }else{
            return view("allevents", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray)
            ->with('userEvents',$userEvents);                       // Normal view page
        }
    }

    public function show($id)
    {
        $events = Event::Find($id);
        $inschrijving = $events->inschrijvings();

        return view("event")->with('event',$events)->with('inschrijving',$inschrijving);
    }
}