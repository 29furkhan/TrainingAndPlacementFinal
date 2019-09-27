
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>TPO Portal</title>


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
  <script type="text/javascript" src="<?php echo e(URL::asset('js/main.js')); ?>"></script>
  </head>

  <!-- Modal CSS -->
  <link href="css/modal.css" rel=" stylesheet">

<script>
$(document).ready(function(){
    $('#tempform').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:'/php/insert/temp',
            type:'GET',
            data:$(this).serialize(),
            success:function(data){
                alert(data + "Inserted Successfully");
            }
        });
    });
});
</script>
<body>
<form method="GET" name='tempform'>
<?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input id = 'email' name='email' type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input id="password" name="password" type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button id="submit" name='submit' type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html><?php /**PATH C:\Furkhan\XAMPP\htdocs\TPO\resources\views/temp.blade.php ENDPATH**/ ?>