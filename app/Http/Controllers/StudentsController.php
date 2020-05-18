<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;

class StudentsController extends Controller
{
    public function processStudents(){
        $placement_status = DB::select('select distinct placement_status from placement_details');
        return view('Pages.TPO.processStudents',compact('placement_status'));
    }

    public function updateStudent(Request $request){
        if($request->ajax()){
            $email = $request->get('email');
            $status = $request->get('status');
            $company = $request->get('company');
            $package = $request->get('package');
            
            DB::table('placement_details')->where('email', $email)->update(['Placement_Status' => $status]);
            DB::table('placement_details')->where('email', $email)->update(['Company_Name' => $company]);
            DB::table('placement_details')->where('email', $email)->update(['Package' => $package]);

        }
    }


    public function searchStudent(Request $request){
        if($request->ajax()){
            $data = $request->get('processsearch');
            Debugbar::info($data);
            $value = DB::select("select sp.Email,sp.First_Name,sp.Middle_Name,sp.Last_Name,sp.Branch,sp.Class
            ,pd.Placement_Status,pd.Company_Name,pd.Package from student_profile sp inner join placement_details pd where sp.Email = pd.Email and
            sp.First_Name like '$data%'");
            
            if(empty($value))
                return response()->json(['success' => 'Data Not Found For'.' '.$data,'bit'=>'0']);

            $value = json_encode($value);
            Debugbar::info($value);
            return response()->json(['success' => $value,'bit'=>'1']);
        }
    }
}
