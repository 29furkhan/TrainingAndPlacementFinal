<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;
use Auth;
use Barryvdh\Debugbar\Facade as Debugbar;


class DBController extends Controller
{

    // private $qry;
    public function index() {
        Debugbar::info('I am Called');
        $branchquery = "select distinct branch from branch";
        $branch = DB::select($branchquery);
        $qry = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
        $students = DB::select($qry);
        // Debugbar::info($students);
        return view('Pages.TPO.exportStudentsData',compact('students','branch'));
     }
     
     public function getYearAndBranch(Request $request){
        $branchquery = "select distinct branch from branch";
        $branch = DB::select($branchquery);
        // Debugbar::info('Aagaya');
         if(request()->ajax()){
            $data = array(
                'Branch' => $request->get('branch'),
                'Passout_Year' =>$request->get('year')
            );
            Debugbar::info($data);
            // All Years All Branches
            if($data['Passout_Year']=='all'){
                if($data['Branch']=='all'){
                    $qry = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
                    $students = DB::select($qry);
                    Debugbar::info($students);
                    if(!empty($students)){
                        Debugbar::info('Returning View for all Students of All Years');
                        return view('Pages.TPO.exportStudentsData',compact('students','branch'));
                    }
                    else{
                        return view('Pages.TPO.exportStudentsData',compact('students','branch'));
                    }
                }
                else{
                    Debugbar::info('Inside Else');
                    $qry = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and Branch= ?';
                    $students = DB::select($qry,[$data['Branch']]);
                    if(!empty($students)){
                        Debugbar::info($students);
                        // Debugbar::info('Returning View for all Students of All Years with Different Branches');
                        
                        return response()->json(['sucess'=>'Success','studentsjson'=>$students,'branchjson'=>$branch]);    
                    }
                    else{
                        return view('Pages.TPO.exportStudentsData',compact('students','branch'));    
                    }

                }
            }
            else if($data['Branch']=='all'){
                if($data['Passout_Year']=='all'){
                    $this->qry = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
                    $students = DB::select($this->qry);
                    $students = json_encode($students);
                    // foreach ($students as $students => $value) {
                    //     Debugbar::info($students[0]->$value);
                    // }

                    if(!empty($students)){
                        return response()->json(['success' => 'Data Found','bit'=>'1','queryresult' => $students]);
                    }
                    else{
                        return response()->json(['success' => 'No Data Found','bit'=>'0']);
                    }
                }
                else{
                    $qry = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd where sp.Email = sa.Email and sp.Email = pd.Email and Passout_Year=?';
                    $students = DB::select($qry,[$data['Passout_Year']]);
                    $students = json_encode($students);
                    if(!empty($students)){
                        return response()->json(['success' => 'Data Found','bit'=>'1','queryresult' => $students]);
                    }
                    else{
                        return response()->json(['success' => 'No Data Found','bit'=>'0']);
                    }


                }
            }
            else{
                $qry = "select distinct * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd where sp.Email = sa.Email and sp.Email = pd.Email and Branch=? and Passout_Year=?";
                $students = DB::select($qry,[$data['Branch'],$data['Passout_Year']]);
                $students = json_encode($students);
                if(!empty($students)){
                    return response()->json(['success' => 'Data Found','bit'=>'1','queryresult' => $students]);
                }
                else{
                    return response()->json(['success' => 'No Data Found','bit'=>'0']);
                }
            }   
            
         }//End Ajax()->request()
     }

     public function excel(Request $request){
        // $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
        // if(request()->ajax()){
        //     $dataqry = array(
        //         'query' => $request->get('query')
        //     );
            $query = $_POST['hiddenquery'];
            Debugbar::info($query);
            $data = DB::select($query);
            Debugbar::info($data);
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
                Debugbar::info($data[0]->Email);
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
            // } 
            
        }

        
    }//End of Function

}
