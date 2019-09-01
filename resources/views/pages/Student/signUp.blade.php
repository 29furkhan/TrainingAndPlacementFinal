<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="images/favicon.png">

  <title>Sign Up Page</title>

  <link href="css/style.css" rel="stylesheet">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <!-- Main.js -->
  <script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- parsley.js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>
  
</head>

<!-- Script To Submit Form -->
<script>
function redirectToLogin(){
  location.replace("/main");
}

$(document).ready(function(){
    $('#signupform').parsley();

    $('#signupform').on('submit',function(event){
      event.preventDefault();
      if($('#signupform').parsley().isValid()){
        $.ajax({
          url:"/php/insert/login",
          method:"GET",
          data:$(this).serialize(),
          dataType:"json",
          beforeSend:function(){
            $('#submit').attr('disabled','disabled');
            $('#submit').val('Creating Your Account...','');
          },
          success:function(data){
            $('#signupform')[0].reset();
            $('#signupform').parsley().reset();
            $('#submit').attr('disabled',false);
            $('#submit').val('Submit');
            alert(data.success);
            redirectToLogin();
          }
        });
      }
    });
});

</script>

<body class="login-img3-body bodycolor">

  <div class="container"> 

    <form  id="signupform" class="login-form" style="margin-top: 5%">
    @csrf
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        <div class="input-group">
          <!-- <span class="input-group-addon"><i class="icon_mail"></i></span> -->
          <span style="color:black;font-size:16px;">Email:</span>
          <input  type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-type-message="Please Enter a Valid Email Address" />
        </div>
        
        <div class="input-group">
          <!-- <span class="input-group-addon"><i class="icon_profile"></i></span> -->
          <span style="color:black;font-size:16px;">Username:</span>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required data-parsley-length="[8,20]" data-parsley-type="alphanum" data-parsley-trigger="keyup" data-parsley-type-message="Username should not contain Space or Special Characters"/>
        </div>
        
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="icon_key"></i></span> -->
            <span style="color:black;font-size:16px;">Password:</span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required data-parsley-length="[8,20]" data-parsley-trigger="keyup"/>
          </div>

          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="icon_key"></i></span> -->
            <span style="color:black;font-size:16px;">Re-Type Password:</span>
            <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Re-Type Password" required data-parsley-equalto="#password" data-parsley-trigger="keyup"/>
          </div>

          <label id="msg" style="display:none;color:red;padding-bottom:15px;font-weight:500;" class=""></label>

        <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Sign Up"/>
      </div>
    </form>
  </div>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    function hello() {
      swal("Done!", "You have succesfully submitted!", "success");
    }
  </script>

</body>

</html>
