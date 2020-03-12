<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;


class CounsellingController extends Controller
{
    public function index(){
        $counselling = DB::select("select * from Counselling");
        Debugbar::info($counselling);
        if(isset($counselling))
            return view('Pages.TPO.counsellingTPO',compact('counselling'));
    }

    public function create(){
        $title = $_GET['v_title'];  
        $v_link = $_GET['link'];
        $description = $_GET['description'];

            $data = Array(
                'Title' => $title,
                'Link' =>$v_link,
                'Video_Description'=>$description
            );

        DB::table("Counselling")->insert($data);
        return redirect()->back();
    }

    public function deleteVideo(Request $request){
        $data =  $request->get('v_id');
        Debugbar::info($data);
        $res = DB::table('Counselling')->where('V_ID', $data)->delete();
        if($res){
            return "Video Deleted Successfully";
        }
        else{
            return "Problem in Deleting";
        }
    }

    public function getDataToEdit(Request $request){
        $data =  $request->get('v_id');
        $res  = DB::select("select * from Counselling where v_id='$data'");
        Debugbar::info($res);
        if($res){
            return response()->json(['sucess'=>'Success','data'=>$res]);;
        }
        else{
            return "Problem in Editing";
        }
    }

    public function editVideo(Request $request){
        $V_ID = $_GET['modal_v_id'];
        $Title= $_GET['modal_title'];
        $Description = $_GET['modal_activity_desc'];
        $res = DB::update("update Counselling set Title= '$Title',Video_Description = '$Description'
               where V_ID='$V_ID'");
        Debugbar::info($res);
        return redirect()->back();
    }
}
