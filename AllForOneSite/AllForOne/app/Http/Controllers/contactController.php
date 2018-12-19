<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\Catgegorie;
use App\Event;
use Illuminate\Http\Request;

class contactController extends Controller
{

    // heeft de pagina
    public function index()
    {

        return view('contact');
    }

    // bewerkt de contact from data
    public  function SenForm(Request $request)
    {
        //TODO: hier moet de afhandeling van contct form komen
    }
}