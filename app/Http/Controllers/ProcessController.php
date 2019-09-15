<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;
use Auth;
use Validator;
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

    public function checkLoginAndEnter(Request $request){
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $email  = $request->get('email');
        $password =  $request->get('password');
        // $emailByType = DB::select("select Email from login_details where user_type = 'TPO' ");
        // Debugbar::info($emailByType[0]->Email);
        if(Auth::attempt(['email' =>$email,'password'=>$password])){
                return redirect('/dashboard');
        }
        else{
            Debugbar::info('Inside Else');
            return back()->with('error','Invalid Email or Password');
        }

        // $query = "select count(*) as count from login_details where email=? AND password =?";

        // $count = DB::select($query,[$authdata['Email'],$authdata['Password']]);
        // // Debugbar::info($count);
        // $countint = $count[0]->count;
        // Debugbar::info($countint);
               
        // if($countint>0){
        //     return response()->json(['success' => 'Verified','setter' => '1']);
        // }
        // else{
        //     return response()->json(['success' => 'Illigal Data','setter' => '0']);
        // }
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

}
