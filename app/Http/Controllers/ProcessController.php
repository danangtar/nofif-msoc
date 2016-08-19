<?php

namespace App\Http\Controllers;

use App\Region;
use App\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProcessController extends Controller{


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
        $message = 'Server DOWN';

        foreach ($regions as $row) {

            $token = $row->remember_token;
            if ($token != NULL) {

                $region = $row->name;

                $data = array
                (
                    'status' 	=> $message,
                    'title' 	=> "ALERT!!! $region, $message",
                    'body' 	=> 'Check & Reply',
                );


                $json=array(
                    'data' 	=> $data,
                    'to' 	=> $token,
                    'priority' => 'high',
                    'time_to_live' => 86400,
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: '.strlen(json_encode($json)),
                    'Authorization:key=AIzaSyB8A-zll_nZ6eq4HIl0U0RxFqMCgRYVUwI'
                ));
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $output = curl_exec($ch);
                curl_close($ch);
                echo $output;
            }else
                echo 'TOKEN IS NULL';
        }
    }


}