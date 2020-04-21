
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

<?php
  $detect = new Mobile_Detect;
?>

@if($detect->isMobile())
    <script>
      window.location='/notAllowedDevice';
    </script>
@elseif(isset(Auth::user()->email) && Auth::user()->user_type=='students')
    <script>
      window.location='/errorUserPage';
    </script>
@elseif(!isset(Auth::user()->email))
    <script>
      window.location='/main';
    </script>
@endif

@section('mainContentTPO')
<!-- Modal for Create New Activity -->
<div class="modal fade"  id="createModal" tabindex="-1" role="dialog" aria-labelledby="create " aria-hidden="true">
  <div class="modal-dialog" style="overflow-y: initial !important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">CREATE NEW ACTIVITY</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="create_activity_form" name="create_activity_form" action="" method="GET">
        <div class="modal-body" style="height: 250px;overflow-y: auto;" >
                <div style="margin-bottom:20px;">
                <b> ACTIVITY ID </b>
                <input  name='activity_id_text' id='activity_id_text' class="form-control" value="<?php echo uniqid();?>" readonly required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> ACTIVITY NAME </b>
                <input placeholder="Enter the Activity Name" name='activity_name_text' id='activity_name_text' class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                  <b>ALLOWED CLASSES(<label style="color:red;font-weight:300;">*</label>)</b><br>
                  
                  <select id="selectData" name="selectData[]" style="width:100%;border-color:#8e8e93;" multiple="multiple">
                    @foreach($classes as $cs)
                    <option value="{{$cs->class}}">{{$cs->class}}</option>
                    @endforeach	
                  </select>
                </div>

                <div style="margin-bottom:20px;">
                <b> ORGANIZATION </b>
                <input placeholder="Enter the Organization Name" name='activity_organisation_text' id='activity_organisation_text' class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> DATE</b>
                <input placeholder="Enter the Date" name='activity_date_text' id='activity_date_text' class="form-control" type="date" required/>
                </div>


                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 800 Characters</label>) </b><br>
                <textarea type="textarea" name='description' id='description' rows="6" maxlength="700" class="form-control" required="required">
                </textarea>
                <label id="descriptionerror" style="display:none;color:red;font-weight:300;">*Description Required</label>
                </div>

                <div style="margin-bottom:20px;">
                <b> FEE </b>
                <input placeholder="Enter Fee in Integer" name="fee" id='fee' class="form-control" type="number" min='0' required/>
                </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-- End of Create Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="create " aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">EDIT ACTIVITY</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit = "return validateEdit();" action="/php/edit/activity" method="GET">
        <div class="modal-body" style="height: 250px;overflow-y: auto;">
                <div style="margin-bottom:20px;">
                <b> ACTIVITY ID </b>
                <input id="modal_activity_id" name='modal_activity_id' class="form-control" readonly required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> ACTIVITY NAME </b>
                <input id="modal_activity_name" placeholder="Enter the Activity Name" name='modal_activity_name'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 800 Characters</label>) </b><br>
                <textarea id="modal_activity_desc" type="textarea" name='modal_activity_desc' rows="6" maxlength="700" class="form-control" required="required">
                </textarea>
                <label id="modal_activity_desc_err" style="display:none;color:red;font-weight:300;">*Description Required</label>
                </div>

                <div style="margin-bottom:20px;">
                <b> FEE </b>
                <input id="modal_activity_fee" placeholder="Enter Fee in Integer" name="modal_activity_fee"  class="form-control" type="number" required/>
                </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </form>
    </div>
  </div>
</div>


<div class="row">
                <div class="col-lg-12" style="margin-top:65px;">
                    <h3 class="page-header" style="opacity:0.2;">
                        <i style="font-size:30px;" class="fa fa-graduation-cap"></i>
                        &nbsp&nbspActivities
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;" href="/dashboard">
                            &nbspHome</a>
                        </li>

                        
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-graduation-cap"></i>
                            &nbsp
                            <b style="font-weight:500;">Activities</b>
                        </li>


                    </ul>
                </div>
</div>

<div class="row">
  <div class="col-md-3">
    <button data-target="#createModal" data-toggle="modal" title="Create a Fresh Activity" style="border-radius:0;"class='btn btn-primary'>
      CREATE
    </button>
  </div>
  <div class="col-md-9">
    <div class="row" style="justify-content:flex-end;margin-right:3px;">
        <div id="searchcompany" class="col-lg-4 col-sm-4 col-md-4">
            <div class="">
              <div class="search" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;">
                <input id="activitySearch" onkeyup="searchActivity(id);" style="border-radius:5px 0 0 5px;" type="text"   class="searchTerm"   placeholder="Search By Company Name">
                  <a href="javascript:void(0);" id="btnToSearchActivity" class="fa fa-search" style="background:white;cursor:pointer;text-decoration:none;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);">
                  </a>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>



<!-- CARDS -->
@foreach($activities as $as)
<div id="{{$as->Activity_ID}}Main" style="">
  <hr class="" style="border:1px solid black;"><!-- <br><br> -->
  <div style="display:flex;width:45%;justify-content:space-between;flex-wrap:wrap;">
                  <div>
                      <form action='/php/activity/download'>
                          <input type="text" id="activity_id" name="activity_id" value="{{$as->Activity_ID}}" style="display:none;"/>
                          <button type="submit" id="exportactivity{{$as->Activity_ID}}" data-toggle="tooltip" title="Download Excel Sheet!" style="border-radius:0;"  class="dwnld btn btn-primary">
                              Download<i style="margin-left:15px;font-size:17px;" class="fa fa-download"> </i>
                          </button>
                      </form>
                  </div>
                  <div>
                      <button type="button"  id="editActivityBtn{{$as->Activity_ID}}" title="Edit the Activity!" style="border-radius:0;" class="edt btn btn-primary">
                          Edit Activity<i style="margin-left:15px;font-size:17px;" class="fa fa-pencil"> </i>
                      </button>
                  </div>
                  <div>
                      <button id="deleteActivityBtn{{$as->Activity_ID}}" type="button" data-toggle="modal" title="Delete Activity!" style="border-radius:0;"  class="dlt btn btn-primary">
                        Delete Activity<i style="margin-left:15px;font-size:17px;" class="fa fa-trash"> </i>
                      </button>
                  </div>
  </div>
 

    <div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
        <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
            <div class="card-body">
              <table style="text-transform:uppercase;border-collapse: collapse;border-spacing: 0;width: 100%;border: 2px solid black;" id="table_activity" class="table table-hover table-striped table.active justify-content: space-evenly;" data-name="activitytable" >
                    <tbody style="text-align:center;">
                      <tr>
                          <td style="display:none;">{{$as->Activity_ID}}</td>
                          <td style="text-align:left;border: 2px solid black;"><b>Activity</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;">{{$as->Activity_Name}}</td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Classes</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;">{{$as->Classes}}</td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Description</b></td>
                          <td style="text-align:justify;border: 2px solid black;jus">{{$as->Activity_Description}}</td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Organization</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;">{{$as->Organization}}</td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Date</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;">{{$as->Period}}</td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Fee</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;">{{$as->Activity_Fee}}</td>
                      </tr>
                    </tbody>
              </table>
            </div><!-- End of Card Body-->
        </div><!-- End of card-->
    </div><!-- End of maincards-->
  <!-- <hr class="" style="border:1px solid black;"> -->
</div>
@endforeach

<!-- Modal for Confirmation -->
<div class="modal fade" id="confirmmodal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
        <h4>Warning!!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <b style="font-size:16px;color:rgb(100,179,231);">Are You Sure You Want To Delete This Activity?</b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button onclick="setDeleteFlag();" id="deleteActivityBtn" type="button" class="btn btn-primary" >Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
var deleteFlag=0;
var btnid;
var activity_id;

function setDeleteFlag(){
    deleteFlag=1;
    moveFurther();
}

function moveFurther(){
    $.ajax({
        url:'/php/activity/delete',
        data:{'activity_id':activity_id},
        success:function(data){
            alert(data);
            location.reload();
        }   
    });
}

$('#confirmmodal').on('hidden.bs.modal', function () {
  deleteFlag = 0;
})

function setter(activity_name,activity_desc,activity_fee){
    document.getElementById('modal_activity_name').value = activity_name;
    document.getElementById('modal_activity_desc').value = activity_desc;
    document.getElementById('modal_activity_fee').value  = activity_fee;
}

$(document).on("click", ".edt", function() {
    btnid = $(this).attr("id");
    activity_id = btnid.substr(15);
    var activity_desc,activity_fee,activity_name;
    // Get Rest of The Data
    $.ajax({
        url:'/php/activity/edit/get',
        data:{'activity_id':activity_id},
        success:function(data){
            // console.log(data.data[0].Activity_Fee);
            activity_name = data.data[0].Activity_Name;
            activity_desc = data.data[0].Activity_Description;
            activity_fee  = data.data[0].Activity_Fee;
            setter(activity_name,activity_desc,activity_fee);
        }  
    });
    document.getElementById('modal_activity_id').value = activity_id;
    $("#editModal").modal();
    // movefurther();
});


$(document).on("click", ".dlt", function() {
    btnid = $(this).attr("id");
    activity_id = btnid.substr(17);
    $("#confirmmodal").modal();
    // movefurther();
});

</script>
<script>
function validate(){
    var data = $('#description').val();
    data = data.trim();
    if(data!=""){
        // alert(data.length);
        if(data.length>700)
        {
            document.getElementById('descriptionerror').innerHTML="*Data Too Long";
            document.getElementById('descriptionerror').style.display="block";
            return false;
        }
        return true;
    }
    else{
        document.getElementById('descriptionerror').innerHTML="*Description Required";
        document.getElementById('descriptionerror').style.display="block";
        return false;
    }
    
}

function validateEdit(){
    var data = $('#modal_activity_desc').val();
    data = data.trim();
    // alert(data);
    if(data!=""){
        // alert(data.length);
        if(data.length>700)
        {
            document.getElementById('modal_activity_desc_err').innerHTML="*Data Too Long";
            document.getElementById('modal_activity_desc_err').style.display="block";
            return false;
        }
        return true;
    }
    else{
        document.getElementById('modal_activity_desc_err').innerHTML="*Description Required";
        document.getElementById('modal_activity_desc_err').style.display="block";
        return false;
    }
    
}

</script>
<script type="text/javascript">
 	$(document).ready(function(){
 		var leng = document.getElementById("selectData").options.length;
 		var x = "";
 		var names = [];
 		for(var i=0;i<leng;i++){
 			x = document.getElementById("selectData").options[i].text;
 			names[i] = x;
 		}
 		$("#selectData").select2({
 			data:names
 		});
   });	
   
   $('#create_activity_form').on('submit', function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
      url:"/php/create/activity",
      method:"GET",
      data:form_data,
      success:function(data)
      {
        $('#createModal').hide();
        window.location.replace("/activities");
      }
    });
  });

 </script>

@endsection