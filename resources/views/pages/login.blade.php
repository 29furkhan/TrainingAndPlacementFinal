<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @if(isset(Auth::user()->email) && Auth::user()->user_type=='TPO')
    <script>
      window.location='/dashboard';
    </script>
  @elseif(isset(Auth::user()->email) && Auth::user()->user_type=='students')
    <script>
      window.location='/student';
    </script>
  @endif


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="images/favicon.png">

  <title>Login Page</title>

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
  <script type="text/javascript" src="{{URL::asset('/js/main.js')}}"></script>
  
  

</head>


<!--  Main Content Starts -->
<body class="login-img3-body">

  <div class="container">
    
    <form method='post' action='/php/insert/logincheck' class="login-form" id="loginform" style="margin-top: 6%">
    {{ csrf_field() }}

      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

      @if($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type='button' class="close" data-dismiss='alert'>x</button>
            {{ $message }}
        </div>
      @endif

      @if(count($errors) > 0)
      <div style="display: flex;
            flex-direction: column;
            align-items: flex-start;" class="alert alert-danger">
          @foreach($errors->all() as $error)
            <b style='font-weight:400;color:red'>{{ $error }}</b>
          @endforeach
          
        </div>
      @endif
      
      <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="email" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#" onclick="document.location.href='reset'"> Forgot Password?</a></span>
            </label>
        <input type='submit' id="loginbutton" class="btn btn-primary btn-lg btn-block" value='Login'/>

        <button class="btn btn-info btn-lg btn-block" type="button" onclick="document.location.href='signUp'">Sign Up</button>
      </div>
    </form>
  </div>


</body>

</html>