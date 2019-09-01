<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;
use Auth;
use Barryvdh\Debugbar\Facade as Debugbar;

class ProcessController extends Controller
{
    public function index(){
        return view('pages.login');
    }

    public function insertLoginDetails(Request $request){
        
       if(request()->ajax()){
           $data = array(
               'Email' => $request->get('email'),
               'Username' => $request->get('username'),
               'Password' => $request->get('password')

           );

        DB::table('Login_Details')->insert($data);
        DB::table('student_profile')->insert(['Email' => $data['Email']]);

        return response()->json(['success' => 'Account Created Successfully']);
       }
       
    }

    public function checkLoginAndEnter(Request $request){
        
        if(request()->ajax()){
            $data = array(
                'Email' => $request->get('email'),
                'Password' => $request->get('password')
            );
        }
        $query = "select count(*) as count from login_details where email=? AND password =?";

        $count = DB::select($query,[$data['Email'],$data['Password']]);
        // Debugbar::info($count);
        $countint = $count[0]->count;
        Debugbar::info($countint);
               
        if($countint>0){
            return response()->json(['success' => 'Verified','setter' => '1']);
        }
        else{
            return response()->json(['success' => 'Illigal Data','setter' => '0']);
        }
    } 
}
