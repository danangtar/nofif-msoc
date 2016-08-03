<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Users;

use Hash;
use JWTAuth;
class APIController extends Controller
{

    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        Users::create($input);
        return response()->json(['result'=>true]);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
        return response()->json(['status' => '404']);
        }else{
            $User = Users::where('username','=',$input['username'])
                ->select('id')
                ->get();
            return response()->json(['status' => '200', 'id_user' => $User[0]['id'],'result' => $token]);
        }
    }

    public function get_user_details(Request $request)
    {
    $input = $request->all();
    $user = JWTAuth::toUser($input['token']);
    return response()->json(['result' => $user]);
    }


    public function send_token(Request $request)
    {
        $input = $request->all();
        $id = $input['id_user'];
        $User  = Users::find($id);
        $User->remember_token = $request->input('token_device');
        $User->save();

        return response()->json(['status' => '200']);
    }

    public function get_user(Request $request)
    {
        $input = $request->all();
        $id = $input['id_user'];
        $User  = Users::find($id);

        return response()->json(['status' => '200','result' => $User]);
    }

    public function update_User(Request $request)
    {
        $input = $request->all();
        $id = $input['id_user'];
        $User  = Users::find($id);
        $User->fullname = $input['fullname'];
        $User->email =$input['email'];
        $User->number = $input['number'];

        $User->save();

        return response()->json(['status' => '200']);
    }

    public function send_report(Request $request)
    {
        $input = $request->all();
        $inputyes['id_answer']=$input['id_answer'];
        $inputyes['id_user']=$input['id_user'];
        $inputyes['response']=$input['response'];
        $inputyes['detail']=$input['detail'];
        Reports::create($inputyes);

        return response()->json(['status' => '200']);
    }

}