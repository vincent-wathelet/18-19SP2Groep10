<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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


   
   /*  public function index()
    {
        return view('homepage');
    } */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // Home page view function
    public function index()
    {
       
        return redirect('homepage');
       
    }

    // check  admin or user 

    public function check(Request $request){
        $user = Auth::user();
        $id = Auth::id();

        if($user['admin'] == 1){                    //admin 1 equal 1 You are authorized to access Admin
            return redirect('admin-dashboard'); 
        }
        elseif($user['admin'] == 0){                 //admin 1 !equal 1 You are not authorized to access Admin
            Session::flash('alert-danger', 'You are not authorized to access Admin!');
            return redirect('homepage');
        }

    }
}
