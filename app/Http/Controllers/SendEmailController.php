<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\mainDB;
use DB;
use Auth;


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

        $query = "select Name,Password from users where Email='$mail'";
        $details = DB::select($query);
     Mail::to($data['email'])->send(new SendMail($details));
     return back()->with('success', 'Thanks for contacting us!');

    }
}

?>