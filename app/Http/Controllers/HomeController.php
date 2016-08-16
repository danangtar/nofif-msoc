<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Hash;
use Carbon\Carbon;
use DB;
use App\Region;
use App\Users;
use App\Answers;
use App\Reports;
use App\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
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
        
        return view('dashboard',$data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pic()
    {
        $regions  = Region::select('region.id','region.name')->orderBy('name', 'ASC')->get();

//        $User = Users::all();
        $result = Users::select('id','id_region','username','fullname','number', 'email')
            ->get();
        $data['result']= $result;
//        $data['region']= json_encode($regions, true);
        $data['region']= $regions;

//        var_dump($data['region']);
//        return response()->json($result);
        return view('pic',$data);
        //
    }

    public function update_region(Request $request){
        $input = $request->all();

        $id = $input['id'];

        if($input['id_region']==0 || $input['id_region']==""){
            $input['previledge']=0;
            $input['id_region']==0;
        }elseif($input['id_region']>0 && $input['id_region']<100){
            $input['previledge']=1;
        }else{
            $input['previledge']=2;
        }
        $User  = Users::find($id);
        $User->id_region = $input['id_region'];
        $User->previledge = $input['previledge'];

        $User->save();

        return redirect('pic');
    }

    public function update_user(Request $request){
        $input = $request->all();

        $id = $input['id'];
        $User  = Users::find($id);
        if($input['password']!="")
        $input['password'] = Hash::make($input['password']);

        $User->fullname = $input['fullname'];
        $User->email =$input['email'];
        $User->number = $input['number'];

        $User->save();
//
        return redirect('pic');
    }

    public function create_user (Request $request)
    {
        $input = $request->all();
        if($input['id_region']==0 || $input['id_region']==""){
            $input['previledge']=0;
            $input['id_region']==0;
        }elseif($input['id_region']>0 && $input['id_region']<100){
            $input['previledge']=1;
        }else{
            $input['previledge']=2;
        }

        $input['password'] = Hash::make($input['password']);

        Users::create($input);
        return redirect('pic');
    }

    public function delete_user ($id)
    {
        $input = Users::find($id);

        $input->delete();

        return redirect('pic');
    }

    public function reports()
    {

//        $User = Users::all();
        $result = Reports
            ::join('answers', 'reports.id_answer', '=', 'answers.id')
            ->join('users', 'reports.id_user', '=', 'users.id')
            ->join('region', 'users.id_region', '=', 'region.id')
            ->select('reports.id','reports.id_user','reports.verifikasi','users.id_region','reports.id_answer','reports.detail','reports.response','answers.description','users.fullname','region.name')
            ->get();
        $data['result']= $result;
//        $data['region']= json_encode($regions, true);

//        var_dump($data['region']);
//        return response()->json($result);
        return view('report',$data);
        //
    }


    public function delete_reports($id)
    {
        $input = Reports::find($id);

        $input->delete();

        Log::where('id_reports','=', $id)
            ->update(['detail' => 'report deleted by admin']);

        return redirect('report');
    }

    public function confirm_reports ($id)
    {
        $Reports  = Reports::find($id);
        $Reports->verifikasi=1;

        $Reports->save();

        $Reports  = Reports::find($id)->select('response')->get();
        $time = $Reports[0]['response'];

        $region = Log::where('id_reports','=',$id)
            ->select('id_region')
            ->get();

        $id_region=$region[0]['id_region'];
        $input_log['id_region']=$id_region;
        $input_log['id_reports']=$id;
        $input_log['detail']='report from admin';
        $input_log['on/off']=0;

        $Region = Region::find($id_region);
        $Region->response = (int)$time;

        $Region->save();

        Log::create($input_log);

        return redirect('report');
    }

    public function update_reports(Request $request){
        $input = $request->all();

        $id = $input['id'];
        $Reports  = Reports::find($id);
        $Reports->detail =$input['detail'];

        $Reports->save();

        return redirect('report');
    }



    public function history($id)
    {
        $count = array_fill(0, 3, 0);

        $dt = Carbon::now();
        $newtime=$dt->subYear();

        $tes = Region::where('id','=',$id)
            ->select('name','status')
            ->first();
        $data['region']=$tes->name;
        $data['status']=$tes->status;

        $result = Log
            ::join('region', 'log.id_region', '=', 'region.id')
            ->where('log.detail','LIKE','report from admin')
            ->where('log.id_region','=',$id)
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
        return view('history',$data);

    }
    
    //History Apps
    public function history_apps($id)
    {

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
    
    //home_history
    public function history_home()
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
        

        $result = Log
            ::join('region', 'log.id_region', '=', 'region.id')
            ->select('log.created_at','log.id','log.id_region','log.id_reports','log.detail','log.on/off','region.name')
            ->orderBy('log.created_at','DESC')
            ->where('log.detail','LIKE','report from admin')
            ->take('25')
            ->get();
        $data['result']= $result;

        $reports=array();
        foreach($result as $row){
            if($row->id_reports!=NULL){
                $id_report= $row->id_reports;
                $report = Reports
                    ::join('answers', 'reports.id_answer', '=', 'answers.id')
                    ->where('reports.id','=',$id_report)
                    ->select('answers.description')
                    ->get();
                $reports[$id_report]= $report[0]["description"];
            }       }

        $data['result']= $result;
        $data['reports']= $reports;
        
        $data['kabstat']= $statreal;
        $data['provinsi']= $provinsi;
        $data['kabupaten']= $kabupaten;
        
        return view('history_home',$data);
    }

    public function history_home2()
    {
        $id =11;
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
        

        $result = Log
            ::join('region', 'log.id_region', '=', 'region.id')
            ->select('log.created_at','log.id','log.id_region','log.id_reports','log.detail','log.on/off','region.name')
            ->orderBy('log.created_at','DESC')
            ->where('log.detail','LIKE','report from admin')
            ->take('25')
            ->get();
        $data['result']= $result;

        $reports=array();
        foreach($result as $row){
            if($row->id_reports!=NULL){
                $id_report= $row->id_reports;
                $report = Reports
                    ::join('answers', 'reports.id_answer', '=', 'answers.id')
                    ->where('reports.id','=',$id_report)
                    ->select('answers.description')
                    ->get();
                $reports[$id_report]= $report[0]["description"];
            }       }

        $data['result']= $result;
        $data['reports']= $reports;
        
        $data['kabstat']= $statreal;
        $data['provinsi']= $provinsi;
        $data['kabupaten']= $kabupaten;
        
        return view('history_appshome',$data);
    }

    public function statistic(){
        $data['result']=NULL;
        $data['title']= "";
//        var_dump($data['result']);
        return view('statistic',$data);
    }
    
    public function statistic2(){
        return view('pagecoba2');
    }

    public function upload(){
        return view('upload');
    }

    public function search_statistic(Request $request){
        $input = $request->all();

        $dayselect = $input['dayselect'];
        if($dayselect==2){
            $result = Log
                ::join('reports', 'log.id_reports', '=', 'reports.id')
                ->join('answers', 'reports.id_answer' ,'=','answers.id')
                ->where('log.detail','LIKE','report from admin')
                ->whereYear('log.created_at', '=',$input['year2'])
                ->select('reports.id_answer','answers.description',DB::raw('count(*) as total'))
                ->groupBy('reports.id_answer')
                ->get();

            $title = $input['year2'];
        }elseif($dayselect==1){
            $result = Log
                ::join('reports', 'log.id_reports', '=', 'reports.id')
                ->join('answers', 'reports.id_answer' ,'=','answers.id')
                ->whereYear('log.created_at', '=',$input['year1'])
                ->whereMonth('log.created_at', '=',$input['month1'])
                ->where('log.detail','LIKE','report from admin')
                ->select('reports.id_answer','answers.description',DB::raw('count(*) as total'))
                ->groupBy('reports.id_answer')
                ->get();
            $title = $input['month1']."/".$input['year1'];
        }elseif($dayselect==0){
            $date = Carbon::createFromFormat('d/m/Y', $input['date0']);

            $result = Log
                ::join('reports', 'log.id_reports', '=', 'reports.id')
                ->join('answers', 'reports.id_answer' ,'=','answers.id')
                ->whereDate('log.created_at', '=', $date->toDateString())
                ->where('log.detail','LIKE','report from admin')
                ->select('reports.id_answer','answers.description',DB::raw('count(*) as total'))
                ->groupBy('reports.id_answer')
                ->get();
            $title =$input['date0'];
        }else{
            $result=NULL;
            $title="";
        }
//        return response()->json($result);
        $data['result']= $result;
        $data['title']= $title;

//        var_dump($result);
        return view('statistic',$data);
    }

    public function alertRegion($id){
        $User  = Users::where('id_region','=',$id)
            ->select('remember_token')
            ->get();

        $Region  = Region::where('id','=',$id)
            ->select('name','status')
            ->get();

        $token=$User[0]['remember_token'];
        if($token!=NULL){
            $region = $Region[0]['name'];
            if($Region[0]['status']==1) $status='down'; else $status = 'up';
            $data = array
            (
                'id_user' 	=> $id,
                'region' 	=> $Region[0]['name'],
                'status' 	=> $Region[0]['status'],
            );

            $notification= array
            (
                'title' 	=> "ALERT!!! $region Server $status",
                'body' 	=> 'Check & Reply',
                'sound' 	=> 'default',
                'click_action' 	=> 'FCM_PLUGIN_ACTIVITY',
                'icon' 	=> 'icon_name'
            );

            $json=array(
                'data' 	=> $data,
                'notification' 	=> $notification,
                'to' 	=> $token,
                'priority' => 'high'
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
            return redirect('dashboard');
        }else
            echo 'TOKEN IS NULL';



    }

    public function alert($id){
        $User  = Users::where('id_region','=',$id)
            ->select('remember_token')
            ->get();

        $Region  = Region::where('id','=',$id)
            ->select('name','status')
            ->get();

        $token=$User[0]['remember_token'];
        if($token!=NULL){
            $region = $Region[0]['name'];
            if($Region[0]['status']==1) $status='down'; else $status = 'up';
            $data = array
            (
                'id_user' 	=> $id,
                'region' 	=> $Region[0]['name'],
                'status' 	=> $Region[0]['status'],
            );

            $notification= array
            (
                'title' 	=> "ALERT!!! $region Server $status",
                'body' 	=> 'Check & Reply',
                'sound' 	=> 'default',
                'click_action' 	=> 'FCM_PLUGIN_ACTIVITY',
                'icon' 	=> 'icon_name'
            );

            $json=array(
                'data' 	=> $data,
                'notification' 	=> $notification,
                'to' 	=> $token,
                'priority' => 'high'
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

    public function alertAll(){
        $regions = Users::join('region','region.id','=','users.id_region')
            ->where('region.status','=','1')
            ->where('region.response','>','0')
            ->select('region.id','region.name','region.status','users.id','users.remember_token')
            ->get();

        foreach ($regions as $row){

            $token=$row->remember_token;
            if($token!=NULL) {
                $region = $row->name;
                if($row->status==1) $status='down'; else $status = 'up';
                $data = array
                (
                    'id_user' => $row->id,
                    'region' => $region,
                    'status' => $row->status,
                );

                $notification = array
                (
                    'title' => "ALERT!!! $region Server $status",
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
                return redirect('dashboard');
            }else
                echo "TOKEN IS NULL";
        }


    }

    public function import($name)
    {
        $fileName = "https://drive.google.com/uc?export=download&id=$name";
        $csvData = file_get_contents($fileName);
        $lines = explode(PHP_EOL, $csvData);
        $i=0;
        foreach ($lines as $line) {
            if($i<count($lines)-1){
                $row =str_getcsv($line);
                $index=(int)$row[0];
                $ave=((double)substr($row[1],0,-1));
                if($ave<30 && $index<9999) {
                    $status = Region::where('id', '=', $index)->select('status')->first();
                    if ($status->status == 0) {
                        $input_log['id_region'] = $index;
                        $input_log['detail'] = "report from admin";
                        $input_log['on/off'] = 0;

                        Log::create($input_log);

                        Region::where('id', '=', $index)->update(['status' => 1, 'response' => 0]);
                        $this->alert($index);

                    }
                }
                    if($ave>=30 && $index<9999){
                        $status = Region::where('id', '=', $index)->select('status')->first();
                        if($status->status==1){
                            $input_log['id_region']=$index;
                            $input_log['detail']="report from admin";
                            $input_log['on/off']=1;

                            Log::create($input_log);

                            Region::where('id', '=', $index)->update(['status' => 0,'response' => 0]);
                            $this->alert($index);
                        }

                }
            }
            $i++;
        }
//        return redirect('');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showregions($id)
    {   
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
