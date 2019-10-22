<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\mainDB;
// use DB;
// use Auth;
// use Session;

$me=Session::get('me');

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Reset Password</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet"/>
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <!-- Main.js -->
  <script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- parsley.js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>

</head>


<script>

function redirectToLogin(){
  location.replace("/main");
}


$(document).ready(function(){
    $('#reset_password').parsley();

$('#reset_password').on('submit',function(event){
      event.preventDefault();
      if($('#reset_password').parsley().isValid()){
        $.ajax({
          url:"/php/insert/resetP",
          method:"GET",
          data:$(this).serialize(),
          dataType:"json",
          beforeSend:function(){
            $('#submit').attr('disabled','disabled');
            $('#submit').val('Please Wait...','');
          },
          success:function(data){
            $('#reset_password')[0].reset();
            $('#reset_password').parsley().reset();
            $('#submit').attr('disabled',false);
            $('#submit').val('Submit');
            alert(data.success);
            if(data.databit == "1")
              redirectToLogin();
          }
        });
      }
    });
});

</script>
<body class="login-img3-body bodycolor">

<div class="container">

<form id="reset_password" class="login-form" style="margin-top: 3%">
{{ csrf_field() }}
<div class="login-wrap">
    <p class="login-img"><i class="icon_lock_alt"></i></p>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type='button' class="close" data-dismiss='alert'>x</button>
            {{ $message }}
        </div>
      @endif

    <div id="emailgroup" class="input-group">
          <!-- <span class="input-group-addon"><i class="icon_mail"></i></span> -->
          <span style="color:black;font-size:16px;">Email:</span>
          <input  autocomplete="off" readonly type="email" class="form-control" value="<?php echo $me ;?>" id="email" name="email" placeholder="Enter Email" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-type-message="Please Enter a Valid Email Address" />
        </div>

    <div class="input-group">
            <span style="color:black;font-size:16px;">OTP:</span>
            <input  autocomplete="off" type="text"  class="form-control" id="token" name="token" placeholder="Enter OTP" required data-parsley-pattern="/^[0-9]+$/" data-parsley-trigger="keyup" />
    </div>
    <div class="input-group">
            <!-- <span class="input-group-addon"><i class="icon_key"></i></span> -->
            <span style="color:black;font-size:16px;">Password:</span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required data-parsley-pattern='/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/'  data-parsley-length="[8,20]" data-parsley-trigger="keyup" data-parsley-error-message="<br>1. Password Should Contain Atleast 1 Number <br><br>2. Password Should Contain Atleast 1 Lowercase Letter<br><br>
            3. Password Should Contain Atleast 1 Uppercase Letter<br><br> 4. Password Should Contain Atleast 1 Special Character"/>
          </div>

          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="icon_key"></i></span> -->
            <span style="color:black;font-size:16px;">Re-Type Password:</span>
            <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Re-Type Password" required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
          </div>
          <label id="msg" style="display:none;color:red;padding-bottom:15px;font-weight:500;" class=""></label>

    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Reset"/>
  </div>
</form>
</div>

</body>

</html>
