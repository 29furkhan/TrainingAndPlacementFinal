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
<div style="overflow-y:auto;" class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="create " aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">CREATE NEW DRIVE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="return validate();" action="/php/create/drive" method="GET">
        <div class="modal-body" style="height:25em;">
                <div style="margin-bottom:20px;">
                <b> Drive ID (<label style="color:red;font-weight:300;">*</label>) </b>
                <input  name='drive_id_text' id='drive_id_text' class="form-control" value="<?php echo uniqid();?>" readonly required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Company Name (<label style="color:red;font-weight:300;">*</label>)</b>
                <input placeholder="Enter the Company Name" name='company_name_text' id='company_name_text' class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Any Criteria?(<label style="color:red;font-weight:300;">*</label>)</b><br>
                <select class="form-control" onchange="getCriteria(id,'criteria_div');" onblur="getCriteria(id,'criteria_div');" name="criteria_select" id="criteria_select" required>
                  <option value="">Select Criteria</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                </div>

                <div id="criteria_div" style="display:none;margin-bottom:20px;">
                <b> Criteria (<label style="color:red;font-weight:300;">*Maximum 1000 Characters</label>) </b><br>
                <textarea type="textarea" name='criteria_text' id='criteria_text' rows="6" maxlength="1500" class="form-control" required="required">
                </textarea>
                <label id="criteria_text_error" style="display:none;color:red;font-weight:300;">*Criteria Required</label>
                </div>

                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 1000 Characters</label>) </b><br>
                <textarea type="textarea" name='description' id='description' rows="6" maxlength="1500" class="form-control" required="required">
                </textarea>
                <label id="descriptionerror" style="display:none;color:red;font-weight:300;">*Description Required</label>
                </div>

                <div style="margin-bottom:20px;">
                <b> Venue(<label style="color:red;font-weight:300;">*</label>)</b>
                <input placeholder="Enter the Venue of Drive" name='venue' id='venue' class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Allow Placed Students?(<label style="color:red;font-weight:300;">*</label>)</b><br>
                <select class="form-control" name="placed_select" id="placed_select" required>
                  <option value="">Select</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
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
        <div class="modal-body">
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
                        <i style="font-size:30px;" class="fa fa-industry"></i>
                        &nbsp&nbspDrives
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
                            <b style="font-weight:500;">Drives</b>
                        </li>


                    </ul>
                </div>
</div>

<button data-target="#createModal" data-toggle="modal" title="Create a Fresh Drive" style="border-radius:0;"class='btn btn-primary'>
CREATE
</button>
<br><br>
<!-- CARDS -->
<?php $__currentLoopData = $drives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- <hr class="row" style="border:1px solid black;"> -->
<div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
    <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
        
        <div class="card-body">
          <table style="border-collapse: collapse;border-spacing: 0;width: 100%;border: 2px solid black;" id="table_schedule" class="table table-hover table-striped table.active justify-content: space-evenly;">
            <tbody>
            <!-- Company Name -->
              <tr>
                <td style="text-align:left;border: 2px solid black;"><b>Company</b></td>
                <td style="text-align:left;border: 2px solid black;"><b><?php echo e($ds->Company_Name); ?></b></td>
              </tr>
            
            <!-- Criteria -->
              <?php if($ds->Criteria=="no"): ?>
                <tr>
                  <td style="text-align:left;border: 2px solid black;"><b>Criteria</b></td>
                  <td style="text-align:left;border: 2px solid black;"><b>No Criteria</b></td>
                </tr>
              <?php else: ?>
                <tr>
                    <td style="text-align:left;border: 2px solid black;"><b>Criteria</b></td>
                    <td style="text-align:justify;border: 2px solid black;"><?php echo e($ds->Criteria); ?></td>
                </tr>
              <?php endif; ?>
            
            <!-- Description -->
            <tr>
                <td style="text-align:left;border: 2px solid black;"><b>Description</b></td>
                <td style="text-align:justify;border: 2px solid black;"><?php echo e($ds->Drive_Description); ?></td>
            </tr>
            <!-- Venue -->
            <tr>
                <td style="text-align:left;border: 2px solid black;"><b>Venue</b></td>
                <td style="text-align:left;border: 2px solid black;"><b><?php echo e($ds->Venue); ?></b></td>
            </tr>

            </tbody>
          </table>
        </div>
    </div>
</div>
<br>
<div style="width:170px;display:flex;justify-content:space-between;flex-wrap:wrap;">
                  <div>
                      <form action='/php/activity/download'>
                          <input type="text" id="" name="" value="" style="display:none;"/>
                          <button type="submit" data-toggle="tooltip" title="Download Excel Sheet!" style="border-radius:0;width:40px;"  class="dwnld btn btn-primary">
                              <i style="font-size:17px;" class="fa fa-download"> </i>
                          </button>
                      </form>
                  </div>
                  <div>
                      <button type="button"  id="" title="Edit the Activity!" style="border-radius:0;margin-right:15px;" class="edt btn btn-primary">
                          <i style="font-size:17px;" class="fa fa-pencil"> </i>
                      </button>
                      <button id="" type="button" data-toggle="modal" title="Delete Activity!" style="border-radius:0;margin-right:15px;"  class="dlt btn btn-primary">
                          <i style="font-size:17px;" class="fa fa-trash"> </i>
                      </button>
                  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

  function getCriteria(id,id1){
    element  = document.getElementById(id);
    value = element.value;
    if(value=="yes"){
      document.getElementById(id1).style.display="block";
    }
    else{
      document.getElementById(id1).style.display="none";
    }
  }
</script>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Furkhan\shaikh\xampp\htdocs\TPO\resources\views/Pages/TPO/drivesTPO.blade.php ENDPATH**/ ?>