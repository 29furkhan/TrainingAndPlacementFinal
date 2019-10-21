<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\mainDB;
use DB;
use Auth;
use Session;

class SendEmailController extends Controller
{
    function index()
    {
     return view('pages.reset');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'email'  =>  'required|email',
     ]);

        $data = array(
            'email'     =>  $request->email
        );
        $mail=$data['email'];
        Session::put('me',$mail);
        $query = "select Name,Password,email from users where Email='$mail'";
        $details = DB::select($query);
     Mail::to($data['email'])->send(new SendMail($details));
    return \Redirect::route('ResetPassword')->with('success', 'OTP is send to Your Email');    //  return view('pages.resetPassword')->with('success', 'OTP is send to Your Email');
    }
}

?>