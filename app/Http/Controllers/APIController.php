<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Users;
use App\Reports;
use App\Log;
use App\Region;
use Carbon\Carbon;

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
                ->select('id','previledge')
                ->get();
            return response()->json(['status' => '200', 'id_user' => $User[0]['id'],'previledge' => $User[0]['previledge'],'result' => $token]);
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
        $User  = Users::where('users.id','=',$id)
            ->join('region', 'users.id_region', '=', 'region.id')
            ->select('users.username','users.fullname','users.previledge','users.number','users.email','region.name')
            ->get();



        return response()->json(['status' => '200',
            'username' => $User[0]['username'],
            'fullname' => $User[0]['fullname'],
            'previledge' => $User[0]['previledge'],
            'number' => $User[0]['number'],
            'email' => $User[0]['email'],
            'name' => $User[0]['name'],
        ]);
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

    public function changepass_user(Request $request)
    {
        $input = $request->all();
        $id = $input['id_user'];
        $input1['password'] = $input['passwordlama'];
        $input1['username'] = $input['username'];

        if (!$token = JWTAuth::attempt($input1)){
            return response()->json(['status' => '404']);
        }else{
            $User  = Users::find($id);
            $User->password = Hash::make($input['password']);

            $User->save();

            return response()->json(['status' => '200']);
        }
    }

    public function send_report(Request $request)
    {
        $input = $request->all();
        $input_report['id_answer']=$input['id_answer'];
        $input_report['id_user']=$input['id_user'];
        $input_report['response']=$input['response'];
        $input_report['detail']=$input['detail'];

        $region = Users::where('id', '=', $input_report['id_user'])
                ->select('id_region')
                ->get();

        $id = Reports::create($input_report)->id;
        $input_log['id_region']=$region[0]['id_region'];
        $input_log['id_reports']=$id;
        $input_log['detail']='report from user';
        $input_log['on/off']=0;

        Log::create($input_log)->id;

        return response()->json(['status' => '200']);
    }

    public function indexpic(Request $request)
    {
        $input = $request->all();

        $id_user=$input['id_user'];

        $Users= Users::where('id','=',$id_user)
            ->select('id_region','previledge')
            ->get();
        $id=$Users[0]['id_region'];
        $previledge=$Users[0]['previledge'];

        if($previledge==1){

        $Regions  = Region::whereBetween('id', [$id*100, ($id+1)*100])
            ->orWhere('id','=',$id)
            ->get();
        $provinsi=array();
        $kabupaten=array();
        $statreal= array_fill(0, 100, 0);
        $sum = array_fill(0, 100, 0);
        $kabstat = array_fill(0, 100, 0);
        foreach($Regions as $row){
            if($row->id<99){
                $provinsi[]= $row;

            }
            else {
                $kabupaten[floor($row->id/100)][]=$row;
                $sum[floor($row->id/100)]++;
                if($row->status == 1)
                    $kabstat[floor($row->id/100)]++;
            }
        }

        for($i=0;$i<100;$i++){
            if($sum[$i]!=0){
                $cek =$sum[$i]- $kabstat[$i];
                if($cek==$sum[$i])
                    $statreal[$i]=1;//nyala
                else if ($cek==0)
                    $statreal[$i]=2;//mati
                else
                    $statreal[$i]=3;//bimbang
            }
        }

//        var_dump($statreal);
        $data['kabstat']= $statreal;
        $data['provinsi']= $provinsi;
        $data['kabupaten']= $kabupaten;

        return view('dashboard_pic',$data);
        }

        if($previledge==2) {
            $id_prov=floor($id/100);

            $Region  = Region::where('id','=',$id)
                ->get();

            $Region_prov  = Region::where('id','=',$id_prov)
                ->get();

            $data['provinsi']= $Region_prov[0];
            $data['kabupaten']= $Region[0];

            return view('dashboard_pickab',$data);

            }

        if($previledge==0) {
            $Regions  = Region::all();
            $provinsi=array();
            $kabupaten=array();
            $statreal= array_fill(0, 100, 0);
            $sum = array_fill(0, 100, 0);
            $kabstat = array_fill(0, 100, 0);
            foreach($Regions as $row){
                if($row->id<99){
                    $provinsi[]= $row;

                }
                else {
                    $kabupaten[floor($row->id/100)][]=$row;
                    $sum[floor($row->id/100)]++;
                    if($row->status == 1)
                        $kabstat[floor($row->id/100)]++;
                }
            }

            for($i=0;$i<100;$i++){
                if($sum[$i]!=0){
                    $cek =$sum[$i]- $kabstat[$i];
                    if($cek==$sum[$i])
                        $statreal[$i]=1;//nyala
                    else if ($cek==0)
                        $statreal[$i]=2;//mati
                    else
                        $statreal[$i]=3;//bimbang
                }
            }

//        var_dump($statreal);
            $data['kabstat']= $statreal;
            $data['provinsi']= $provinsi;
            $data['kabupaten']= $kabupaten;

            return view('viewdashboard',$data);

        }

    }

    public function history_apps(Request $request)
    {

        $input = $request->all();

        $id_user=$input['id_user'];
        $Users= Users::where('id','=',$id_user)
            ->select('id_region')
            ->get();
        $id=$Users[0]['id_region'];

        $count = array_fill(0, 3, 0);

        $dt = Carbon::now();
        $newtime=$dt->subYear();

        $tes = Region::where('id','=',$id)
            ->select('name','status')
            ->get();
        $data['region']=$tes[0]["name"];
        $data['status']=$tes[0]["status"];

        $result = Log
            ::join('region', 'log.id_region', '=', 'region.id')
            ->where('log.id_region','=',$id)
            ->where('log.detail','LIKE','report from admin')
            ->whereDate('log.created_at', '>', $newtime->toDateString())
            ->orderBy('log.created_at','DESC')
            ->select('log.created_at','log.id','log.id_region','log.id_reports','log.detail','log.on/off','region.name')
            ->get();
        $data['result']= $result;

        $reports=array();
        foreach($result as $row){
            if($row->id_reports!=NULL){
                $count[2]++;
                $id_report= $row->id_reports;
                $report = Reports
                    ::join('answers', 'reports.id_answer', '=', 'answers.id')
                    ->where('reports.id','=',$id_report)
                    ->select('answers.description')
                    ->get();
                $reports[$id_report]= $report[0]["description"];
            }elseif ($row["on/off"]==1){
                $count[1]++;
            }else{
                $count[0]++;
            }
        }

        $data['count']= $count;
        $data['result']= $result;
        $data['reports']= $reports;

//        $data['region']= json_encode($regions, true);
//        var_dump($data['region']);
//        return response()->json($result);
//        return response()->json($reports);
        return view('history_apps',$data);

    }

}