<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
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

    <form class="login-form" method="POST" action="php/send_mail.php">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="mail_to" placeholder="Enter Email" autofocus>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="hello();" >Reset</button>
      </div>
    </form>
  </div>

  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    
   function hello() {
      swal("Done!", "Email Send Successfully !", "success");
    };
  </script>

</body>

</html>
<?php /**PATH C:\Furkhan\XAMPP\htdocs\TPO\resources\views/pages/reset.blade.php ENDPATH**/ ?>