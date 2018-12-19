<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public $errors = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = Auth::User();

        return view('profile', compact('users'));
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
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validate the name is required and email is required, type email and max characters max the 255
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255',
        ]);

        //get the current login user
        $user = User::find(Auth::User()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        //verify the password if(null) -> no change
        if (is_null($request->password)) {
            $user->save();
            //if not null and the pass equals the current password and the password_confirmation field is not null
            //the password change for the password_confirmation field encrypted
        } else {
            if (Hash::check($request->password, Auth::User()->password)) {
                if (!is_null($request->password_confirmation)) {
                    //validate the password with 1 letter uppercase 1 letter lowercase and 1 number
                    if (count($this->strong_password($request->password_confirmation)) === 0) {
                        // encrypted the password_confirmation field with mutator of model User
                        $user->password = $request->password_confirmation;
                        // save the data of current user
                        $user->save();
                    } else {
                        return redirect()->back()->withErrors($this->errors);
                    }

                } else {
                    // als password_confirmation veld null is, een error is verstuurd
                    $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|string|email|max:255',
                        'password' => 'required|string|min:6|max:255',
                        'password_confirmation' => 'required|string|min:6|max:255',
                    ]);
                }
            } else {
                // als passw != 1ste passwoord, een error is verstuurd
                return redirect()->back()->with('noMatchPassword', 'The password no match with the current password!');
            }
        }
        //Alles ok: save changes and return naar route met als name "profile" met var session "update"
        return redirect('profile')->with('update', 'The user ' . Auth::User()->name . ' as been update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $password
     * @return array->errors
     */
    function strong_password($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase) {
            $this->errors[] = 'The password must contain at least one uppercase character';
        }

        if (!$lowercase) {
            $this->errors[] = 'The password must contain at least one lowercase character';
        }

        if (!$number) {
            $this->errors[] = 'The password must contain at least one number';
        }

        if (strlen($password) < 6) {
            $this->errors[] = 'The password must have a minimum of 6 characters';
        }

        return $this->errors;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
