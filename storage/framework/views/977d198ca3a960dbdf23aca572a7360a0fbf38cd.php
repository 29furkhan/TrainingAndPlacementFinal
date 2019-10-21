<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

<style>

.errorbg{ 
  background: url('/images/warning.jpg') no-repeat center center fixed; 
  background-size: cover;
}
</style>
<script>
function goBack(){
	console.log('Inside');
	window.history.back();
}
</script>
<body class="errorbg">
<div style="border:5px solid red;margin-top:15%;" class="row">
	<div class="col-lg-2 col-md-2">
		<div>
		<i style="color:red;font-size:150px;"class="fa fa-ban" aria-hidden="true"></i>
		</div>
	</div>

	<div class="col-lg-10 col-md-10">
		<b style="color:red;font-size:50px;">Sorry, But You Are Not A Valid User To Access This Page</b>
	</div>
</div>

<div style="display:flex;justify-content:center;">
	<button style="margin-top:30px;" class="btn btn-primary" onclick="goBack()">Return To Previous Page</button>
</div>

</body>
</html>
<?php /**PATH C:\Furkhan\XAMPP\htdocs\TPO\resources\views/Pages/errorUserPage.blade.php ENDPATH**/ ?>