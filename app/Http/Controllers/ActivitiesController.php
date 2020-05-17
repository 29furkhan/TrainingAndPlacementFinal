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
        $data = DB::select($query);
        $output = '';
        if($data){
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
            foreach($data as $activity)
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
            return response()->json(['sucess'=>'Success','data'=>$res]);
        }
        else{
            return "Problem in Editing";
        }
    }

    public function editActivity(Request $request){
        $Activity_ID = $_GET['modal_activity_id_edit'];
        $Activity_Name = $_GET['modal_activity_name_edit'];
        $Description = $_GET['modal_activity_desc_edit'];
        $Period = $_GET['modal_activity_period_edit'];
        $Organisation = $_GET['modal_activity_organization_edit'];
        $Fee = $_GET['modal_activity_fee_edit'];
        $res = DB::update("update activities set Activity_Name = '$Activity_Name',Activity_Fee = '$Fee',Activity_Description = '$Description',
               Organization = '$Organisation', Period = '$Period' where Activity_ID='$Activity_ID'");
        Debugbar::info($res);
        return redirect()->back();
    }


    public function index(){
        $activities = DB::select("select * from activities order by created_at desc");
        $classes = DB::select("select class from branch group by class;");
        if(isset($activities))
            return view('pages.TPO.activitiesTPO',compact('activities','classes'));
    }

    public function createActivity(Request $request){
        $Acitivity_ID = $_GET['activity_id_text'];
        $Activity_Name = $_GET['activity_name_text'];
        $Description = $_GET['description'];
        $Fee = $_GET['fee'];
        $classes = $_GET['selectData'];
        $period = $_GET['activity_date_text'];
        $organisation = $_GET['activity_organisation_text'];
        $classes = implode(",",$classes);
        $data = array(
            'activity_id' =>$Acitivity_ID,
            'Activity_Name' =>$Activity_Name,
            'Activity_Description' =>$Description,
            'Activity_Fee' =>$Fee,
            'Classes'=>$classes,
            'Organization'=>$organisation,
            'Period'=>$period,
            'created_at' => date("Y-m-d h:i:s")
        );
        DB::table("activities")->insert($data);
        return redirect()->back();
        
    }

    // Function to Take Attendance:
    public function sendDataForAttendance(Request $request){
        $Activity_ID = $request->get('activity_id');
        $Allowed_Classes = DB::select("select classes from activities where activity_id = '$Activity_ID'");
        $Allowed_Classes = $Allowed_Classes[0]->classes;
        $Allowed_Classes = explode(",",$Allowed_Classes);
        $Allowed_Classes = "'".implode("','",$Allowed_Classes)."'";
        $Students = DB::select("select sa.CASERP_ID,sp.First_Name, sp.Middle_Name, sp.Last_Name, sp.Class from student_profile sp
        inner join student_academics sa where sa.email=sp.email and sp.class in ($Allowed_Classes)");
        $Students = json_encode($Students);
        return $Students;
    }

    public function RecordAttendance(Request $request){
        $data = json_decode($request->get('data'));
        $data = (array) $data; 
        $tmp = [];
        foreach($data as $ds){
            $ds = (array) $ds;
            array_push($tmp,$ds);
        }
        $data = $tmp;
        DB::table('attendance')->insert($data);
    }

    public function switchBetweenAttendance(Request $request){
        $activity_id = $request->get('activity_id');
        $count = DB::table('attendance')->where('id',$activity_id)->count();
        return $count;
    }

    public function presentExcelSheet(Request $request){
        $activity_id = $_GET['activity_id'];
        $activity_name = DB::select("select activity_name from activities where activity_id='$activity_id'");
        $activity_name = $activity_name[0]->activity_name;
        $output = '';

        $query = "SELECT sp.First_Name,sp.Middle_Name,sp.Last_Name,sa.CASERP_ID,sp.Class,sp.Branch from student_profile sp
        INNER JOIN 
        student_academics sa
        INNER JOIN attendance att
        WHERE sp.Email = sa.Email and 
        sa.CASERP_ID = att.CASERP_ID and 
        att.ID = '$activity_id' ";

        $data = DB::select($query);
        // We can Use PHPExcel Library to Store Data in .xlsx
        
        if($data){
            $output.= '
                    <b><caption> '.$activity_name.' Present Students </caption></b>
                    <table style="border:2px solid;">
                    <tr>
                        <th style="border:2px solid" >CASERP_ID</th>	
                        <th style="border:2px solid" >Name</th>	
                        <th style="border:2px solid" >Class</th>
                        <th style="border:2px solid" >Branch</th>
                        		
                    </tr>
                    ';
                    foreach($data as $ds)
                    {
                       
                        $output.='
                            <tr>
                                <td style="border:2px solid">'.$ds->CASERP_ID.'</td>
                                <td style="border:2px solid">'.$ds->First_Name.' '.$ds->Middle_Name.' '.$ds->Last_Name.'</td>
                                <td style="border:2px solid">'.$ds->Class.'</td>  
                                <td style="border:2px solid">'.$ds->Branch.'</td>  
                                                             
                            </tr>
                            ';
                    }
                    $output.='</table>';
                    header('Content-Type:  application/xls');
                    header('Content-Disposition: attachment; filename='.$activity_name.' Attendance'.'.xls'); 
                    echo $output;    
        }
        else{
            echo "No Records Found";
        }

    }

    public function absentExcelSheet(Request $request){
        $activity_id = $_GET['activity_id_absent'];
        $activity_name = DB::select("select activity_name from activities where activity_id='$activity_id'");
        $activity_name = $activity_name[0]->activity_name;

        $Allowed_Classes = DB::select("select classes from activities where activity_id = '$activity_id'");
        $Allowed_Classes = $Allowed_Classes[0]->classes;
        $Allowed_Classes = explode(",",$Allowed_Classes);
        $Allowed_Classes = "'".implode("','",$Allowed_Classes)."'";
        

        $output = '';

        $query = "SELECT sp.First_Name,sp.Middle_Name,sp.Last_Name,sa.CASERP_ID,sp.Class,sp.Branch 
        FROM student_profile sp 
        INNER JOIN 
        student_academics sa 
        where sa.CASERP_ID NOT IN (select CASERP_ID from attendance where id='$activity_id') 
        and sp.Email = sa.Email and sp.Class IN($Allowed_Classes)";


        $data = DB::select($query);
        // We can Use PHPExcel Library to Store Data in .xlsx
        
        if($data){
            $output.= '
                    <b><caption> '.$activity_name.' Absent Students </caption></b>
                    <table style="border:2px solid;">
                    <tr>
                        <th style="border:2px solid" >CASERP_ID</th>	
                        <th style="border:2px solid" >Name</th>	
                        <th style="border:2px solid" >Class</th>
                        <th style="border:2px solid" >Branch</th>
                        		
                    </tr>
                    ';
                    foreach($data as $ds)
                    {
                       
                        $output.='
                            <tr>
                                <td style="border:2px solid">'.$ds->CASERP_ID.'</td>
                                <td style="border:2px solid">'.$ds->First_Name.' '.$ds->Middle_Name.' '.$ds->Last_Name.'</td>
                                <td style="border:2px solid">'.$ds->Class.'</td>  
                                <td style="border:2px solid">'.$ds->Branch.'</td>  
                                                             
                            </tr>
                            ';
                    }
                    $output.='</table>';
                    header('Content-Type:  application/xls');
                    header('Content-Disposition: attachment; filename='.$activity_name.' Attendance'.'.xls'); 
                    echo $output;    
        }
        else{
            echo "No Records Found";
        }

    }

    public function allExcelSheet(Request $request){
        $activity_id = $_GET['activity_id_all'];
        $activity_name = DB::select("select activity_name from activities where activity_id='$activity_id'");
        $activity_name = $activity_name[0]->activity_name;
        $output = '';

        $Allowed_Classes = DB::select("select classes from activities where activity_id = '$activity_id'");
        $Allowed_Classes = $Allowed_Classes[0]->classes;
        $Allowed_Classes = explode(",",$Allowed_Classes);
        $Allowed_Classes = "'".implode("','",$Allowed_Classes)."'";



        
        $query = "SELECT sp.First_Name,sp.Middle_Name,sp.Last_Name,sa.CASERP_ID,sp.Class,sp.Branch
        from student_profile sp 
        INNER JOIN student_academics sa 
        where sp.Email = sa.Email 
        and sp.Class IN($Allowed_Classes)";

        $data = DB::select($query);
        // We can Use PHPExcel Library to Store Data in .xlsx
        
        if($data){
            $output.= '
                    <b><caption> '.$activity_name.' All Students </caption></b>
                    <table style="border:2px solid;">
                    <tr>
                        <th style="border:2px solid" >CASERP_ID</th>	
                        <th style="border:2px solid" >Name</th>	
                        <th style="border:2px solid" >Class</th>
                        <th style="border:2px solid" >Branch</th>
                        		
                    </tr>
                    ';
                    foreach($data as $ds)
                    {
                       
                        $output.='
                            <tr>
                                <td style="border:2px solid">'.$ds->CASERP_ID.'</td>
                                <td style="border:2px solid">'.$ds->First_Name.' '.$ds->Middle_Name.' '.$ds->Last_Name.'</td>
                                <td style="border:2px solid">'.$ds->Class.'</td>  
                                <td style="border:2px solid">'.$ds->Branch.'</td>  
                                                             
                            </tr>
                            ';
                    }
                    $output.='</table>';
                    header('Content-Type:  application/xls');
                    header('Content-Disposition: attachment; filename='.$activity_name.' Attendance'.'.xls'); 
                    echo $output;    
        }
        else{
            echo "No Records Found";
        }

    }

    
}
