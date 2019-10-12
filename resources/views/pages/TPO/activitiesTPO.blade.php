@extends('layouts.TPO.commonHeaderTPO')

<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>

<script>
  var globalstatus = 0;
  var globalsearchactive = 0;
</script>

@if(isset(Auth::user()->email) && Auth::user()->user_type=='students')
    <script>
      window.location='/errorUserPage';
    </script>
@elseif(!isset(Auth::user()->email))
    <script>
      window.location='/main';
    </script>
@endif

@section('mainContentTPO')
<div class="row">
                <div class="col-lg-12" style="margin-top:65px;">
                    <h3 class="page-header" style="opacity:0.2;">
                        <i style="font-size:30px;" class="fa fa-user"></i>
                        &nbsp&nbspStudents
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;outline:none;" href="/dashboard">
                            &nbspHome</a>
                        </li>

                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-user"></i>
                            &nbsp
                            <b style="font-weight:500;">Activities</b>
                        </li>
                    </ul>
                </div>
</div>
<hr>
<script>
    function getURL(){
        location.href = document.getElementById('paymenturl').value;
    }
</script>
<!-- <img src='/images/offline.png'/> -->
<input id='paymenturl' class="form-control" style="width:50%;"type="text"/><br>
<div class='pm-button'><a href='https://www.payumoney.com/sandbox/paybypayumoney/#/322EDF12A6222ED2A8A05FAFEA02DFBA'><img src='https://www.payumoney.com/media/images/payby_payumoney/new_buttons/21.png' /></a></div> 
@endsection