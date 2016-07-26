<?php

namespace App\Http\Controllers;
use DB;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function show()
    {
        $fileName = "https://docs.google.com/a/mhs.if.its.ac.id/uc?authuser=0&id=0B3OounDUAscmOTk1V1U3WXZDWVU&export=download";
        $csvData = file_get_contents($fileName);
        $lines = explode(PHP_EOL, $csvData);
        foreach ($lines as $line) {
            $row =str_getcsv($line);
            $index=(int)$row[0];
            $ave=((double)substr($row[1],0,-1));
            if($ave<30 && $index<9999){
                DB::table('region')
                    ->where('id_region', $index)
                    ->update(['status' => 1]);
            }
        }
        return Redirect::route('api/1/region');;
    }
}
