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
  
</head>

<!-- Script To Submit Form -->
<script>
var email;
var username;
var password;
var repassword;

function getAllValues(){
  email=document.getElementById('email').value;
  username=document.getElementById('username').value;
  password=document.getElementById('password').value;
  repassword=document.getElementById('password_again').value;
}

function allset(){
  if(password==repassword && password.length>=8){
    return 1;
  }
  return 0;
}

function redirectToLogin(){
  location.replace("/login");
}


  $(document).ready(function(){
      $("#signupform").submit(function(){
        // e.preventDefault();
        getAllValues();
        if(allset()){
          console.log('inside ajax');
          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url : 'php/insert/login',
            data: {
              email : email,
              username  : username,
              password  : password  
            },
            success:function(data){
              console.log(data);
              redirectToLogin();
            },
            error:function(data){
              console.log(data);
            }
          });
        } //End if
        else{
          if(password!=repassword){
            document.getElementById('msg').style.display="block";
            document.getElementById('msg').innerHTML="*Password And Re-Typed password doesn't match";
          }
          else if (password.length<8){
            document.getElementById('msg').style.display="block";
            document.getElementById('msg').innerHTML="*Password Must Be Atleast 8 Digit Long!!";
          }
            
        }
    });        
  }); 
</script>

<body class="login-img3-body">

  <div class="container">

    <form id="signupform" class="login-form" method="POST" action="" style="margin-top: 5%">
    {{csrf_field()}}
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mail"></i></span>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required autofocus>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required autofocus>
        </div>
        
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" minlenght="8" required>
          </div>

          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key"></i></span>
            <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Re-Type Password" minlenght="8" required/>
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
