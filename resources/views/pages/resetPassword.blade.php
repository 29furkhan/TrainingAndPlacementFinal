<?php
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


</head>

<body class="login-img3-body">

<div class="container">

<form class="login-form" method="POST" action="">
{{ csrf_field() }}
<div class="login-wrap">
    <p class="login-img"><i class="icon_lock_alt"></i></p>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
      </div>
    @endif
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="email" class="form-control" name="email" placeholder="Enter Email" autofocus>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="text" class="form-control" name="OTP" placeholder="Enter OTP" autofocus>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="password" class="form-control" name="password" placeholder="Enter New Password" autofocus>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="password" class="form-control" name="repassword" placeholder="Confirm Password" autofocus>
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit" name='send' value='Send'  >Reset</button>
  </div>
</form>
</div>

</body>

</html>
