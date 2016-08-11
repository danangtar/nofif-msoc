<?php

namespace App\Http\Controllers;

use App\Region;
use App\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProcessController extends Controller{


    public function index(){

//        $Region = DB::table('region')->get();
//        return response()->json($Region);

        $User  = Region::all();

        return response()->json($User);

    }

    public function cron_minus(){
        DB::table('region')->where('response','>',5)->decrement('response', 5);
        DB::table('region')->where('response','<',5)->update('response', 0);
    }

    public function cron_alert(){
        $regions = Users::join('region','region.id','=','users.id_region')
            ->where('region.status','=','1')
            ->where('region.response','>','0')
            ->select('region.id','region.name','users.id','users.remember_token')
            ->get();

        foreach ($regions as $row) {

            $token = $row->remember_token;
            if ($token != NULL) {
                $region = $row->name;
                $data = array
                (
                    'id_user' => $row->id,
                    'region' => $region,
                );

                $notification = array
                (
                    'title' => "ALERT!!! $region Server Down",
                    'body' => 'Check & Reply',
                    'sound' => 'default',
                    'click_action' => 'FCM_PLUGIN_ACTIVITY',
                    'icon' => 'icon_name'
                );

                $json = array(
                    'data' => $data,
                    'notification' => $notification,
                    'to' => $token,
                    'priority' => 'high'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen(json_encode($json)),
                    'Authorization:key=AIzaSyB8A-zll_nZ6eq4HIl0U0RxFqMCgRYVUwI'
                ));
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $output = curl_exec($ch);
                curl_close($ch);
                echo $output;

            } else
                echo 'TOKEN IS NULL';
        }
    }

    public function indexpic()
    {
        $id_user=1;

        $Users= Users::where('id','=',$id_user)
            ->select('id_region')
            ->get();
        $id=$Users[0]['id_region'];

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
    
    public function indexview()
    {
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
    
    public function indexviewkab()
    {
        $id=1101;
        $id_prov=floor($id/100);

        $Region  = Region::where('id','=',$id)
            ->get();

        $Region_prov  = Region::where('id','=',$id_prov)
            ->get();

        $data['provinsi']= $Region_prov[0];
        $data['kabupaten']= $Region[0];

        return view('dashboard_pickab',$data);
    }


}