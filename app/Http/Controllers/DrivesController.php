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
                'created_at' => date("Y-m-d h:i:s")
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
                'Venue'=>$venue,
                'created_at' => date("Y-m-d h:i:s")               
            );
        }
        DB::table("drives")->insert($data);
        return redirect()->back();
    }

    public function edit(Request $request){
        $drive_id = $request->get('drive_id');
        $sql = "select * from drives where drive_id = '$drive_id'";
        $res = DB::select($sql);
        if($res){
            return response()->json(['sucess'=>'Success','data'=>$res]);;
        }
        else{
            return "Problem in Editing";
        }
    }

    public function editData(Request $request){
        $drive_ID = $_GET['modal_drive_id'];  
        $company_name = $_GET['modal_company_name'];
        $criteria_select = $_GET['criteria_select_edt'];
        
        if($criteria_select=='yes'){
            $criteria_text = $_GET['modal_criteria'];
        }
        
        $description = $_GET['modal_drive_desc'];
        $venue = $_GET['modal_venue'];
        $dt = $_GET['modal_date'];
        $package = $_GET['modal_pack'];
        $venue = $_GET['modal_venue'];
        $link = $_GET['modal_link'];

        if($criteria_select=='yes'){
            $sql = "update drives set 
            Company_Name = '$company_name',
            Drive_Description = '$description',
            Criteria = '$criteria_text',
            Date = '$dt',
            Package = '$package',
            Link = '$link',
            Venue = '$venue'   
            where Drive_ID = '$drive_ID'";

        }
        else{
            $sql = "update drives set  Company_Name = '$company_name', Drive_Description = '$description', Criteria = '$criteria_select', Date = '$dt', Package = '$package', Link = '$link', Venue = '$venue' where Drive_ID = '$drive_ID'";

        }
        
        $res = DB::update($sql);
                                                                                                                                                                                      
        return redirect()->back();
    }

    public function dltData(Request $request){
        $data =  $request->get('drive_id');
        $res = DB::table('drives')->where('drive_id', $data)->delete();
        Debugbar::info($res);
        if($res){
            return "Drive Deleted Successfully";
        }
        else{
            return "Problem in Deleting";
        }
    }

}
