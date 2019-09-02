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

<script>
var setEmail = -1;
</script>

<!-- Email Availability -->
<script>

function validateEmail(email) {
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,3})+$/;
  return re.test(email);
}

function enableErrorEmail(email){
  document.getElementById('emailgroup').style.paddingBottom = '0px';
  document.getElementById('error_email').style.display="block";
  document.getElementById('email').style.color="#B94A48";
  document.getElementById('email').style.background="#F2DEDE";
  document.getElementById('email').style.border="1px solid #EED3D7";
}

function disableErrorEmail(email){
  console.log('disable');
  document.getElementById('emailgroup').style.paddingBottom = '15px';
  if(validateEmail(email)){

    document.getElementById('error_email').style.display="none";
    document.getElementById('email').style.color="#468847";
    document.getElementById('email').style.background="#DFF0D8";
    document.getElementById('email').style.border="1px solid #D6E9C6";
  }
  else{
    document.getElementById('error_email').style.display="none";
    document.getElementById('email').style.color="#B94A48";
    document.getElementById('email').style.background="#F2DEDE";
    document.getElementById('email').style.border="1px solid #EED3D7";
  }
  document.getElementById('error_email').style.display="none";
    
  
}

$(document).ready(function(){
  $('#email').keyup(function(){
    var email_error = '';
    var email = $('#email').val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
      url:"/php/insert/checkavailability/email",
      method:"POST",
      data:{email:email,_token:_token},
      success:function(result){
        if (result=='Duplicate'){
          enableErrorEmail(email);
          $('#submit').attr('disabled','disabled');
          // $('#submit').attr('disbaled','disabled');
        }
        else{
          disableErrorEmail(email);
          $('#submit').attr('disabled',false);
        }
      }
    });
  });
});

</script>

<!-- Script To Submit Form -->
<script>

function resetEmail(){
  document.getElementById('email').style.background="#FFFFFF";
  document.getElementById('email').style.border="none";
}

function redirectToLogin(){
  location.replace("/main");
}

$(document).ready(function(){
    $('#signupform').parsley();
    
    if($('#email').parsley().isValid()){
        // console.log('FUkya');
        setEmail = 1234;
    }

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
            resetEmail();
            redirectToLogin();
          }
        });
      }
    });
});

</script>


<body class="login-img3-body bodycolor">

  <div class="container"> 

    <form  id="signupform" class="login-form" style="margin-top: 3%">
    @csrf
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        <div id="emailgroup" class="input-group">
          <!-- <span class="input-group-addon"><i class="icon_mail"></i></span> -->
          <span style="color:black;font-size:16px;">Email:</span>
          <input  autocomplete="off" type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-type-message="Please Enter a Valid Email Address" />
        </div>
        <label id='error_email' name = 'error_email' style="font-size:12px;display:none;color:red;font-weight:500;"> Email Not Available, Try Something Else </label>
        
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
