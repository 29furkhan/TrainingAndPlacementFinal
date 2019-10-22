<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;
use Auth;
use Validator;
use Session;
use Barryvdh\Debugbar\Facade as Debugbar;
use Hash;

class ProcessController extends Controller
{
    public function samePageAJAX(Request $request){
        if(request()->ajax()){
            $authdata = array(
                'query' => $request->get('queryinputfield')
            );
            return $authdata;
        }
    }

    public function index(){
        return view('pages.login');
    }

    public function insertLoginDetails(Request $request){
        
       if(request()->ajax()){
           $pass = Hash::make($request->get('password'));
           $authdata = array(
               'Email' => $request->get('email'),
               'Password' => $pass
           );

           $names = array(
            'First_Name' => ucfirst($request->get('first_name')),
            'Last_Name'  => ucfirst($request->get('last_name'))
           );

           $users = array(
            'Email' => $request->get('email'),
            'Password' => $pass,
            'Name' => ucfirst($request->get('first_name')) .' '. ucfirst($request->get('last_name'))
        );


        DB::table('Login_Details')->insert($authdata);
        DB::table('student_profile')->insert(['Email' => $authdata['Email']]);
        DB::table('student_profile')->where('Email', $authdata['Email'])->update(['First_Name' => $names['First_Name']]);
        DB::table('student_profile')->where('Email', $authdata['Email'])->update(['Last_Name' => $names['Last_Name']]);
        // DB::table('student_profile')->update();
        DB::table('student_academics')->insert(['Email' => $authdata['Email']]);
        DB::table('placement_details')->insert(['Email' => $authdata['Email']]);
        DB::table('users')->insert($users);
        DB::table('password_resets')->insert(['Email' => $authdata['Email']]);
            

        return response()->json(['success' => 'Account Created Successfully']);
       }
       
    }

    public function resetP(Request $request)
    {
        Debugbar::info('inside resetpassword');
        if(request()->ajax()){
            $pass = Hash::make($request->get('password'));
            $authdata = array(
                'Email' => $request->get('email'),
                'Password' => $pass
            );
            $mail= $authdata['Email'];
            $tokenquery = "select token from password_resets where email='$mail'";
            $token = DB::select($tokenquery);

            foreach($token as $tn){    
            Debugbar::info("  $tn->token ");
            
            $OTP= $request->get('token');
            //$OTP=Hash::make($OTP);
            Debugbar::info($OTP);
            
            if($tn->token != $OTP){
                Debugbar::info('OTP Incorrect');
                return response()->json(['success' => 'Incorrect OTP Please Try Again','databit'=>'0']);
            }
            if($tn->token == $OTP)
             {
            Debugbar::info('OTP Verified');
            DB::table('login_Details')->where('Email',$mail)->update(['Password' =>$authdata['Password']]);
            DB::table('users')->where('Email',$mail)->update(['Password' =>$authdata['Password']]);
            DB::table('password_resets')->where('Email',$mail)->update(['token' => 'NULL']);
            return response()->json(['success' => 'Password Reset Successfully','databit'=>'1']);
            }
           
        }
        }

    }
    public function checkLoginAndEnter(Request $request){
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $email  = $request->get('email');
        $password =  $request->get('password');
        $type = DB::select("select user_type from users where email = '+$email+' ");

        $me=$email;
        Session::put('me',$me);

        if(Auth::attempt(['email' =>$email,'password'=>$password,'user_type'=>'TPO'])){
                return redirect('/dashboard');
        }
        else if(Auth::attempt(['email' =>$email,'password'=>$password,'user_type'=>'students'])){
            return redirect('/student');
        }
        else{
            Debugbar::info('Inside Else');
            return back()->with('error','Invalid Email or Password');
        }
    } 

    public function checkAvailabilityEmail(Request $request){
        if(request()->ajax()){
            $email = array(
                'Email' => $request->get('email')
            );

            $authdata = DB::table('login_details')->where('email',$email)->count();
            if ($authdata > 0){
                echo 'Duplicate';
            }
            else{
                echo 'Unique';
            }

        }

    }

   


    function logout()
    {
       
     Auth::logout();
     return redirect('/main');
    }

        //TO get Branch in Branch Dropdown in Edit Profile
    public function Rbranch() {
            $me=Session::get('me');
    
            // Debugbar::info($me);
            $branchquery = "select distinct branch from branch";
            $branch = DB::select($branchquery);
            $all="select sa.CASERP_ID,sp.Email,sp.FIRST_NAME,sp.MIDDLE_NAME,sp.LAST_NAME,sp.BRANCH,sp.CLASS,sp.PASSOUT_YEAR from Student_profile sp INNER JOIN student_academics sa where sp.Email=sa.Email and sp.Email='$me'";
            $details=DB::select($all);
            Debugbar::info($details);
            $new="select * from Student_academics where Email='$me'";
            $academic=DB::select($new);
            $queryforclasses = "select class from branch";
            $classes=DB::select($queryforclasses);
            $placement_status = DB::select("select placement_status,company_name,package from placement_details where Email ='$me'");
            return view('Pages.Student.profile',compact('branch','details','academic','classes','placement_status'));
         }

    public function getClassForGivenBranch(Request $request){
        if(request()->ajax()){
            $branch = $request->get("data");
            $query = "select distinct class from branch where branch='$branch'";
            $classes=DB::select($query);
            $classes = json_encode($classes);
            Debugbar::info($classes);
            return $classes;
        }
    }

    public function insertProfileDetails(Request $request){
            Debugbar::info('outside ');
            if(request()->ajax()){
                Debugbar::info('Inside ');
                $data= array(
                    // 'id' => $request->get('s_id'),
                    'Email' => $request->get('email'),
                    'First_Name' => $request->get('first_name'),
                    'Middle_Name' => $request->get('middle_name'),
                    'Last_Name' => $request->get('last_name'),
                    'Branch' => $request->get('branch'),
                    'Class' => $request->get('class'),

                );
                $data1= array(
                    'CASERP_ID' => $request->get('s_id'),
                    'SSC' => $request->get('ssc'),
                    'HSC' => $request->get('hsc'),
                    'Poly' => $request->get('diploma'),
                    'FE_CGPA' => $request->get('fe_cgpa'),
                    'SE_CGPA' => $request->get('se_cgpa'),
                    'TE_CGPA' => $request->get('te_cgpa'),
                    'FE_PERCENT' => $request->get('fe_percent'),
                    'SE_PERCENT' => $request->get('se_percent'),
                    'TE_PERCENT' => $request->get('te_percent'),
                    'OVERALL_GAP' =>$request->get('overall_gap')
    
                );
                Debugbar::info("Hello");
                Debugbar::info($data1['Poly']);
                if($data1['Poly']==null )
                {
                   $data1['Poly']="0.000";
                }
                if( $data1['FE_CGPA']==null && $data1['FE_PERCENT']==null)
                {
                    $data1['FE_CGPA']="0.0";
                    $data1['FE_PERCENT']="0.000";
                }
                if($data1['HSC']==null)
                {
                   $data1['HSC']="0.000";
                }
    
             Debugbar::info($data);
             Debugbar::info($data1);
             
            //  DB::table('student_profile')->insert($data);
            //  Debugbar::info($data);
            $me=Session::get('me');

            DB::table('student_profile')->where('Email',$me)->update($data);
            DB::table('student_academics')->where('Email',$me)->update($data1);
            DB::table('users')->where('Email',$me)->update(['name' =>$data['First_Name'].' '.$data['Last_Name']]);
            // DB::table('users')->where('Email',$me)->update(['Email'=>$data['Email']]);
            // DB::table('student_academics')->where('Email',$me)->update(['Email'=>$data['Email']]);

             //DB::table('student_profile')->insert(['Email' => $data['Email']]);
     
             return response()->json(['success' => 'Profile Updated Successfully']);
            }
            
    }  
}
