<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>

<script>
  var globalstatus = 0;
  var globalsearchactive = 0;
  var globalactivity_id="";
</script>

<?php
  $detect = new Mobile_Detect;
?>

<?php if($detect->isMobile()): ?>
    <script>
      window.location='/notAllowedDevice';
    </script>
<?php elseif(isset(Auth::user()->email) && Auth::user()->user_type=='students'): ?>
    <script>
      window.location='/errorUserPage';
    </script>
<?php elseif(!isset(Auth::user()->email)): ?>
    <script>
      window.location='/main';
    </script>
<?php endif; ?>

<?php $__env->startSection('mainContentTPO'); ?>
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
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cs->class); ?>"><?php echo e($cs->class); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
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
                <input id="modal_activity_id_edit" name='modal_activity_id_edit' class="form-control" readonly required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> ACTIVITY NAME </b>
                <input id="modal_activity_name_edit" placeholder="Enter the Activity Name" name='modal_activity_name_edit'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 800 Characters</label>) </b><br>
                <textarea id="modal_activity_desc_edit" type="textarea" name='modal_activity_desc_edit' rows="6" maxlength="700" class="form-control" required="required">
                </textarea>
                <label id="modal_activity_desc_err" style="display:none;color:red;font-weight:300;">*Description Required</label>
                </div>

                
                <div style="margin-bottom:20px;">
                <b> ALLOWED CLASSES </b>
                <input id="modal_activity_classes_edit" name="modal_activity_classes_edit"  class="form-control" type="text" readonly/>
                </div>

                <div style="margin-bottom:20px;">
                <b> ORGANIZATION </b>
                <input id="modal_activity_organization_edit" placeholder="Enter Name of Organization" name="modal_activity_organization_edit"  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> PERIOD </b>
                <input id="modal_activity_period_edit" name="modal_activity_period_edit"  class="form-control" type="date" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> FEE </b>
                <input id="modal_activity_fee_edit" placeholder="Enter Fee in Integer" name="modal_activity_fee_edit"  class="form-control" type="number" required/>
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

<!-- Attendance Modal Starts-->
<div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="AttendanceModalLabel">TAKE ATTENDANCE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="GET">
        <br>
        <div id="searchstudent" style="margin-left:4%;width:92%;">
              <div class="">
                <div class="search" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;">
                  <input id="studentSearch" onkeyup="searchStudent(id);" style="border-radius:5px 0 0 5px;" type="text"   class="searchTerm"   placeholder="Search By Name or CASERP_ID">
                    <a href="javascript:void(0);" id="btnToSearchStudent" class="fa fa-search" style="background:white;cursor:pointer;text-decoration:none;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);">
                    </a>
                </div>
              </div>
        </div>
        
        <div  onscroll="fixedHeader(id);" id="modalbodydiv" class="modal-body" style="height: 250px;overflow-y: unset;">
          
          <table  style="font-size:14px;"> 
            <thead>
              <tr id="" style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);color:white;text-transform:uppercase;">
              <th style="width:7%;"></th>
              <th style="width:25%;">CASID</th>
              <th style="width:63%;">Name</th>
              <th style="width:10%;">Class</th>
              </tr>
            </thead>
            
          </table>

          <table style="font-size:14px;display:block;overflow-y:auto;height:200px;text-transform:uppercase;" name="attendancetable" id='attendancetable'>

          </table>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="button" id="recordattendance" class="btn btn-primary">RECORD</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Attendance Modal Ends -->


<!-- Modal for Download Attendance -->

 <!-- The Modal -->
 <div class="modal fade" id="downloadAttendanceModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">DOWNLOAD ATTENDANCE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="height:40vh;">
          <table  style="font-size:14px;border:2px solid var(--commoncolor);" class="table-hover table-striped table.active"> 
              
              <thead>
                <tr id="" style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);color:white;text-transform:uppercase;">
                  <th style="width:70%;">FILE</th>
                  <th style="width:30%;">DOWNLOAD</th>
                </tr>
              </thead>
              <tbody>
                <form id="presentform" action="/php/activity/present" method="get">
                <tr>
                      <input type="text" name="activity_id" id="presentinput" style="display:none;">
                      <td style="border:2px solid var(--commoncolor);"> DOWNLOAD DATA OF PRESENT STUDENTS</td>
                      <td style="width:50%;border:2px solid var(--commoncolor);">
                        <button  id="present" style="border:1px solid black;" class="btn btn-success btn-sm text-nowrap text-uppercase"
                        data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" 
                        data-bs-hover-animate="tada" type="button" title="Download Excel Sheet">Download
                        </button>
                    </td>
                </tr>
                </form>

                <form id="absentform" action="/php/activity/absent" method="get">
                  <tr>
                    <input type="text" name="activity_id_absent" id="absentinput" style="display:none;">  
                    <td style="border:2px solid var(--commoncolor);"> DOWNLOAD DATA OF ABSENT STUDENTS</td>
                    <td style="width:50%;border:2px solid var(--commoncolor);">
                      <button id="absent" style="border:1px solid black;" class="btn btn-success btn-sm text-nowrap text-uppercase"
                      data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" 
                      data-bs-hover-animate="tada" type="button" title="Download Excel Sheet">Download
                      </button>
                    </td>
                  </tr>
                </form>

                <form id="allform" action="/php/activity/all" method="get">
                  <tr>
                    <input type="text" name="activity_id_all" id="allinput" style="display:none;">                      
                    <td style="border:2px solid var(--commoncolor);"> DOWNLOAD DATA OF ALL STUDENTS</td>
                    <td style="width:50%;border:2px solid var(--commoncolor);">
                      <button id="all" style="border:1px solid black;" class="btn btn-success btn-sm text-nowrap text-uppercase"
                      data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" 
                      data-bs-hover-animate="tada" type="button" title="Download Excel Sheet">Download
                      </button>
                    </td>
                  </tr>
                </form>

              </tbody>
            </table>
        </div>
        
      </div>
    </div>
  </div>

<!-- End of Modal -->

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
<?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="<?php echo e($as->Activity_ID); ?>Main" style="">
  <hr class="" style="border:1px solid black;"><!-- <br><br> -->
  <div style="display:flex;width:50%;justify-content:space-between;flex-wrap:wrap;">
                  <div>
                      <form action='/php/activity/download'>
                          <input type="text" id="activity_id" name="activity_id" value="<?php echo e($as->Activity_ID); ?>" style="display:none;"/>
                          <button type="submit" id="exportactivity<?php echo e($as->Activity_ID); ?>" data-toggle="tooltip" title="Download Excel Sheet!" style="border-radius:0;font-size:12px;"  class="dwnld btn btn-primary">
                              DOWNLOAD<i style="margin-left:15px;font-size:13px;" class="fa fa-download"> </i>
                          </button>
                      </form>
                  </div>
                  <div>
                      <button type="button"  id="editActivityBtn<?php echo e($as->Activity_ID); ?>" title="Edit the Activity!" style="border-radius:0;font-size:12px;" class="edt btn btn-primary">
                          EDIT<i style="margin-left:15px;font-size:13px;" class="fa fa-pencil"> </i>
                      </button>
                  </div>
                  <div>
                      <button id="deleteActivityBtn<?php echo e($as->Activity_ID); ?>" type="button" data-toggle="modal" title="Delete Activity!" style="border-radius:0;font-size:12px;"  class="dlt btn btn-primary">
                        DELETE<i style="margin-left:15px;font-size:13px;" class="fa fa-trash"> </i>
                      </button>
                  </div>

                  <div>
                      <button id="attendanceTake<?php echo e($as->Activity_ID); ?>" type="button" data-toggle="modal" title="Attendance!" style="border-radius:0;font-size:12px;"  class="att btn btn-primary">
                        ATTENDANCE<i style="margin-left:15px;font-size:13px;" class="fa fa-users"> </i>
                      </button>
                  </div>
  </div>
 

    <div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
        <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
            <div class="card-body">
              <table style="text-transform:uppercase;border-collapse: collapse;border-spacing: 0;width: 100%;border: 2px solid black;" id="table_activity" class="table table-hover table-striped table.active justify-content: space-evenly;" data-name="activitytable" >
                    <tbody style="text-align:center;">
                      <tr>
                          <td style="display:none;"><?php echo e($as->Activity_ID); ?></td>
                          <td style="text-align:left;border: 2px solid black;"><b>Activity</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($as->Activity_Name); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Classes</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($as->Classes); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Description</b></td>
                          <td style="text-align:justify;border: 2px solid black;jus"><?php echo e($as->Activity_Description); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Organization</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($as->Organization); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Date</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($as->Period); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border: 2px solid black;"><b>Fee</b></td>
                          <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($as->Activity_Fee); ?></td>
                      </tr>
                    </tbody>
              </table>
            </div><!-- End of Card Body-->
        </div><!-- End of card-->
    </div><!-- End of maincards-->
  <!-- <hr class="" style="border:1px solid black;"> -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

function setter(activity_name,activity_desc,activity_fee,allowed_classes,organization,period){
  // alert(organization);  
  document.getElementById('modal_activity_name_edit').value = activity_name;
  document.getElementById('modal_activity_desc_edit').value = activity_desc;
  document.getElementById('modal_activity_fee_edit').value  = activity_fee;
  document.getElementById('modal_activity_classes_edit').value  = allowed_classes;
  document.getElementById('modal_activity_organization_edit').value  = organization;
  document.getElementById('modal_activity_period_edit').value  = period;   
}

$(document).on("click", ".edt", function() {
    btnid = $(this).attr("id");
    activity_id = btnid.substr(15);
    var activity_desc,activity_fee,activity_name;
    var allowed_classes,organization,period;
    // Get Rest of The Data
    $.ajax({
        url:'/php/activity/edit/get',
        data:{'activity_id':activity_id},
        success:function(data){
            // console.log(data.data[0].Activity_Fee);
            activity_name = data.data[0].Activity_Name;
            activity_desc = data.data[0].Activity_Description;
            activity_fee  = data.data[0].Activity_Fee;
            allowed_classes = data.data[0].Classes;
            organization = data.data[0].Organization;
            period = data.data[0].Period;

            setter(activity_name,activity_desc,activity_fee,allowed_classes,organization,period);
        }  
    });
    document.getElementById('modal_activity_id_edit').value = activity_id;
    $("#editModal").modal();
    // movefurther();
});


$(document).on("click", ".dlt", function() {
    btnid = $(this).attr("id");
    activity_id = btnid.substr(17);
    $("#confirmmodal").modal();
    // movefurther();
});

function attendanceTake(activity_id){
  $.ajax({
        url:'/php/activity/getDataForAttendance',
        data:{'activity_id':activity_id},
        success:function(result){
          res = JSON.parse(result);
          setDataForAttendance(res);
        }  
    });
  $("#attendanceModal").modal();
}

function attendanceDownload(activity_id){
  $("#downloadAttendanceModal").modal();
}

function switchBetweenFunctions(activity_id){
  $.ajax({
        url:'/php/activity/attendance/switch',
        data:{'activity_id':activity_id},
        success:function(result){
          if(result > 0){
            attendanceDownload(activity_id);
          }
          else{
            attendanceTake(activity_id);
          }
        }  
    });
}

$(document).on("click", ".att", function() {
    btnid = $(this).attr("id");
    activity_id = btnid.substr(14);
    globalactivity_id = activity_id;
    switchBetweenFunctions(activity_id);
});


// Record Attendance
$(document).on('click','#recordattendance',function(event){
  event.preventDefault();
  var table = document.getElementById("attendancetable");
  var dataobject={};
  var dataobjectchild={};
  var checked;
  var setter = 0;
  for (var i = 0, row; row = table.rows[i]; i++)
  {
    col = row.cells[0];
    checked = $(col).find("input").is(":checked");
    
    if(checked)
    {
      setter=1;
      dataobjectchild['ID'] = globalactivity_id
      dataobjectchild['CASERP_ID'] = row.cells[1].innerHTML;
      dataobject[i] = dataobjectchild;
      dataobjectchild = {};
    }
    else{
      continue;
    }
  }

  dataobject = JSON.stringify(dataobject);
  // JSON has been created now its tym to send the data to PHP
  if(setter==1){
    $.ajax({
      url:"/php/record/attendance",
      method:"GET",
      dataType: 'json',
      contentType: 'application/json',
      data:{data:dataobject},
      success:function()
      {
        
      }
  });

  alert("Attendance Stored Successfully");
  $('#attendanceModal').modal('hide');

  }
  else{
    alert("Please Select Something");
  }
  
});

</script>

<script>

function setDataForAttendance(result){
    var index = 0,x;
    var table;
    var result = result;
    $("#attendancetable").empty();
    table = document.getElementById('attendancetable');                                           
    var cell = [];
    color = ['white','#f2f2f2'];
    
    for(var i=0;i<result.length;i++){
      // alert('andr');
      row = table.insertRow(i);
      col = color[index];
      row.style.backgroundColor = col;

      if(index){
        index=0;
      }
      else{
        index=1;
      }

      for(var j=0;j<4;j++){                                       
        cell[j] = row.insertCell(j);
      }

      x = document.createElement("INPUT");
      x.type = "checkbox"; 
      x.name = "markerattendance"; 
      x.value="value";
      x.id = "markerattendance"+result[i].CASERP_ID; 


      cell[0].style.width="5%";
      cell[0].id = "markattendance";
      cell[1].style.width="25%";
      cell[2].style.width="60%";
      cell[3].style.width="10%";
      
      cell[0].appendChild(x);
      cell[1].innerHTML = result[i].CASERP_ID;
      cell[2].innerHTML = result[i].First_Name +" "+ result[i].Middle_Name + " " + result[i].Last_Name;
      cell[3].innerHTML = result[i].Class;
      cell = [];                                          
    }
}

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
    if(data!=""){
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

<!-- Download Attendance Script -->
 <script>

// Present Students
 $(document).on("click", "#present", function() {
    var activity_id;
    activity_id = globalactivity_id;
    document.getElementById('presentinput').value = activity_id;
    $("#presentform").submit();    
 });

//  Absent Students
$(document).on("click", "#absent", function() {
    var activity_id;
    activity_id = globalactivity_id;
    document.getElementById('absentinput').value = activity_id;
    $("#absentform").submit();    
 });

// All Students
$(document).on("click", "#all", function() {
    var activity_id;
    activity_id = globalactivity_id;
    document.getElementById('allinput').value = activity_id;
    $("#allform").submit();    
 });

 </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Furkhan\shaikh\xampp\htdocs\Project\resources\views/pages/TPO/activitiesTPO.blade.php ENDPATH**/ ?>