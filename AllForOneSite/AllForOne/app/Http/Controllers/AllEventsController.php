<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Event;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AllEventsController extends Controller
{

    public function subscribe(Request $request)
    {
       /*  $id = Auth::user()['id'];
        $currentuser = User::find($id); */


        
       /*  print_r($request[$eventid']);
        exit(); */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        
        $selectcategory = $request->selectcategory;

        $category = explode(",",$selectcategory);    
        
       /*  print_r($categories);
        exit(); */

        $categoriesEvents = [];
        $categories = Categorie::all();
        $categoriesArray = [];

        if(!empty($category) && !in_array(0,$category)){
            $categoriesArray = $category;
        } else{
           $categoriesArray = $categories->pluck('id')->toArray();
        }

        foreach ($categoriesArray  as $categoryId){
            $cateogeryEvents = Event::where('categorieId', '=',  $categoryId)->get();
            $categoriesEvents[$categoryId] = $cateogeryEvents;
        }
          
        if(empty($category) || in_array(0,$category)){
            $categoriesArray = [0];
        }

        if($request->ajax()){
            return view("shared.alleventslist", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray);
        }else{
            return view("allevents", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray);
        }
    }
    public function show($id)
    {
        $events = Event::Find($id);
        $inschrijving = $events->inschrijvings();

        return view("event")->with('event',$events)->with('inschrijving',$inschrijving);

    }
    
}
