<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 6/12/2018
 * Time: 3:56
 */

namespace App\Http\Controllers\Auth;


class LogoutController
{

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}