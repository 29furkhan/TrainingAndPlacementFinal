<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;
use Auth;
use Barryvdh\Debugbar\Facade as Debugbar;


class DBController extends Controller
{
    public function index() {
        $branchquery = "select distinct branch from branch";
        $branch = DB::select($branchquery);
        $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
        $students = DB::select($query);
        Debugbar::info($students);
        return view('Pages.TPO.exportStudentsData',['students'=>$students,'branch'=>$branch]);
     }

     public function getYearAndBranch(Request $request){
         if(request()->ajax()){
            $data = array(
                'Branch' => $request->get('branch'),
                'Passout_Year' =>$request->get('year')
            );
            Debugbar::info($data);
            // All Years All Branches
            if($data['Passout_Year']=='all'){
                if($data['Branch']=='all'){
                    $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
                    $students = DB::select($query);
                    Debugbar::info($students);
                    if(!empty($students)){
                        return response()->json(['success' => 'Data Found','bit'=>'1']);
                    }
                    else{
                        return response()->json(['success' => 'No Data Found','bit'=>'0']);
                    }
                }
                else{
                    $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and Branch=?';
                    $students = DB::select($query,[$data['Branch']]);
                    if(!empty($students)){
                        return response()->json(['success' => 'Data Found','bit'=>'1']);
                    }
                    else{
                        return response()->json(['success' => 'No Data Found','bit'=>'0']);
                    }

                }
            }
            else if($data['Branch']=='all'){
                if($data['Passout_Year']=='all'){
                    $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
                    $students = DB::select($query);
                    
                    // foreach ($students as $students => $value) {
                    //     Debugbar::info($students[0]->$value);
                    // }

                    if(!empty($students)){
                        return response()->json(['success' => 'Data Found','bit'=>'1']);
                    }
                    else{
                        return response()->json(['success' => 'No Data Found','bit'=>'0']);
                    }
                }
                else{
                    $query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and Passout_Year=?';
                    $students = DB::select($query,[$data['Passout_Year']]);
                    if(!empty($students)){
                        return response()->json(['success' => 'Data Found','bit'=>'1']);
                    }
                    else{
                        return response()->json(['success' => 'No Data Found','bit'=>'0']);
                    }


                }
            }
            else{
                $query = "select distinct * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd where sp.Email = sa.Email and sp.Email = pd.Email and Branch=? and Passout_Year=?";
                $students = DB::select($query,[$data['Branch'],$data['Passout_Year']]);

                if(!empty($students)){
                    return response()->json(['success' => 'Data Found','bit'=>'1']);
                }
                else{
                    return response()->json(['success' => 'No Data Found','bit'=>'0']);
                }
            }
            
         }//End Ajax()->request()
     }

     public function excel(){
        $query = 'select * from login_details';
        $data = DB::select($query);
        $output = '';
        if(isset($data)){
            $output.= '
            <table style="border:2px solid">
            <tr>
                <th style="border:2px solid" >Email</th>
                <th style="border:2px solid" >Password</th>	
            </tr>
            ';
            Debugbar::info($data[0]->Email);
            for($i=0;$i<=1;$i++) {
                $output.='
                    <tr>
                        <td style="border:2px solid">'.$data[$i]->Email.'</td>
                        <td style="border:2px solid">'.$data[$i]->password.'</td>
                    </tr>
                    ';
            }
            $output.='</table>';
            header('Content-Type:  application/xls');
            header('Content-Disposition: attachment; filename=students_data.xls'); 
            echo $output;   
        }

        
    }

}
