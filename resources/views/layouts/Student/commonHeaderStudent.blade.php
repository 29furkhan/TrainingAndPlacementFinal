@extends('layouts.commonLayoutStudent')
@include('layouts.commonSidebarStudent')
@include('layouts.commonFooterStudent')
@section('commonHeaderStudent')

<script>
    var flag = 0;
    function changeSidebarState(){
        if(flag==0){
            document.getElementById('sidebarTPO').style.display="none";
            //document.getElementById('commonfooter').style.marginLeft="0px";
            document.getElementById('main-content').style.marginLeft="25px";
        }
        else if (flag==1)
        {
            // console.log("I am Executed");
            document.getElementById('sidebarTPO').style.display="block";
           // document.getElementById('commonfooter').style.marginLeft="250px";
            document.getElementById('main-content').style.marginLeft="255px";

        }
        flag=!flag;
    }
</script>


<!-- Nav Bars -->
<div style="float:left;padding-right:20px;">
        <a id="sidebarCollapse" onclick="changeSidebarState();" data-toggle="collapse"><i style="color:white;font-size:33px;" onMouseOver="this.style.color='lightgrey'" onMouseOut="this.style.color='white'" class="fa fa-bars"></i></a>
</div>
    <!-- Nav Bars End -->

    <!-- Label for Portal -->
    <div>
        <div style="display:flex;justify-content:space-between;">    
            <!-- Label for Portal End -->
            <div class="logo">Student Portal</div>
        
            <!-- Search Box Start -->
            <div id="searchdiv" class="" style="display:none;padding-left:20px;float:left;">
                <div class="wrap">
                    <div class="search" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;">
                        <input style="border-radius:5px 0 0 5px;" onkeyup="searchContent('searchinput','exportstudentstable')" id="searchinput" type="text"   class="searchTerm"   placeholder="Search Student By Name or CASERP ID">
                        <span class="fa fa-search" style="background:white;cursor:pointer;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);">
                            <!-- <i class="fa fa-search" style="background:white;cursor:pointer;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);"></i> -->
                        </span>
                    </div>
                </div>
            </div>
            <!-- Search Box End -->

            <!-- Profile Icon Start -->

            <div class="dropdown" style='float:right;'>
                <!-- user login dropdown start-->
                <a data-toggle="dropdown" style="cursor:pointer;text-decoration:none;" id="profile" class="" >
                    <span class="profile-ava">
                        <img alt="" style="height:33px;border-radius:50%;" src="images/profile-widget-avatar.jpg">
                    </span>
                    <span class="username" style="color:white;font-size:14px;">Jenifer Smith</span>
                    <b class="caret"></b>
                </a>

                <ul class="dropdown-menu pull-right" class="log-arrow-up"> 
                        <br>
                        <li><a href="#"><i class="fa fa-user" style="font-size:20px;"></i>&nbsp&nbsp&nbspMy Profile</a></li>
                        <br>
                        <li><a href="#"><i class="fa fa-cog" style="font-size:20px;"></i>&nbsp&nbsp&nbspSettings</a></li>
                        <br>
                        <li><a href="#"><i class="fa fa-sign-out" style="font-size:20px;"></i>&nbsp&nbsp&nbspLog Out</a></li>
                        <br>
                        
                </ul>
            </div>
        </div>

            <!-- Profile Icon End -->
            
@endsection