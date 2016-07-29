<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Hash;

use App\Region;
use App\Users;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    
    public function indexpic()
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
        
        return view('dashboard_pic',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pic()
    {
        $regions  = Region::select('region.id','region.name')->get();

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

//        $User->save();
//
//        return redirect('pic');
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
