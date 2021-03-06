<?php
/**
 * ManageUsersController.php
 * Author: Abdelali Ez Zyn
 * Last update: 20/12/2018
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Organisatoren;
use App\Inschrijving;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // User data fetch function
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

    // User page view function
    public function create()
    {
        return view('manageusers');
    }

    // User create page view function
    public function regcreate(Request $request)
    {
        return view('manageusercreate');
    }
    
    // User data store database function
    public function regstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'confirmed'
        ]);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->admin = $request->admin;
        $users->banned = $request->banned;
        $users->save();

        return redirect('manage-users-create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // User data edit function 
    public function edit($id)
    {
        $users = User::find($id);
        return view('manageusersedit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // User data update function
    public function update(Request $request)
    {
        $users = User::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->admin = $request->admin;
        $users->banned = $request->banned;
        $users->password =  Hash::make($request->password);
        $users->save();
        
        return redirect('manage-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // User Data information delete at the time Organisatoren and Inschrijving data delete
    public function delete(Request $request, $id )
    {
        $users = User::find($id);
        $events_array = [];
        $orgs = Organisatoren::where('userId', $id)->get();
            foreach($orgs as $org){ 
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
}