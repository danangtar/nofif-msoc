<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Hash;
use Carbon\Carbon;

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
        $regions  = Region::select('region.id','region.name')->orderBy('id', 'ASC')->get();

//        $User = Users::all();
        $result = Users
            ::join('region', 'users.id_region', '=', 'region.id')
            ->select('users.id','users.id_region','users.fullname','users.number', 'users.email','region.name')
            ->get();
        $data['result']= $result;
//        $data['region']= json_encode($regions, true);
        $data['region']= $regions;

//        var_dump($data['region']);
//        return response()->json($result);
        return view('pic',$data);
        //
    }

    public function update_user(Request $request){
        $input = $request->all();

        $id = $input['id'];
        $User  = Users::find($id);
        var_dump($input);
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
        if($input['id_region']=="")
            $input['id_region']=11;
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

        return redirect('report');
    }

    public function confirm_reports ($id)
    {
        $Reports  = Reports::find($id);
        $Reports->verifikasi=1;

        $Reports->save();

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
            ->select('name')
            ->get();
        $data['region']=$tes[0]["name"];

        $result = Log
            ::join('region', 'log.id_region', '=', 'region.id')
            ->where('log.id_region','=',$id)
            ->whereDate('log.created_at', '>', $newtime->toDateString())
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

    public function statistic()
    {
        return view('statistic');
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
