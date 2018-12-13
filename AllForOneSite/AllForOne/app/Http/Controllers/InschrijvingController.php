<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/12/2018
 * Time: 03:55
 */

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\Auth;

use App\Inschrijving;

class InschrijvingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function Inschrijven($id)
    {
        if (Event::Find($id))
        {
            $event = Event::Find($id);
            if ($event->autoaccept == true) {
                Inschrijving::updateOrCreate(['eventid' => $id, 'userid' => Auth::user()->id], ['active' => 1, 'bevestigt' => 1,'aanwezig' =>0]);
            }
            else
            {
                Inschrijving::updateOrCreate(['eventid' => $id, 'userid' => Auth::user()->id], ['active' => 1, 'bevestigt' => 0,'aanwezig' =>0]);
            }
        }
        return back();
    }
    public  function Uitschrijven($id)
    {
        if (Event::Find($id))
        {
            Inschrijving::updateOrCreate(['eventid' => $id, 'userid' => Auth::user()->id],['active' => 0, 'bevestigt' => 0, 'aanwezig' =>0]);
        }
        return back();
    }

}