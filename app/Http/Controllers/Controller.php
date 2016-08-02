<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Hash;
use App\Region;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

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
        if (Auth::attempt($userdata)) {

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


    public function show()
    {
        $fileName = "https://docs.google.com/a/mhs.if.its.ac.id/uc?authuser=0&id=0B3OounDUAscmOTk1V1U3WXZDWVU&export=download";
        $csvData = file_get_contents($fileName);
        $lines = explode(PHP_EOL, $csvData);
        $i=0;
        foreach ($lines as $line) {
            if($i<count($lines)-1){
                $row =str_getcsv($line);
                $index=(int)$row[0];
                $ave=((double)substr($row[1],0,-1));
                if($ave<30 && $index<9999){
                echo $index.'<br>';
                Region::where('id', '=', $index)->update(['status' => 1]);
                }
            }
            $i++;
        }
        return redirect('');
    }

}
