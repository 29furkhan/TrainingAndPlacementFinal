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
  background: url('/images/underconstruction.jpg') no-repeat center center fixed; 
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
    <div class="col-lg-10 col-md-10">
		<b style="color:red;font-size:50px;"></b>
	</div>
<!-- </div> -->

<div style="display:flex;justify-content:center;">
	<button style="margin-top:30px;" class="btn btn-primary" onclick="goBack()">Return To Previous Page</button>
</div>

</body>
</html>
<?php /**PATH /storage/ssd4/929/11957929/resources/views/pages/underConstructionPage.blade.php ENDPATH**/ ?>