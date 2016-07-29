<?php

namespace App\Http\Controllers;

use App\Region;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProcessController extends Controller{


    public function index(){

//        $Region = DB::table('region')->get();
//        return response()->json($Region);

        $User  = Region::all();

        return response()->json($User);

    }

    public function alertRegion($id){

//        // API access key from Google API's Console
//        define( 'API_ACCESS_KEY', 'AIzaSyB8A-zll_nZ6eq4HIl0U0RxFqMCgRYVUwI' );
//        $registrationIds = array( $id );
//// prep the bundle
//        $msg = array
//        (
//            'message' 	=> 'INI PESAN',
//            'title'		=> 'DANANG',
//            'subtitle'	=> 'DANANG SENDIRI',
//            'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
//            'vibrate'	=> 1,
//            'sound'		=> 1,
//            'largeIcon'	=> 'large_icon',
//            'smallIcon'	=> 'small_icon'
//        );
//        $fields = array
//        (
//            'to' 	=> '/topics/all',
//            'data'			=> $msg
//        );
//
//        $headers = array
//        (
//            'Authorization: key=AIzaSyB8A-zll_nZ6eq4HIl0U0RxFqMCgRYVUwI',
//            'Content-Type: application/json'
//        );
//
//        $ch = curl_init();
//        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
//        curl_setopt( $ch,CURLOPT_POST, true );
//        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
//        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
//        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, true );
//        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
//        $result = curl_exec($ch );
//        curl_close( $ch );
//        echo $result;

        $json_data = '{ "data": {
                    "score": "5x1",
                    "time": "15:10"
                },
                "notification": {
                  "title": "HEY DANANG",
                  "body": "LOVE YOU",
                  "sound": "default",
                  "click_action": "FCM_PLUGIN_ACTIVITY",
                  "icon": "icon_name"
                },
                "to": "dXlIY-357zQ:APA91bHTQ73TkcI_qEN8tHvG0_TpsAgkPBW-hk8VlK0-LRp9KQv3Ss_Vw0MqrVfGRlyIv7Yyfs9DRq_Zjdp-TGR4rgwg-9pMjCIxkpJtjS_aOKoY21EWApQwQyJCNIe6Lt0CtM00df0I",
                "priority": "high"
              }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: '.strlen($json_data),
            'Authorization:key=AIzaSyB8A-zll_nZ6eq4HIl0U0RxFqMCgRYVUwI'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
//        $Region  = Region::find($id);
//
//        return response()->json($Region);
    }


}