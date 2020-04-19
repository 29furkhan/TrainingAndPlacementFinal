<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;

class DrivesController extends Controller
{
    public function index(){
        $drives = DB::select("select * from drives order by created_at desc");
        Debugbar::info($drives);
        if(isset($drives))
            return view('pages.TPO.drivesTPO',compact('drives'));
    }

    public function create(){
        $drive_ID = $_GET['drive_id_text'];  
        $company_name = $_GET['company_name_text'];
        $criteria_select = $_GET['criteria_select'];
        if($criteria_select=='yes'){
            $criteria_text = $_GET['criteria_text'];
        }
        $description = $_GET['description'];
        $venue = $_GET['venue'];
        $dt = $_GET['date'];
        $package = $_GET['package'];
        $link = $_GET['link'];

        if($criteria_select=='yes'){
            $data = Array(
                'Drive_ID' => $drive_ID,
                'Company_Name' =>$company_name,
                'Drive_Description'=>$description,
                'Criteria' =>$criteria_text,
                'Date'=>$dt,
                'Package'=>$package,
                'Link' =>$link,
                'Venue'=>$venue,
            );
        }
        else{
            $data = Array(
                'Drive_ID' => $drive_ID,
                'Company_Name' =>$company_name,
                'Drive_Description'=>$description,
                'Criteria' =>$criteria_select,
                'Date'=>$dt,
                'Package'=>$package,
                'Link' =>$link,
                'Venue'=>$venue                
            );
        }
        DB::table("drives")->insert($data);
        return redirect()->back();
    }
}
