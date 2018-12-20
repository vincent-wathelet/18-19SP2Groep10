<?php
/**
 * AdminController.php
 * Author: Abdelali Ez Zyn
 * Last update: 20/12/2018
 */
namespace App\Http\Controllers;

use App\Event;
use App\Categorie;
use App\Lokaal;
use App\Inschrijving;
use App\Organisatoren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Query\Builder;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Event Fetch function
    public function index()
    {
        $admins = Event::all();
        return view('adminevents', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Event viewpage function
    public function create()
    {
        return view('adminevents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    // Event show function
    public function show(Request $request, $id)
    {
        $entries = Inschrijving::where('eventid', $id)->get();
        return view('adminentries', compact('entries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    // Event edit function 
    public function edit($id)
    {
        $admins = Event::find($id);
        $categories = Categorie::all();
        $lokaal = Lokaal::all();

        return view('admineventsedit', compact('categories', 'lokaal', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    // Event update function
    public function save($id=null, Request $request)
    {
        if ($id) {
            $admins = Event::find($id);
        } else {
            $admins = new Event();
        }

        if(isset($request->eventimage)){
            $imageupload = $request->file('eventimage');
            $fileExt = $imageupload->getClientOriginalExtension();
            $uploadPath ='uploadPic';
            $randomFileName = str_random(10).'.'.$fileExt;
            $imageupload->move($uploadPath, $randomFileName);
            $admins->eventimage = $randomFileName;
        }
        
        $admins->categorieId = $request->categorieId;
        $admins->naam = $request->naam;
        $admins->lokaalId = $request->lokaalId;
        $admins->begindate = date("Y-m-d H:i:s", strtotime($request->begindate));
        $admins->enddate = date("Y-m-d H:i:s", strtotime($request->enddate));
        $admins->description = $request->description;
        $admins->maxInschrijvingen = $request->maxInschrijvingen;
        $admins->eventimage = $randomFileName;
        $admins->hidden = 0;

       if (isset($request->autoaccept) && $request->autoaccept == 'on') {
            $admins->autoaccept = true;
        } else {
            $admins->autoaccept = false;
        }
        $admins->save();
    
        return redirect('edit-events');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    // Event delete function 
    public function delete($id) {
        
        Organisatoren::where('eventId', $id)->delete();
        Inschrijving::where('eventid', $id)->delete();
        Event::find($id)->delete();

        return redirect('edit-events');
    }
}