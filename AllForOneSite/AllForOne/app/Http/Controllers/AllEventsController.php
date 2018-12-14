<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Event;
use Illuminate\Http\Request;

class AllEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoriesEvents = [];
        $categories = Categorie::all();
        $categoriesArray = [];

        if(isset($request['selectcategory']) && !in_array(0,$request['selectcategory'])){
            $categoriesArray = $request['selectcategory'];
        } else{
            $categoriesArray = $categories->pluck('id')->toArray();
        }
        foreach (  $categoriesArray  as $categoryId){

            $cateogeryEvents = Event::where('categorieId', '=',  $categoryId)->get();

            $categoriesEvents[$categoryId] = $cateogeryEvents;
        }
        if(!isset($request['selectcategory']) || in_array(0,$request['selectcategory'])){
            $categoriesArray = [0];
        }

        return view("allEvents", compact('categoriesEvents'))->with('categories',$categories)->with('categoriesArray',$categoriesArray);
    }
    public function show($id)
    {
        $events = Event::Find($id);
        $inschrijving = $events->inschrijvings();

        return view("event")->with('event',$events)->with('inschrijving',$inschrijving);

    }

}