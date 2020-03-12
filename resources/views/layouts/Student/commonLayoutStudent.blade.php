<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<?php
  $detect = new Mobile_Detect;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Student Portal</title>


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
  <link rel="shortcut icon" href="/images/elearning.ico" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <!-- Main.js -->
  <script type="text/javascript" src="{{URL::asset('js/main.js')}}"></script>
  </head>
  
  <!-- parsley.js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>

<body style = "background:#F0F0F0;overflow:auto;">
  <!-- container section start -->
  <section id="container" class="">
  

    <!-- Header Starts -->
    <header style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);border:2px solid #fff;" class="header common-header-bg">
        @yield('commonHeaderStudent')
    </header> 
    <!--header end-->

    <!-- Sidebar Starts -->
    <aside id="sidebarTPO" style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);display:block;">
      <div style="overflow:auto;background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);" id="sidebar" class="nav-collapse ">
        @yield('commonSidebarStudent')
      </div>
    </aside>
    <!-- sidebar menu end-->

    <!-- Main-Content -->
    <section id="main-content" style="margin-bottom:4%;margin-left:255px;margin-right:30px;">
        <section class="wrapper">
            <!--overview start-->
            @yield('mainContentStudent')
        </section>
    </section>
    <!-- Main-Content Ends -->

    <!-- Footer Starts -->
    <!-- Footer -->
<!-- <footer id="commonfooter" class="footer" style="margin-left:240px;height:9%;">
    <div style="display:flex;justify-content:center;">
        @yield('commonFooterTPO')
    </div>
</footer> -->
<!-- Footer Ends-->

<!-- Modal For Filters-->

<div style="height:100%;" class="modal right fade" id="studentfilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Filter Students</h4>
				</div>

				<div class="modal-body">
					
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
  <!-- Modal Ends -->


</section>    
</body>

</html>
