<?php
// Controller created By Prashant to add, edit and Delete video from Counselling Portal
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;


class CounsellingController extends Controller
{
    public function index(){
        $counselling = DB::select("select * from counselling");
        Debugbar::info($counselling);
        if(isset($counselling))
            return view('pages.TPO.counsellingTPO',compact('counselling'));
    }

    public function create(){
        $title = $_GET['v_title'];  
        $v_link = $_GET['link'];
        
            $data = Array(
                'Title' => $title,
                'Link' =>$v_link,
                
            );

        DB::table("counselling")->insert($data);
        return redirect()->back();
    }

    public function deleteVideo(Request $request){
        $data =  $request->get('v_id');
        Debugbar::info($data);
        $res = DB::table('counselling')->where('V_ID', $data)->delete();
        if($res){
            return "Video Deleted Successfully";
        }
        else{
            return "Problem in Deleting";
        }
    }

    public function getDataToEdit(Request $request){
        $data =  $request->get('v_id');
        $res  = DB::select("select * from counselling where v_id='$data'");
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
        $Link=$_GET['modal_link'];

        $res = DB::update("update counselling set Title= '$Title',Link='$Link'
               where V_ID='$V_ID'");
        Debugbar::info($res);
        return redirect()->back();
    }
}
