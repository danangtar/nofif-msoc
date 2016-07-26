<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class HomeController extends Controller{


    public function login(){

        $hashedPassword = app('hash')->make('hanumuslem');
        echo $hashedPassword;

        $Users= DB::table('users')->get();
        return response()->json($Users);

    }


}