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
                        <i style="font-size:30px;" class="fa fa-tachometer"></i>
                        &nbsp&nbspActivities
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;outline:none;" href="/dashboard">
                            &nbspHome</a>
                        </li>
                        
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-tachometer"></i>
                            &nbsp
                            <b style="font-weight:500;">Activities</b>
                        </li>
                    </ul>
                </div>
</div>
<br>
@if($activities)
    @foreach($activities as $as)
        <div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
            <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
                <div class="card-body">
                    <div class="card-title">
                        <b style="font-size:16px;">{{$as->Activity_Name}}</b>
                    </div>
                    <!-- Description -->
                    <div style="text-align:justify;">
                        {{$as->Activity_Description}}
                    </div>
                    <div style="margin-top:10px;">
                        <b>FEE:&nbsp{{$as->Activity_Fee}} &#x20b9</b>
                    </div>
                    <br>
                    <!-- Export Button -->
                    <form method="GET" action="/activityStudent/storeData" style="width:50%;" class="form-group">
                        {{ csrf_field() }}
                        <input style="display:none;"  value="{{Auth::user()->email}}" type="text" name="caserp_id" class="form-control"/>
                        <input style="display:none;"  value="{{$as->Activity_ID}}" type="text" name="activity_id" class="form-control"/>
                        <input style="display:none;"  value="{{$as->Activity_Fee}}" type="number" name="amount" class="form-control"/>
                        <div>
                            <button type="submit" data-toggle="tooltip" title="Delete Activity!" style="border-radius:0;margin-right:20px;"  class="btn btn-primary">
                                PAY
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <br>
    @endforeach
@else
    <div class="alert alert-danger" id="NoDataFound">
        <div id="" style="font-size:20px;color:rgb(100,179,231);font-weight:600%;">
            Sorry!!No Current Acitivities
        </div>
    </div>
@endif


@endsection