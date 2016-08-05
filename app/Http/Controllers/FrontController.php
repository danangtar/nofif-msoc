<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use DB;
use Hash;

class FrontController extends Controller
{

    public function login()
    {
        $status= Input::get('status', false);

        if($status!="error")
        $data['status']=NULL;
        else
        $data['status']=$status;

        return view('login',$data);
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
            return redirect('login?status=error');
        }

    }


}