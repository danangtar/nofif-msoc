<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Hash;
use Carbon\Carbon;
use DB;
use App\Region;
use App\Users;
use App\Answers;
use App\Reports;
use App\Log;
use Storage;
use Validator;

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
        
        for($i=0;$i<100;$i++){//        $User = Users::all();

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
    
//PIC
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pic()
    {
        $regions  = Region::select('region.id','region.name')->orderBy('name', 'ASC')->get();

        $result = Users::select('id','id_region','username','fullname','number', 'email')
            ->get();
        $data['result']= $result;
        $data['region']= $regions;

        return view('pic',$data);
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

//ANSWERS
    public function problem()
    {
        $answers  = Answers::select('id', 'description')->get();

        $data['answer']= $answers;


        return view('problem',$data);
    }

    public function create_problem (Request $request)
    {
        $input = $request->all();
        Answers::create($input);

        return redirect('problem');
    }

    public function update_problem (Request $request){
        $input = $request->all();
        $id = $input['id'];
        $Answer = Answers::find($id);

        $Answer->description = $input['description'];

        $Answer->save();

        return redirect('problem');
    }

    public function delete_problem ($id)
    {
        $input = Answers::find($id);

        $input->delete();

        return redirect('problem');
    }

    //REGION
    public function regions()
    {
        $regions  = Region::select('id', 'name', 'status', 'response')->get();

        $data['region']= $regions;

        return view('regions',$data);
    }

    public function create_regions (Request $request)
    {
        $input = $request->all();

        Region::create($input);

        return redirect('regions');
    }

    public function update_regions (Request $request){
        $input = $request->all();
        $id = $input['id'];
        $Region = Region::find($id);

        $Region->name = $input['name'];

        $Region->save();

        return redirect('regions');
    }

    public function delete_regions ($id)
    {
        $input = Region::find($id);

        $input->delete();

        return redirect('regions');
    }

//REPORTS
    public function reports()
    {
        $result = Reports
            ::join('answers', 'reports.id_answer', '=', 'answers.id')
            ->join('users', 'reports.id_user', '=', 'users.id')
            ->join('region', 'users.id_region', '=', 'region.id')
            ->select('reports.id','reports.id_user','reports.verifikasi','users.id_region','reports.id_answer','reports.detail','reports.response','answers.description','users.fullname','region.name', 'reports.created_at')
            ->get();
        $data['result']= $result;

        return view('report',$data);

    }


    public function delete_reports($id)
    {
        $input = Reports::find($id);

        $input->delete();

        Log::where('id_reports','=', $id)
            ->update(['detail' => 'report deleted by admin']);

        return redirect('report');
    }

    public function confirm_reports(Request $request)
    {
        $input = $request->all();

        $id = $input['id'];

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
        $this->alert($id_region,'request accepted. Message : '.$input['message']);

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

//HISTORY

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

//STATISTIC
    public function statistic(){
        $data['result']=NULL;
        $data['title']= "";
//        var_dump($data['result']);
        return view('statistic',$data);
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
        $this->alert($id, 'Server DOWN');
        return redirect('dashboard');
    }

    public function alert($id,$message){
        $User  = Users::where('id_region','=',$id)
            ->select('remember_token')
            ->get();

        $Regions  = Region::where('id','=',$id)
            ->select('name','status')
            ->first();

        $token=$User[0]['remember_token'];
        if($token!=NULL){
            $region = $Regions['name'];

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

    public function alertAll()
    {
        $regions = Users::join('region', 'region.id', '=', 'users.id_region')
            ->where('region.status', '=', '1')
            ->where('region.response', '>', '0')
            ->select('region.id', 'region.name', 'region.status', 'users.id', 'users.remember_token')
            ->get();

        foreach ($regions as $row) {
            $token = $row->remember_token;
            if ($token != NULL) {
                $this->alert($row->id_region, 'Server DOWN');
                return redirect('dashboard');
            }
        }
    }

    public function upload(){
        $status = NULL;
        $status= Input::get('status', false);

        $data['status']=$status;
        $date = Log::where('detail','LIKE','upload file from admin')->select('created_at')->orderBy('id','DESC')->first();
        $data['last_date']=$date['created_at'];

        return view('upload',$data);
    }

    public function importfile(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input,array(
            'csv' => 'required|mimes:csv,txt'
        ));

        if($validation->fails()){
            return redirect('upload?status=not_valid');
        }else{
            $file = $request->file('csv');
            $upload = 'temp';
            $filename = $file->getClientOriginalName();

            if (Storage::disk('public')->exists('$filename'))
            {
                Storage::delete($filename);
                return redirect('upload?status=failed');
            }else{
                $success = $file->move($upload, $filename);
                if($success){
                $files = Storage::disk('public')->files();

                $contents = Storage::disk('public')->get($files[0]);

                $lines = explode(PHP_EOL, $contents);
                $i=0;
                foreach ($lines as $line) {
                    if($i<count($lines)-1 && $i>2){
                        $row =str_getcsv($line);

                        $index=(int)explode(" ",$row[3])[0];

                        if(ctype_digit($index)) {
                            $ave = ((double)substr($row[5], 0, -1));

                            if ($ave == 0 && $index < 9999) {
                                $status = Region::where('id', '=', $index)->select('status')->first();
                                if ($status->status == 0) {
                                    $input_log['id_region'] = $index;
                                    $input_log['detail'] = "report from admin";
                                    $input_log['on/off'] = 0;

                                    Log::create($input_log);

                                    Region::where('id', '=', $index)->update(['status' => 1, 'response' => 0]);
//                                    $this->alert($index,'Server DOWN');

                                }
                            }
                            if ($ave > 0 && $index < 9999) {
                                $status = Region::where('id', '=', $index)->select('status')->first();
                                if ($status->status == 1) {
                                    $input_log['id_region'] = $index;
                                    $input_log['detail'] = "report from admin";
                                    $input_log['on/off'] = 1;

                                    Log::create($input_log);

                                    Region::where('id', '=', $index)->update(['status' => 0, 'response' => 0]);
//                                    $this->alert($index,'Server UP');
                                }

                            }
                        }
                    }
                    $i++;
                }

                    $input_log['detail'] = "upload file from admin";
                    Log::create($input_log);

                    Storage::disk('public')->delete($filename);
                    return redirect('upload?status=success');

                }else{
                    return redirect('upload?status=failed');
                }
            }

        }
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
