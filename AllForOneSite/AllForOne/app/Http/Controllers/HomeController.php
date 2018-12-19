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
    public function index()
    {
       
        return redirect('homepage');
       
    }

    public function check(Request $request){
        $user = Auth::user();
        $id = Auth::id();

        if($user['admin'] == 1){
            
            return redirect('admin-dashboard');
        }
        elseif($user['admin'] == 0){
            Session::flash('alert-danger', 'You are not authorized to access Admin!');
            return redirect('homepage');
        }

    }
}
