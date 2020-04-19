<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;

class ActivitiesController extends Controller
{
    public function exportActivity(Request $request){
        $activity_id = $_GET['activity_id'];
        $activity_name = DB::select("select Activity_name from activities where activity_id='$activity_id'");
        $query = "select p.created_at,sa.caserp_id,sp.First_Name,sp.Middle_Name,sp.Last_Name,sp.class,sp.passout_year,
                  a.Activity_Name,p.order_id,p.transaction_id,p.status,p.amount from payments p INNER JOIN activities a
                  INNER JOIN student_profile sp INNER JOIN student_academics sa
                  where a.Activity_ID = p.Activity_ID and p.Activity_ID = '$activity_id'
                  and sp.Email = sa.Email and p.CASERP_ID = sa.CASERP_ID and p.status = 'complete'";
        $activity_data = DB::select($query);
        Debugbar::info($activity_name[0]->Activity_name);
        $output = '';
        Debugbar::info($activity_data);
        if($activity_data){
            $output.= '
                    <table style="border:2px solid">
                    <tr>
                        <th style="border:2px solid" >CASERP_ID</th>	
                        <th style="border:2px solid" >Name</th>	
                        <th style="border:2px solid" >Class</th>	
                        <th style="border:2px solid" >Passout Year</th>	
                        <th style="border:2px solid" >Activity Name</th>	
                        <th style="border:2px solid" >Order ID (Payment_ID)</th>	
                        <th style="border:2px solid" >Transaction ID</th>	
                        <th style="border:2px solid" >Payment Status</th>	
                        <th style="border:2px solid" >Payment Amount</th>
                        <th style="border:2px solid" >Date And Time</th>	
                    </tr>
                    ';
            // print_r($activity_data);
            foreach($activity_data as $activity)
            {
                
                $output.='
                    <tr>
                        <td style="border:2px solid">'.$activity->caserp_id.'</td>
                        <td style="border:2px solid">'.$activity->First_Name.' '.$activity->Middle_Name.' '.$activity->Last_Name.'</td>
                        <td style="border:2px solid">'.$activity->class.'</td>
                        <td style="border:2px solid">'.$activity->passout_year.'</td>
                        <td style="border:2px solid">'.$activity->Activity_Name.'</td>
                        <td style="border:2px solid">'.$activity->order_id.'</td>
                        <td style="border:2px solid">'.$activity->transaction_id.'</td>
                        <td style="border:2px solid">'.$activity->status.'</td>
                        <td style="border:2px solid">'.$activity->amount.'</td>
                        <td style="border:2px solid">'.$activity->created_at.'</td>
                        
                    </tr>
                    ';
            }
            $output.='</table>';
            header('Content-Type:  application/xls');
            header('Content-Disposition: attachment; filename='.$activity_name[0]->Activity_name.' Report'.'.xls'); 
            echo $output;    
        }
        else{
            echo "No Records Found";
        }
        
    }


    public function deleteActivity(Request $request){
        $data =  $request->get('activity_id');
        Debugbar::info($data);
        $res = DB::table('activities')->where('activity_id', $data)->delete();
        if($res){
            return "Activity Deleted Successfully";
        }
        else{
            return "Problem in Deleting";
        }
    }

    public function getDataToEdit(Request $request){
        $data =  $request->get('activity_id');
        $res  = DB::select("select * from activities where activity_id='$data'");
        Debugbar::info($res);
        if($res){
            return response()->json(['sucess'=>'Success','data'=>$res]);;
        }
        else{
            return "Problem in Editing";
        }
    }

    public function editActivity(Request $request){
        $Activity_ID = $_GET['modal_activity_id'];
        $Activity_Name = $_GET['modal_activity_name'];
        $Description = $_GET['modal_activity_desc'];
        $Fee = $_GET['modal_activity_fee'];
        $res = DB::update("update activities set Activity_Name = '$Activity_Name',Activity_Fee = '$Fee',Activity_Description = '$Description'
               where Activity_ID='$Activity_ID'");
        Debugbar::info($res);
        return redirect()->back();
    }


    public function index(){
        $activities = DB::select("select * from activities order by created_at desc");
        if(isset($activities))
            return view('pages.TPO.activitiesTPO',compact('activities'));
    }

    public function createActivity(){
        $Acitivity_ID = $_GET['activity_id_text'];
        $Activity_Name = $_GET['activity_name_text'];
        $Description = $_GET['description'];
        $Fee = $_GET['fee'];
        $data = array(
            'activity_id' =>$Acitivity_ID,
            'Activity_Name' =>$Activity_Name,
            'Activity_Description' =>$Description,
            'Activity_Fee' =>$Fee,
            'created_at' => date("Y-m-d h:i:s")
        );
        DB::table("activities")->insert($data);
        return redirect()->back();
    }
}
