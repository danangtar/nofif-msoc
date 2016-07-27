<?php

namespace App\Http\Controllers;

use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller{


    public function index(){


        $User  = Users::all();

        return response()->json($User);

    }

    public function getUser($id){

        $User  = Users::find($id);

        return response()->json($User);
    }

    public function createUser(Request $request){

        $User = Users::create($request->all());

        return response()->json($User);

    }

    public function deleteUser($id){
        $User  = Users::find($id);
        $User->delete();

        return response()->json('deleted');
    }

    public function updateUser(Request $request,$id){
        $User  = Users::find($id);
        $User->title = $request->input('username');
        $User->author = $request->input('password');
        $User->save();

        return response()->json($User);
    }

}