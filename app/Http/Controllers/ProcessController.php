<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainDB;
use DB;

class ProcessController extends Controller
{
    public function insertLoginDetails(Request $request){
        
        $input = $request->all;
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        DB::table('Login_Details')->insert(
            ['Email' => $email,
             'Username' =>$username,
             'Password' =>$password
            ]
        );

        DB::table('student_profile')->insert(
            ['Email' => $email
            ]
        );
        return "Record Inserted Successfully";
    }
}
