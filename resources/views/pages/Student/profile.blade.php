<?php
session_start();
// $myemail="";
// $myemail=$_SESSION["myemail"];

 if(isset($_SESSION["myemail"])==false)
 {
   header("Location: /login");
 }
?>

@extends('layouts.commonHeaderStudent')

@section('getUsername')
    @if(isset( Auth::user()->email))
        <a data-toggle="dropdown" style="cursor:pointer;text-decoration:none;" id="profile" class="" >
            <span class="profile-ava">
                <img alt="" style="height:33px;border-radius:50%;" src="images/user.png">
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
                <div class="col-lg-12" style="margin-top:85px;">
                </div>
</div>
<div class="col-lg-12" style="background-color: powderblue;margin-right: 20px;">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                @foreach($details as $ds)
                  <h4> {{$ds->FIRST_NAME}}  {{$ds->LAST_NAME}}</h4>
                
                  <div class="follow-ava">
                    <img src="images/profile-widget-avatar.jpg" alt="" style="border-radius: 50%;">
                  </div>
                  <h6>       Student</h6>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p>Name: {{$ds->FIRST_NAME}} {{$ds->MIDDLE_NAME}} {{$ds->LAST_NAME}}</p>
                  @endforeach
                  @foreach($academic as $ad) 
                  <p>CAS_ID: {{$ad->CASERP_ID}}  </p>
                  @endforeach
                  @foreach($details as $ds)
                  <p>Class: {{$ds->CLASS}}</p>
                  <p>Branch: {{$ds->BRANCH}}</p>
                  @endforeach
                  <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>NY</span>
                                </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="row">
          <div class="col-lg-12" >
            <div class="panel">
              <div class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs" style="background-color: rgb(100,179,231);">
                  <li>
                    <a data-toggle="tab" href="#profile" style="color: white;font-weight=600;" id="pr" onclick="Profile();">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile" style="color: white; font-weight=600;" id="ed" onclick="Edit();">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                  </li>
                </ul>
            </div>

                  <!-- profile -->
                  <div id="profile1" class="tab-pane">
                    <div class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Bio Graph</h1>
                        <div class="row">

                        @foreach($details as $ds)
                          <div class="bio-row">
                            <p><span>First Name :</span><span id="fname" >{{$ds->FIRST_NAME}}</span> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Last Name :</span><span id="fname" >{{$ds->LAST_NAME}}</span></p>
                          </div>
                          
                          <div class="bio-row">
                            <p><span>Class:</span>{{$ds->CLASS}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Branch : </span>{{$ds->BRANCH}}</p>
                          </div>
                          @endforeach
                          <div class="bio-row">
                            <p><span>Country :</span>India</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span><span id="Email_p" ></span></p>
                          </div>
                          @foreach($academic as $ad)
                          <div class="bio-row">
                            <p><span>SSC : </span>{{$ad->SSC}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>HSC :</span>{{$ad->HSC}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Poly :</span>{{$ad->Poly}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>FE CGPA :</span>{{$ad->FE_CGPA}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>SE CGPA :</span>{{$ad->SE_CGPA}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>TE CGPA :</span>{{$ad->TE_CGPA}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>FE Percent :</span>{{$ad->FE_PERCENT}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>SE Percent :</span>{{$ad->SE_PERCENT}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>TE Percent : </span>{{$ad->TE_PERCENT}}</p>
                          </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="row">
                      </div>
                    </div>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <div class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form id="editform" class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Student Id <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="s_id" name="s_id" placeholder=" " required data-parsley-pattern="^[S|s]{1}[0-9]{10}$" data-parsley-trigger="keyup" />
                              <div id="fn"></div>
                            </div>
                          </div>
                          @foreach($details as $ds)
                          <div class="form-group">
                            <label class="col-lg-2 control-label">First Name <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="first_name" name="first_name" value="{{$ds->FIRST_NAME}}" placeholder=" " required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" />
                              <div id="fn"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Middle Name<span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{$ds->MIDDLE_NAME}}" placeholder=" " required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup"/>
                              <div id="mn"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Last Name <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="last_name" name="last_name" value="{{$ds->LAST_NAME}}" placeholder=" " required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          @endforeach
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="email" class="form-control" id="email" name="email" placeholder=" " required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-type-message="Please Enter a Valid Email Address" />
                              <label id='error_email' name = 'error_email' style="font-size:12px;display:none;color:red;font-weight:500;"> Email Not Available, Try Something Else </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Class <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                            <select class="form-control" name="class" id="class" >
                                  <option value="Select" selected disabled>Select Class  </option>
                                  <option value="BECSE-I">BECSE-I </option>
                                  <option value="BECSE-II">BECSE-II  </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Branch <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                            <select class="form-control" name="branch" id="branch">
                                  <option value="Select" selected disabled>Select Branch  </option>
                                              @foreach($branch as $br)
            <option value="{{$br->branch}}">{{$br->branch}}</option>
            @endforeach
                                  <!-- <option value="Computer Science And Engineering">Computer Science And Engineering </option>
                                  <option value="Information Technology">Information Technology  </option>
                                  <option value="Civil Engineering">Civil Engineering  </option>
                                  <option value="Mechanical Engineering">Mechanical Engineering  </option> -->
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">SSC Percentage <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="ssc" name="ssc" placeholder=" " required data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup"/>
                            </div>                       
                          </div>
                          <!-- <div class="form-group">
                          <label class="col-lg-2 control-label">Have You Completed HSC ? </span></label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RadioButton" id="rbutton1" value="SSC" onclick="hello();" checked>
                            <label class="form-check-label" for="RadioButton1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RadioButton" id="rbutton2" value="HSC"  onclick="hello();">
                            <label class="form-check-label" for="RadioButton1">No</label>
                          </div>
                          </div> -->
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Have You Completed HSC ? <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                            <select class="form-control" name="check" id="check" onclick="hello();">
                                  <option value="Select" selected disabled>Select option  </option>
                                  <option value="Yes" >Yes </option>
                                  <option value="No" >No  </option>
                            </select>
                          </div>
                          </div>
                          <div class="form-group" id="hsc1">
                          <label class="col-lg-2 control-label">HSC Percentage </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="hsc" name="hsc" placeholder=" "  data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          <div class="form-group" id="diploma1">
                          <label class="col-lg-2 control-label">Diploma Percentage </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="diploma" name="diploma" placeholder=" "  data-parsley-pattern="^[0-9]{2}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          <div class="form-group"id="FE_CGPA">
                          <label class="col-lg-2 control-label">FE CGPA </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="fe_cgpa" name="fe_cgpa" placeholder=" "  data-parsley-pattern="^[0-9]{1}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">SE CGPA </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="se_cgpa" name="se_cgpa" placeholder=" "  data-parsley-pattern="^[0-9]{1}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">TE CGPA </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="te_cgpa" name="te_cgpa" placeholder=" "  data-parsley-pattern="^[0-9]{1}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group" id="FE_PERCENT">
                          <label class="col-lg-2 control-label">FE Percentage </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="fe_percent" name="fe_percent" placeholder=" "  data-parsley-pattern="^[0-9]{2}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">SE Percentage </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="se_percent" name="se_percent" placeholder=" "  data-parsley-pattern="^[0-9]{2}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">TE Percentage </span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" style="width:50%;" id="te_percent" name="te_percent" placeholder=" "  data-parsley-pattern="^[0-9]{2}.[0-9]{1,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" id="submit" name='submit' class="btn btn-primary" value="Submit">Submit</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
 
<!-- Email Availability -->
<script>
 mail_p="<?php echo $myemail ?>";
  //console.log(mail_p);
  document.getElementById('email').value=mail_p;
  document.getElementById('Email_p').innerHTML=mail_p;
    document.getElementById('hsc1').style.display="none";
    document.getElementById('diploma1').style.display="none"; 


function hello(){
  var x = document.getElementById("check").value;
  if( x=="Yes")
  {
    console.log("Yes checked");
    document.getElementById('hsc1').style.display="block";
    document.getElementById('diploma1').style.display="none";
    document.getElementById('FE_CGPA').style.display="block";
    document.getElementById('FE_PERCENT').style.display="block";
  }
 else if(x=="No")
  {
    console.log("No checked");
    document.getElementById('diploma1').style.display="block"; 
    document.getElementById('hsc1').style.display="none";
    document.getElementById('FE_CGPA').style.display="none";
    document.getElementById('FE_PERCENT').style.display="none";
  }
  else{
    document.getElementById('hsc1').style.display="none";
    document.getElementById('diploma1').style.display="none"; 
  }

}
function validateEmail(email) {
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,3})+$/;
  return re.test(email);
}

function enableErrorEmail(email){
  console.log("inside Error");
  //document.getElementById('emailgroup').style.paddingBottom = '0px';
  document.getElementById('error_email').style.display="block";
  // document.getElementById('fname').innerHTML=email;
  document.getElementById('email').style.color="#B94A48";
  document.getElementById('email').style.background="#F2DEDE";
  document.getElementById('email').style.border="1px solid #EED3D7";
}

function disableErrorEmail(email){
  document.getElementById('error_email').style.display="none";
  console.log('disable');
  document.getElementById('emailgroup').style.paddingBottom = '15px';
  if(validateEmail(email)){

  
    document.getElementById('email').style.color="#468847";
    document.getElementById('email').style.background="#DFF0D8";
    document.getElementById('email').style.border="1px solid #D6E9C6";
  }
  else{
    document.getElementById('error_email').style.display="none";
    document.getElementById('email').style.color="#B94A48";
    document.getElementById('email').style.background="#F2DEDE";
    document.getElementById('email').style.border="1px solid #EED3D7";
  }
  document.getElementById('error_email').style.display="none";
    
  
}

$(document).ready(function(){
  $('#email').keyup(function(){
    var email_error = '';
    var email = $('#email').val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
      url:"/php/insert/checkavailabilityProfile/email",
      method:"POST",
      data:{email:email,_token:_token},
      success:function(result){
        // console.log(email);
        //result='Duplicate';
        if (result=='Duplicate'){
          enableErrorEmail(email);
          $('#submit').attr('disabled','disabled');
          // $('#submit').attr('disbaled','disabled');
        }
        else{
          disableErrorEmail(email);
          $('#submit').attr('disabled',false);
        }
      }
    });
  });
});

</script>


<!-- To Save Details -->
<script>

document.getElementById("profile1").style.display="block";
document.getElementById("edit-profile").style.display="none";


  function Profile()
  {
    document.getElementById("profile1").style.display="block";
    document.getElementById("pr").style.color="black";
    document.getElementById("ed").style.color="white";
    document.getElementById("edit-profile").style.display="none";
  }
  function Edit()
  {
    document.getElementById("edit-profile").style.display="block";
    document.getElementById("ed").style.color="black";
    document.getElementById("pr").style.color="white";
    document.getElementById("profile1").style.display="none";
  }

  function redirectToProfile(){
  location.replace("/profile");
}

  $(document).ready(function(){
    $('#editform').parsley();
  
  $('#editform').on('submit',function(event){
    console.log("hello");
    event.preventDefault();
      if($('#editform').parsley().isValid()){
        console.log("prashant");
        $.ajax({
          url:"/php/insert/profile",
          method:"GET",
          data:$(this).serialize(),
          dataType:"json",
          beforeSend:function(){
            $('#submit').attr('disabled','disabled');
            // $('#submit').val('Creating Your Account...','');
          },
          success:function(data){
            $('#editform')[0].reset();
            $('#editform').parsley().reset();
            $('#submit').attr('disabled',false);
            $('#submit').val('Submit');
            alert(data.success);
            // resetEmail();
            redirectToProfile();
          }
        });
      }
    });
});

</script>

  <!-- parsley.js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>

@endsection