<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Hash;

class FrontController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return redirect('login');
    }

    public function login_process(Request $request){
        $input = $request->all();
        $userdata = array(
            'username'     => $input['username'],
            'password'  => $input['password']
        );
        if (Auth::guard('admin')->attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            return redirect('dashboard');

        } else {

            // validation not successful, send back to form
            return redirect('login');
        }

    }


}