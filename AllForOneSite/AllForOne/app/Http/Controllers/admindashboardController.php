<?php
/**
 * AdminDashboardController.php
 * Author: Abdelali Ez Zyn
 * Last update: 20/12/2018
 */
namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Inschrijving;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Show user and event and subscribe count function
    public function index(Request $request)
    {
        $users = User::all()->count();  
        $eventstotal = Event::all()->count(); 
        $subscribe = Inschrijving::all()->count();

        return view('admindashboard', compact('users'))->with(compact('eventstotal'))->with(compact('subscribe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Admin dashboard page create view
    public function create()
    {
        return view('admindashboard');
    }
}