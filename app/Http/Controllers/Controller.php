<?php

namespace App\Http\Controllers;

use DB;
use App\Region;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $fileName = "https://docs.google.com/a/mhs.if.its.ac.id/uc?authuser=0&id=0B3OounDUAscmOTk1V1U3WXZDWVU&export=download";
        $csvData = file_get_contents($fileName);
        $lines = explode(PHP_EOL, $csvData);
        $i=0;
        foreach ($lines as $line) {
            if($i<count($lines)-1){
                $row =str_getcsv($line);
                $index=(int)$row[0];
                $ave=((double)substr($row[1],0,-1));
                if($ave<30 && $index<9999){
                echo $index.'<br>';
                Region::where('id', '=', $index)->update(['status' => 1]);
                }
            }
            $i++;
        }
        return redirect('');
    }

}
