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
    public function index()
    {
        $categories = Categorie::all();
        return view("allEvents")->with('categories',$categories);
    }
    public function show($id)
    {
        $events = Event::Find($id);
        $inschrijving = $events->inschrijvings();

        return view("event")->with('event',$events)->with('inschrijving',$inschrijving);

    }

}
