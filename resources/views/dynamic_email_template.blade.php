<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\mainDB;
use DB;
use Auth;
use Session;
use Hash;

  $OTP=rand(111111,999999);
  //$OTP1=Hash::make($OTP);
$me=Session::get('me');
DB::table('password_resets')->where('Email',$me)->update(['token' =>$OTP]);
?>
<center><h4> MGM COLLEGE OF ENGINEERING </h4></center>
@foreach($details as $ds)
<p>Hi, {{$ds->Name}}  </p>
<p>Here is your OTP For Reset Password: <h3>{{$OTP}}</h3> </P>
<p>Thanks for Choosing this Application Any Query Contact:</p>
<p>1. Prashant Phulari :9022247003</p>
<p>2. Furkhan Shaikh :9763118461</p>
@endforeach

<script>

</script>