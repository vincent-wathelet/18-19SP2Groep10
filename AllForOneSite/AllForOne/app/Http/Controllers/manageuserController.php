<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Organisatoren;
use App\Inschrijving;

class manageuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // User verzenden naar view
    public function index()
    {
        $users = User::all();
        return view('manageusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('manageusers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    // Userid verzenden naar view 
    public function edit($id)
    {
        $users = User::find($id);
        return view('manageusersedit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    // Bewerken userdata
    public function update(Request $request)
    {
        $users = User::find($request->id);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->admin = $request->admin;
        $users->banned = $request->banned;

        $users->save();

        return redirect('manage-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    // Userdata verwijderen
    public function delete(Request $request, $id)
    {

        $users = User::find($id);
        $events_array = [];
        $orgs = Organisatoren::where('userId', $id)->get();

        foreach ($orgs as $org) {
            $ins = Inschrijving::where('eventid', $org['eventId']);
            $ins->delete();
            $insch = Inschrijving::where('userid', $id);
            $insch->delete();
            $events_array[] = Event::find($org->eventId);
        }

        $orgs = Organisatoren::where('userId', $id)->delete();

        foreach ($events_array as $event_element) {
            $event_element->delete();
        }

        $users->delete();

        return redirect('manage-users');
    }

    public function notifications(Request $request)
    {
        return $request->user()->notifications;
    }

    public function notificationsBlade(Request $request)
    {
        $notifications = $request->user()->notifications;
        return view('notifications', compact('notifications'));
    }
}