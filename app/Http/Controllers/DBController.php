<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;
use Auth;
use Barryvdh\Debugbar\Facade as Debugbar;


class DBController extends Controller
{

    public function index(Request $request) {

        $branchquery = "select distinct branch from branch";
        $branch = DB::select($branchquery);
             
        if(request()->ajax()){
            
            $branchdata = $request->get('branch');
            $yeardata = $request->get('year');
            if($branchdata=='all'){
                if($yeardata=='all'){
                    $qry = 'select * from student_profile sp INNER JOIN
                            student_academics sa INNER JOIN placement_details pd
                            ON sp.Email = sa.Email and sp.Email = pd.Email and sp.Email not like "tpo@mgmcen.ac.in" ';
                    
                    $students = DB::select($qry);
                    $cnt = count($students);
                    $students = json_encode($students);
                            
                    if($cnt>0)
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'1','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                    else
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'0','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                    
                    
                } // End if inner if
                else{
                    $qry = "select * from student_profile sp INNER JOIN 
                            student_academics sa INNER JOIN placement_details pd 
                            ON sp.Email = sa.Email and sp.Email = pd.Email and Passout_Year= '$yeardata'
                            and sp.Email not like 'tpo@mgmcen.ac.in' ";

                    $students = DB::select($qry);
                    $cnt = count($students);
                    $students = json_encode($students);
                    
                    if($cnt>0)
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'1','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                    else
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'0','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                      
                    
                }
            }// End of Outer if
            else if($yeardata=='all'){
                if($branchdata=='all'){
                    $qry = 'select * from student_profile sp INNER JOIN 
                            student_academics sa INNER JOIN placement_details pd
                            ON sp.Email = sa.Email and sp.Email = pd.Email
                            and sp.Email not like "tpo@mgmcen.ac.in" ';
                    
                    $students = DB::select($qry);
                    $cnt = count($students);
                    $students = json_encode($students);

                    if($cnt>0)
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'1','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                    else
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'0','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                      
                       
                }// End inner if
                else{
                    $qry = "select * from student_profile sp 
                            INNER JOIN student_academics sa 
                            INNER JOIN placement_details pd 
                            where sp.Email = sa.Email and sp.Email = pd.Email and Branch='$branchdata'
                            and sp.Email not like 'tpo@mgmcen.ac.in' ";
                    // Debugbar::info($branchdata);
                    
                    $students = DB::select($qry);
                    $cnt = count($students);
                    $students = json_encode($students);
                    

                    if($cnt>0)
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'1','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                    else
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'0','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                    // return response()->json(['sucess'=>'Success','studentsjson'=>$students,'branchjson'=>$branch]); 
                }// End Inner Else
            }// End outer else if
            else{
                $qry = "select * from student_profile sp 
                        INNER JOIN student_academics sa 
                        INNER JOIN placement_details pd 
                        ON sp.Email = sa.Email and sp.Email = pd.Email 
                        and sp.Email not like 'tpo%' and sp.branch='$branchdata' 
                        and sp.passout_year='$yeardata'
                        and sp.Email not like 'tpo@mgmcen.ac.in' ";

                $students = DB::select($qry);
                $cnt = count($students);
                $students = json_encode($students);
                
                if($cnt>0)
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'1','studentsjson'=>$students,'branchjson'=>$branch]);
                    }
                else
                    {
                        return response()->json(['sucess'=>'Success','databit'=>'0','studentsjson'=>$students,'branchjson'=>$branch]);
                    }   
            }// End outer Else
        }// If request->ajax ends
        return view('pages.TPO.exportStudentsData',compact('branch'));
     }
     
     
     public function excel(Request $request){
        // $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
        // if(request()->ajax()){
        //     $dataqry = array(
        //         'query' => $request->get('query')
        //     );
                Debugbar::info("aaye re");
                $query = $_POST['hiddenquery'];   
                // echo $query;         
                $data = DB::select($query);
                $output = '';
                if(isset($data)){
                    $output.= '
                    <table style="border:2px solid">
                    <tr>
                        <th style="border:2px solid" >CASERP_ID</th>	
                        <th style="border:2px solid" >Email</th>
                        <th style="border:2px solid" >Branch</th>	
                        <th style="border:2px solid" >Class</th>	
                        <th style="border:2px solid" >Name</th>	
                        <th style="border:2px solid" >SSC Percentage</th>	
                        <th style="border:2px solid" >HSC Percentage</th>	
                        <th style="border:2px solid" >Polytechnic Percentage</th>	
                        <th style="border:2px solid" >First Year CGPA</th>	
                        <th style="border:2px solid" >Second Year CGPA</th>	
                        <th style="border:2px solid" >Third Year CGPA</th>	
                        <th style="border:2px solid" >First Year Percentage</th>
                        <th style="border:2px solid" >Second Year Percentage</th>
                        <th style="border:2px solid" >Third Year Percentage</th>
                        <th style="border:2px solid" >Overall Academic Gap</th>
                        <th style="border:2px solid" >Placement Status</th>
                        <th style="border:2px solid" >Company Name</th>
                        <th style="border:2px solid" >Package</th>
                        
                    </tr>
                    ';
                    // Debugbar::info($data[0]->Email);
                    for($i=0;$i<count($data);$i++) {
                        $output.='
                            <tr>
                                <td style="border:2px solid">'.$data[$i]->CASERP_ID.'</td>
                                <td style="border:2px solid">'.$data[$i]->Email.'</td>
                                <td style="border:2px solid">'.$data[$i]->Branch.'</td>
                                <td style="border:2px solid">'.$data[$i]->Class.'</td>
                                <td style="border:2px solid">'.$data[$i]->First_Name.' '.$data[$i]->Middle_Name.' '.$data[$i]->Last_Name.'</td>
                                <td style="border:2px solid">'.$data[$i]->SSC.'</td>
                                <td style="border:2px solid">'.$data[$i]->HSC.'</td>
                                <td style="border:2px solid">'.$data[$i]->Poly.'</td>
                                <td style="border:2px solid">'.$data[$i]->FE_CGPA.'</td>
                                <td style="border:2px solid">'.$data[$i]->SE_CGPA.'</td>
                                <td style="border:2px solid">'.$data[$i]->TE_CGPA.'</td>
                                <td style="border:2px solid">'.$data[$i]->FE_PERCENT.'</td>
                                <td style="border:2px solid">'.$data[$i]->SE_PERCENT.'</td>
                                <td style="border:2px solid">'.$data[$i]->TE_PERCENT.'</td>
                                <td style="border:2px solid">'.$data[$i]->Overall_Gap.'</td>
                                <td style="border:2px solid">'.$data[$i]->Placement_Status.'</td>
                                <td style="border:2px solid">'.$data[$i]->Company_Name.'</td>
                                <td style="border:2px solid">'.$data[$i]->Package.'</td>
                                                    

                            </tr>
                            ';
                    }
                    $output.='</table>';
                    header('Content-Type:  application/xls');
                    header('Content-Disposition: attachment; filename=students_data.xls'); 
                    echo $output; 
                } 
            
        // }

        
    }//End of Function

}
