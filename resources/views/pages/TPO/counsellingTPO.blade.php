@extends('layouts.TPO.commonHeaderTPO')

<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
// use Barryvdh\Debugbar\Facade as Debugbar;
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
<div style="overflow-y:auto;" class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="create " aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add New Video</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="return validate();" action="/php/add/video" method="GET">
        <div class="modal-body" style="height:25em;">
                <div style="margin-bottom:20px;">
                <b> Video Title (<label style="color:red;font-weight:300;">*</label>) </b>
                <input  name='v_title' id='v_title' class="form-control" placeholder="Enter Title of Video" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Enter Link (<label style="color:red;font-weight:300;">*</label>)</b>
                <input placeholder="Enter Video link" name='link' id='link' class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 1000 Characters</label>) </b><br>
                <textarea type="textarea" name='description' id='description' rows="6" maxlength="1500" class="form-control" required="required">
                </textarea>
                <label id="descriptionerror" style="display:none;color:red;font-weight:300;">*Description Required</label>
                </div>



                
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
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
        <h4 class="modal-title" id="exampleModalLabel">EDIT VIDEO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit = "return validateEdit();" action="/php/edit/video" method="GET">
        <div class="modal-body">
                <div style="margin-bottom:20px;">
                <b> VIDEO ID </b>
                <input id="modal_v_id" name='modal_v_id' class="form-control" readonly required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Title </b>
                <input id="modal_title" placeholder="Enter the Title" name='modal_title'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Link </b>
                <input id="modal_link" placeholder="Enter the Link" name='modal_link'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 800 Characters</label>) </b><br>
                <textarea id="modal_activity_desc" type="textarea" name='modal_activity_desc' rows="6" maxlength="700" class="form-control" required="required">
                </textarea>
                <label id="modal_activity_desc_err" style="display:none;color:red;font-weight:300;">*Description Required</label>
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
                        <i style="font-size:30px;" class="fa fa-users"></i>
                        &nbsp&nbspCounselling
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;" href="/dashboard">
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

<button data-target="#createModal" data-toggle="modal" title="Add a New Video" style="border-radius:0;"class='btn btn-primary'>
ADD VIDEO
</button>
<br><br>
<!-- CARDS -->

<div class="container">
<div class="row">
@foreach($counselling as $cn)

<div class="card col-md-4" style="
    margin-right: 5%;
    margin-bottom: 2%; box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;display:block;flex-wrap:wrap;
">
  <div class="card-body">
  <div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" src="{{$cn->Link}}" allowfullscreen></iframe>
</div>
    <h5 class="card-title">{{$cn->Title}}</h5>
    <p class="para" >{{$cn->Video_Description}}</p><br>

<br>
<div style="width:170px;display:flex;justify-content:space-between;flex-wrap:wrap;position: absolute;
    bottom: 4%;">
                  <!-- <div>
                      <form action='/php/activity/download'>
                          <input type="text" id="" name="" value="" style="display:none;"/>
                          <button type="submit" data-toggle="tooltip" title="Download Excel Sheet!" style="border-radius:0;width:40px;"  class="dwnld btn btn-primary">
                              <i style="font-size:17px;" class="fa fa-download"> </i>
                          </button>
                      </form>
                  </div> -->
                  <div>
                      <button type="button"  id="editActivityBtn{{$cn->V_ID}} " title="Edit Video!" style="border-radius:0;margin-right:15px;" class="edt btn btn-primary">
                          <i style="font-size:17px;" class="fa fa-pencil"> </i>
                      </button>
                      <button id="deleteActivityBtn{{$cn->V_ID}} " type="button" data-toggle="modal" title="Delete Video!" style="border-radius:0;margin-right:15px;"  class="dlt btn btn-primary">
                          <i style="font-size:17px;" class="fa fa-trash"> </i>
                      </button>
                     
                  </div>
</div>
</div>
</div>
@endforeach
</div>
</div>
<!-- Modal for Delete -->
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
function desc()
{
    document.getElementById('para').style.display="block";
}
function validate(){
  var data_description = $('#description').val();
  var data_criteria = $('#criteria_text').val();
  data_description = data_description.trim();
  data_criteria = data_criteria.trim();
  if(data_description==""){
        document.getElementById('descriptionerror').innerHTML="*Description Required";
        document.getElementById('descriptionerror').style.display="block";
        return false;
    }
  
  if($('#criteria_select').val()=="yes")
  {
    if(data_criteria==""){
      document.getElementById('criteria_text_error').innerHTML="*Criteria Required";
      document.getElementById('criteria_text_error').style.display="block";
      return false;
    }
  }
  return true
}

</script>

<script>
var deleteFlag=0;
var btnid;
var v_id;

function setDeleteFlag(){
    deleteFlag=1;
    moveFurther();
}

function moveFurther(){
    $.ajax({
        url:'/php/video/delete',
        data:{'v_id':v_id},
        success:function(data){
            alert(data);
            location.reload();
        }   
    });
}

$('#confirmmodal').on('hidden.bs.modal', function () {
  deleteFlag = 0;
})

function setter(title,activity_desc,link){
    document.getElementById('modal_title').value = title;
    document.getElementById('modal_activity_desc').value = activity_desc;
    document.getElementById('modal_link').value  = link;
    // document.getElementById('modal_activity_fee').value  = activity_fee;
}

$(document).on("click", ".edt", function() {
    btnid = $(this).attr("id");
    v_id = btnid.substr(15);
    var activity_desc,activity_fee,title,link;
    // Get Rest of The Data
    $.ajax({
        url:'/php/video/edit/get',
        data:{'v_id':v_id},
        success:function(data){
            console.log(data.data[0].Video_Description);
            title = data.data[0].Title;
            activity_desc = data.data[0].Video_Description;
            link=data.data[0].Link;
            setter(title,activity_desc,link);
        }  
    });
    document.getElementById('modal_v_id').value = v_id;
    $("#editModal").modal();
    // movefurther();
});


$(document).on("click", ".dlt", function() {
    btnid = $(this).attr("id");
    v_id = btnid.substr(17);
    $("#confirmmodal").modal();
    // movefurther();
});

</script>
<script>

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
@endsection