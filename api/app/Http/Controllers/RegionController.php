<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RegionController extends Controller{


    public function index(){

        $Region = DB::table('region')->get();
        return response()->json($Region);

    }

    public function getRegion($id){

        $Region  = Region::find($id);

        return response()->json($Region);
    }

    public function createRegion(Request $request){

        $Region = Region::create($request->all());

        return response()->json($Region);

    }

    public function deleteRegion($id){
        $Region  = Region::find($id);
        $Region->delete();

        return response()->json('deleted');
    }

    public function updateRegion(Request $request,$id){
        $Region  = Region::find($id);
        $Region->title = $request->input('name');
        $Region->author = $request->input('status');
        $Region->save();

        return response()->json($Region);
    }

}