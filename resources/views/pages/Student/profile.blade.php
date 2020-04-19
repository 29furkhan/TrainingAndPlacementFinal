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


<?php
if(!isset( Auth::user()->email))
  echo"<script>window.location = '/main';</script>";

?>

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
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

<div class="row">
                <div class="col-lg-12" style="margin-top:85px;">
                </div>
</div>
<div class="col-lg-12" style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);color:white;margin-right: 20px;">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                @foreach($details as $ds)
                  <center><h4> {{$ds->FIRST_NAME}}  {{$ds->LAST_NAME}}</h4></center>
                  <div style="display:flex; flex-direction: column;align-items: center;">
                    <div class="follow-ava">
                      <img src="https://github.com/29furkhan/TrainingAndPlacementFinal/blob/master/user.png?raw=true" alt="" style="height:75px;border-radius: 50%;">
                    </div>

                  
                      <h5>Student</h5>
                  </div>
                </div>
                  <table style="border:0px;margin-left:20%;width:50%;white-space:nowrap;">
                  <tr>
                    <td><b>Name</b></td>
                    <td><b>:</b></td>
                    <td>{{$ds->FIRST_NAME}} {{$ds->MIDDLE_NAME}} {{$ds->LAST_NAME}}</td>
                  </tr>
                  <!-- <div style="display: flex;flex-direction: column;padding-left: 50px;padding-top:10px">
                  <p style="font-size:17px;"><b>Name:</b> {{$ds->FIRST_NAME}} {{$ds->MIDDLE_NAME}} {{$ds->LAST_NAME}}</p> -->
                  @endforeach
                  @foreach($academic as $ad) 
                  <tr>
                    <td><b>CASERP_ID</b></td>
                    <td><b>:</b></td>
                    <td>{{$ad->CASERP_ID}}</td>
                  </tr>
                  
                  <!-- <p style="font-size:17px;"><b>CASERP_ID:</b> {{$ad->CASERP_ID}}  </p> -->
                  @endforeach
                  @foreach($details as $ds)
                  <tr>
                    <td><b>Branch</b></td>
                    <td><b>:</b></td>
                    <td>{{$ds->BRANCH}}</td>
                  </tr>
                  
                  <tr>
                    <td><b>CLASS</b></td>
                    <td><b>:</b></td>
                    <td>{{$ds->CLASS}}</td>
                  </tr>
                  <!-- <p style="font-size:17px;"><b>Class:</b> {{$ds->CLASS}}</p>
                  <p style="font-size:17px;"><b>Branch:</b> {{$ds->BRANCH}}</p> -->
                  @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="row">
          <div class="col-lg-12" >
            <div class="panel">
              <div class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs" style="background: linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);">
                  <li>
                    <a data-toggle="tab" href="#profile" style="margin-right:0px;border-radius:0px;color: white;font-weight=600;" id="pr" onclick="Profile();">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile" style="border-radius:0px;margin-right:0px;color: white; font-weight=600;" id="ed" onclick="Edit();">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                  </li>
                </ul>
            </div>

                  <!-- profile -->
                  <div id="profile1" class="tab-pane">
                    <div class="">
                      <div class="panel-body bio-graph-info">
                        <!-- <h2>Bio Graph</h2> -->
                        <div style="margin-left:10px;" class="row">

                        @foreach($details as $ds)

                          <table style="white-space:nowrap;box-shadow: 0px 5px 5px 0px lightgrey;margin-right:20px;">
                          <tr >
                            <td  >
                            <b>First Name</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            <span id="fname" >{{$ds->FIRST_NAME}}</span>
                            </td>

                            <td>
                            <b>Last Name</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ds->LAST_NAME}} 
                            </td>


                          </tr>

                          </tr>
                          
                          <tr >
                            <td  >
                            <b>Class</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ds->CLASS}} 
                            </td>

                            <td>
                            <b>Branch</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ds->BRANCH}} 
                            </td>


                          </tr>
                          
                          <tr>
                            <td>
                            <b>CASERP_ID</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ds->CASERP_ID}} 
                            </td>

                            <td  >
                            <b>Email</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ds->Email}} 
                            </td>


                          </tr>
                          @endforeach
                          
                          @foreach($academic as $ad)
                          <tr>
                            <td>
                            <b>SSC (%)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ad->SSC}}
                            </td>

                            <td>
                            <b>HSC (%)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ad->HSC}}
                            </td>
                          </tr>

                          <tr>
                            <td>
                            <b>Polytechnic (%)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ad->Poly}}
                            </td>

                            <td>
                            <b>FE (CGPA)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ad->FE_CGPA}}
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <b>SE (CGPA)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ad->SE_CGPA}}
                            </td>

                            <td>
                            <b>TE (CGPA)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ad->TE_CGPA}}
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <b>FE (%)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ad->FE_PERCENT}}
                            </td>

                            <td>
                            <b>SE (%)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            
                            <td>
                            {{$ad->SE_PERCENT}}
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <b>TE (%)</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ad->TE_PERCENT}}
                            </td>
                            <td>
                            <b>Overall Gap</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$ad->Overall_Gap}}
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <b>PLACEMENT STATUS</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$placement_status[0]->placement_status}}
                            </td>
                          @if($placement_status[0]->placement_status == 'Placed' || $placement_status[0]->placement_status == 'Entrepreneur')
                            <td>
                            <b>Company Name</b>
                            </td>
                            <td>
                            <p>:</p> 
                            </td>
                            <td>
                            {{$placement_status[0]->company_name}}
                            </td>
                          @else
                            <td>
                            <b>&nbsp</b>
                            </td>
                            <td>
                            <p></p> 
                            </td>
                            <td>
                            &nbsp
                            </td>
                          @endif
                        </tr>
                        @endforeach
                        </table>
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
                    <div class="">
                      <div class="panel-body bio-graph-info">
                        <form id="editform" class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Student Id <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" value="{{$ds->CASERP_ID}}" class="form-control" id="s_id" name="s_id" placeholder=" " required data-parsley-pattern="^[S|s]{1}[0-9]{10}$" data-parsley-trigger="keyup" />
                              <div id="fn"></div>
                            </div>
                          </div>
                          @foreach($details as $ds)
                          <div class="form-group">
                            <label class="col-lg-2 control-label">First Name <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="first_name" name="first_name" value="{{$ds->FIRST_NAME}}" placeholder=" " required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" />
                              <div id="fn"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Middle Name<span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{$ds->MIDDLE_NAME}}" placeholder=" " required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
                              <div id="mn"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Last Name <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="last_name" name="last_name" value="{{$ds->LAST_NAME}}" placeholder=" " required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          @endforeach
                          @foreach($details as $ds)
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input type="email" class="form-control" id="email" name="email" value="{{$ds->Email}}"  placeholder=" " required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-type-message="Please Enter a Valid Email Address" />
                              <label id='error_email' name = 'error_email' style="font-size:12px;display:none;color:red;font-weight:500;"> Email Not Available, Try Something Else </label>
                            </div>
                          </div>
                          @endforeach
                          
                          <script>
                          function extractAndSetClasses(data){
                            $('#class').empty();
                            // $('#class').append(new Option('Select Class', 'select'));
                            // console.log()
                            // $('#class')[0][0].disabled = true;
                            data = JSON.parse(data);
                            // var select = document.getElementById("class");
                            var select = $("#class")[0];
                            // console.log(select);
                            // console.log(data[0]);
                              for(var i=0;i<data.length;i++){
                                console.log(data[i].class);
                                select.add(new Option(data[i].class, data[i].class));
                              }
                          }

                            function getClasses(){
                              selectedBranch = document.getElementById('branch').value;
                              console.log(selectedBranch);
                              $.ajax({
                                url : "/php/getclasses",
                                type: "POST",
                                data: {
                                "_token": "{{ csrf_token() }}",
                                "data": selectedBranch
                                },
                                success:function(data){
                                  // alert(data);
                                  extractAndSetClasses(data);
                                }
                              });
                            }
                          </script>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Branch <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                            <select value="{{$ds->BRANCH}}" class="form-control" name="branch" id="branch" onblur="getClasses();" onclick="getClasses();">
                                      @foreach($details as $ds)
                                        @if($ds->BRANCH!='Null')
                                        <option value="{{$ds->BRANCH}}" selected>{{$ds->BRANCH}}</option>
                                        @else
                                        <option value="{{$ds->BRANCH}}" selected disabled>{{$ds->BRANCH}}</option>
                                        @endif
                                      @endforeach
                                      @foreach($branch as $br)
                                          @if($br->branch != $details[0]->BRANCH)
                                          <option value="{{$br->branch}}">{{$br->branch}}</option>
                                          @endif
                                      @endforeach
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Class <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                            <select class="form-control" name="class" id="class" >
                                    @foreach($details as $ds)
                                        <option value="{{$ds->CLASS}}" selected>{{$ds->CLASS}}</option>
                                    @endforeach
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">SSC Percentage <span style="color:red;">*</span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->SSC}}" type="text" class="form-control" style="width:50%;" id="ssc" name="ssc" placeholder=" " required data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup"/>
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
                            <select class="form-control" name="check" id="check" onblur="hello();" onclick="hello();">
                                  <option value="Select" selected disabled>Select option  </option>
                                  <option value="Yes" >Yes </option>
                                  <option value="No" >No  </option>
                            </select>
                          </div>
                          </div>
                          <div class="form-group" id="hsc1">
                          <label class="col-lg-2 control-label">HSC Percentage </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->HSC}}" type="text" class="form-control" style="width:50%;" id="hsc" name="hsc" placeholder=" "  data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          <div class="form-group" id="diploma1">
                          <label class="col-lg-2 control-label">Diploma Percentage </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->SSC}}" type="text" class="form-control" style="width:50%;" id="diploma" name="diploma" placeholder=" "  data-parsley-pattern="^[0-9]{1,3}.[0-9]{0,3}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          <div class="form-group"id="FE_CGPA">
                          <label class="col-lg-2 control-label">FE CGPA </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->FE_CGPA}}" type="text" class="form-control" style="width:50%;" id="fe_cgpa" name="fe_cgpa" placeholder=" "  data-parsley-pattern="^[0-9]{0,2}.[0-9]{0,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">SE CGPA </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->SE_CGPA}}" type="text" class="form-control" style="width:50%;" id="se_cgpa" name="se_cgpa" placeholder=" "  data-parsley-pattern="^[0-9]{0,2}.[0-9]{0,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">TE CGPA </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->TE_CGPA}}" type="text" class="form-control" style="width:50%;" id="te_cgpa" name="te_cgpa" placeholder=" "  data-parsley-pattern="^[0-9]{0,2}.[0-9]{0,2}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group" id="FE_PERCENT">
                          <label class="col-lg-2 control-label">FE Percentage </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->FE_PERCENT}}" type="text" class="form-control" style="width:50%;" id="fe_percent" name="fe_percent" placeholder=" "  data-parsley-pattern="^[0-9]{1,3}.[0-9]{0,3}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">SE Percentage </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->SE_PERCENT}}" type="text" class="form-control" style="width:50%;" id="se_percent" name="se_percent" placeholder=" "  data-parsley-pattern="^[0-9]{1,3}.[0-9]{0,3}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>                          
                          <div class="form-group">
                          <label class="col-lg-2 control-label">TE Percentage </span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->TE_PERCENT}}" type="text" class="form-control" style="width:50%;" id="te_percent" name="te_percent" placeholder=" "  data-parsley-pattern="^[0-9]{1,3}.[0-9]{0,3}$" data-parsley-trigger="keyup"/>
                            </div>
                          </div>
                          <div class="form-group">
                          <label class="col-lg-2 control-label">Overall Gap</span></label>
                            <div class="col-lg-6">
                              <input value="{{$ad->Overall_Gap}}" type="text" class="form-control" style="width:50%;" id="overall_gap" name="overall_gap" placeholder=" "  data-parsley-pattern="^[0-9]$" data-parsley-trigger="keyup"/>
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
            // alert("success");
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