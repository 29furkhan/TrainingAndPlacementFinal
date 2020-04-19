<!-- Code For Counselling Portal Of Student Created By Prashant -->
<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>

<?php
  $detect = new Mobile_Detect;
?>

@if($detect->isMobile())
    <script>
      window.location='/notAllowedDevice';
    </script>
@elseif(isset(Auth::user()->email) && Auth::user()->user_type=='TPO')
    <script>
      window.location='/errorUserPage';
    </script>
@elseif(!isset(Auth::user()->email))
    <script>
      window.location='/main';
    </script>
@endif

@extends('layouts.Student.commonHeaderStudent')

@section('getUsername')
    @if(isset( Auth::user()->email))
        <a data-toggle="dropdown" style="cursor:pointer;text-decoration:none;" id="profile" class="" >
            <span class="profile-ava">
                <img alt="" style="height:33px;border-radius:50%;" src="https://github.com/29furkhan/TrainingAndPlacementFinal/blob/master/user.png?raw=true">
            </span>
            <span class="username" style="color:white;font-size:14px;">
            {{ Auth::user()->name }}
            </span>
            <b class="caret"></b>
        </a>
    @else
        <script>window.location = "/main";</script>
   @endif

@endsection

@section('logoutSection')
<li><a href="/php/logout"><i class="fa fa-sign-out" style="font-size:20px;"></i>&nbsp&nbsp&nbspLog Out</a></li>
@endsection                       


@section('mainContentStudent')
<div class="row">
                <div class="col-lg-12" style="margin-top:65px;">
                    <h3 class="page-header" style="opacity:0.2;">
                        <i style="font-size:30px;" class="fa fa-users"></i>
                        &nbsp&nbspCounselling
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;outline:none;" href="/Counselling">
                            &nbspHome</a>
                        </li>
                        
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-users"></i>
                            &nbsp
                            <b style="font-weight:500;">Counselling</b>
                        </li>
                    </ul>
                </div>
</div>
<!-- <div class="row">
<div class="col-lg-12" style="margin-top:65px;">
<iframe width="420" height="315"
src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
</div>
</div> -->
<div class="container">
<div class="row">
@foreach($counselling as $cn)
<div class="card col-md-5" style="
    margin-right: 5%;
    margin-bottom: 2%; box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;display:block;flex-wrap:wrap;
">
  <div class="card-body">
  <div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" src="{{$cn->Link}}" allowfullscreen></iframe>
</div>
    <h5 class="card-title"><b>{{$cn->Title}}</b></h5>
    
</div>
</div>

<!-- <div class="card col-sm-5"style="
    margin-right: 5%;
    margin-bottom: 2%;
" >
  <div class="card-body">
  <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen></iframe>
</div>
    <h5 class="card-title">Card title</h5>
</div>
</div>
<div class="card col-sm-5" style="
    margin-right: 5%;
    margin-bottom: 2%;
">
  <div class="card-body">
  <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen></iframe>
</div>
    <h5 class="card-title">Card title</h5>
</div>
</div> -->
@endforeach
</div>
</div> 
@endsection

