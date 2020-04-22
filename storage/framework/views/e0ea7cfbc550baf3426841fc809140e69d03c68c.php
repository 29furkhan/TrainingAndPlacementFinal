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
  <div class="modal-dialog" style="overflow-y: initial !important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">CREATE NEW DRIVE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="return validate();" action="/php/create/drive" method="GET">
        <div class="modal-body" style="height: 250px;overflow-y: auto;">
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
                  <b> Date(<label style="color:red;font-weight:300;">*</label>)</b>
                  <input placeholder="Pick a Date" name='date' id='date' class="form-control" type="date" required/>
                </div>


                <div style="margin-bottom:20px;">
                  <b> Package(<label style="color:red;font-weight:300;">*</label>)</b>
                  <input placeholder="Ex. 3.36LPA" name='package' id='package' class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                  <b> Link<label style="color:red;font-weight:300;"></label></b>
                  <input placeholder="Ex. Enter without http or https" name='link' id='link' class="form-control" type="text" />
                </div>


                <div style="margin-bottom:20px;">
                  <b> Venue(<label style="color:red;font-weight:300;">*</label>)</b>
                  <input placeholder="Enter the Venue of Drive" name='venue' id='venue' class="form-control" type="text" required/>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-labelledby="create " aria-hidden="true">
  <div  class="modal-dialog" style="overflow-y: initial !important;" role="document">
    <div  class="modal-content">
      <div class="modal-header" id="modal_header">
        <h4 class="modal-title" id="exampleModalLabel">EDIT Drive</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit = "return validateEdit();" action="/php/edit/drive" method="GET">
        <div class="modal-body" style="height: 250px;overflow-y: auto;">
                
                <div style="margin-bottom:20px;">
                <b> Drive ID </b>
                <input id="modal_drive_id"  name='modal_drive_id' class="form-control" readonly required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> Company Name(<label style="color:red;font-weight:300;">*</label>)  </b>
                <input id="modal_company_name" placeholder="Enter the Company Name" name='modal_company_name'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                <b> DESCRIPTION (<label style="color:red;font-weight:300;">*Maximum 800 Characters</label>) </b><br>
                <textarea id="modal_drive_desc" type="textarea" name='modal_drive_desc' rows="6" maxlength="700" class="form-control" required="required">
                </textarea>
                <label id="modal_activity_desc_err" style="display:none;color:red;font-weight:300;">*Description Required</label>
                </div>

                <div style="margin-bottom:20px;">
                <b> Any Criteria?(<label style="color:red;font-weight:300;">*</label>)</b><br>
                <select class="form-control" onchange="getCriteria(id,'criteria_div_edt');" onblur="getCriteria(id,'criteria_div_edt');" name="criteria_select_edt" id="criteria_select_edt" required>
                  <option value="">Select Criteria</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                </div>

                <div id="criteria_div_edt" style="display:none;margin-bottom:20px;">
                  <b> Criteria (<label style="color:red;font-weight:300;">*Maximum 1000 Characters</label>) </b><br>
                  <textarea type="textarea" name='modal_criteria' id='modal_criteria' rows="6" maxlength="1500" class="form-control" required="required">
                  </textarea>
                  <label id="criteria_text_error_edt" style="display:none;color:red;font-weight:300;">*Criteria Required</label>
                </div>

                <div style="margin-bottom:20px;">
                  <b> Date (<label style="color:red;font-weight:300;">*</label>) </b><br>
                  <input id="modal_date" placeholder="Enter the Drive Date" name='modal_date'  class="form-control" type="date" required/>
                </div>

                <div style="margin-bottom:20px;">
                  <b> Package (<label style="color:red;font-weight:300;">*</label>) </b><br>
                  <input id="modal_pack" placeholder="Enter the Package" name='modal_pack'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                  <b> Venue (<label style="color:red;font-weight:300;">*</label>) </b><br>
                  <input id="modal_venue" placeholder="Enter the Venue" name='modal_venue'  class="form-control" type="text" required/>
                </div>

                <div style="margin-bottom:20px;">
                  <b> Apply Link (<label style="color:red;font-weight:300;">*</label>) </b><br>
                  <input id="modal_link" placeholder="Enter the Link" name='modal_link'  class="form-control" type="text" required/>
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

<div class="row">
  <div class="col-md-3">
    <button data-target="#createModal" data-toggle="modal" title="Create a Fresh Drive" style="border-radius:0;"class='btn btn-primary'>
    CREATE
    </button>
    
  </div>
  <div class="col-md-9">
    <!-- Search Box Start -->
    <div class="row" style="justify-content:flex-end;margin-right:3px;">
      <div id="searchcompany" class="col-lg-4 col-sm-4 col-md-4">
          <div class="">
            <div class="search" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;">
              <input id="companysearch" onkeyup="searchCompany(id);" style="border-radius:5px 0 0 5px;" type="text"   class="searchTerm"   placeholder="Search By Company Name">
                <a href="javascript:void(0);" id="btnToSearchCompany" class="fa fa-search" style="background:white;cursor:pointer;text-decoration:none;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);">
                </a>
            </div>
        </div>
      </div>
    </div>
    <!-- Search Box End -->
  </div>
  
</div>
<br>
<!-- CARDS -->
<?php $__currentLoopData = $drives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="<?php echo e($ds->Drive_ID); ?>Main">
  <hr class="row" style="border:1px solid black;">
  <div style="display:flex;justify-content:space-between;flex-wrap:wrap;">
                    <div>
                        <button type="button"  id="editDrive<?php echo e($ds->Drive_ID); ?>" title="Edit the Drive!" style="border-radius:0;margin-right:15px;" class="edt btn btn-primary">
                            Edit Drive<i style="margin-left:15px;font-size:17px;" class="fa fa-pencil"> </i>
                        </button>
                        <button id="deleteDrive<?php echo e($ds->Drive_ID); ?>" type="button" data-toggle="modal" title="Delete Drive!" style="border-radius:0;margin-right:15px;"  class="dlt btn btn-primary">
                            Delete Drive <i style="margin-left:15px;font-size:17px;" class="fa fa-trash"> </i>
                        </button>
                    </div>
  </div>
  <br>
  <div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
      <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
          
          <div class="card-body">
            <table style="text-transform: uppercase;border-collapse: collapse;border-spacing: 0;width: 100%;border: 2px solid black;" id="table_schedule" class="table table-hover table-striped table.active justify-content: space-evenly;" data-name="companytable" >
              <tbody>
              <!-- Company Name -->
                <tr>
                  <td style="display:none;"><?php echo e($ds->Drive_ID); ?></td>
                  <td style="text-align:left;border: 2px solid black;"><b>Company</b></td>
                  <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($ds->Company_Name); ?></td>
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

              <!-- Date -->
              <tr>
                  <td style="text-align:left;border: 2px solid black;"><b>Date</b></td>
                  <td style="text-align:justify;border: 2px solid black;"><?php echo e($ds->Date); ?></td>
              </tr>
              
              <!-- package -->
              <tr>
                  <td style="text-align:left;border: 2px solid black;"><b>Package</b></td>
                  <td style="text-align:justify;border: 2px solid black;"><?php echo e($ds->Package); ?></td>
              </tr>

              <!-- Link -->
              <tr>
                  <td style="text-align:left;border: 2px solid black;"><b>Apply Link</b></td>
                  <td style="text-align:justify;border: 2px solid black;"><a  onclick="LinkFunction('<?php echo e($ds->Link); ?>');" style="text-decoration:underline;color:blue;cursor:pointer;"><?php echo e($ds->Link); ?></a></td>
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
          <b style="font-size:16px;color:rgb(100,179,231);">Are You Sure You Want To Delete This Drive?</b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button onclick="setDeleteFlag();" id="deleteDriveBtn" type="button" class="btn btn-primary" >Delete</button>
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
var drive_id;

function setDeleteFlag(){
    deleteFlag=1;
    moveFurther();
}

function moveFurther(){
  $.ajax({
        url:'/php/drive/delete',
        data:{'drive_id':drive_id},
        success:function(data){
            alert(data);
            location.reload();
        }   
    });
}

$('#confirmmodal').on('hidden.bs.modal', function () {
  deleteFlag = 0;
})

function setter(company_name,drive_desc,criteria,venue,date,pack,link){
    document.getElementById('modal_company_name').value = company_name;
    document.getElementById('modal_drive_desc').value = drive_desc;
    document.getElementById('modal_criteria').value  = criteria;
    document.getElementById('modal_venue').value  = venue;
    document.getElementById('modal_date').value  = date;
    document.getElementById('modal_pack').value  = pack;
    document.getElementById('modal_link').value  = link;
    
}

$(document).on("click", ".edt", function() {
    btnid = $(this).attr("id");
    drive_id = btnid.substr(9);
    var drive_desc,company_name,criteria,date,package,link,venue;
    // Get Rest of The Data
    $.ajax({
        url:'/php/drive/edit/get',
        data:{'drive_id':drive_id},
        success:function(data){
            console.log(data);
            company_name = data.data[0].Company_Name;
            drive_desc = data.data[0].Drive_Description;
            criteria  = data.data[0].Criteria;
            venue  = data.data[0].Venue;
            date  = data.data[0].Date;
            pack  = data.data[0].Package;
            link = data.data[0].Link;
            // alert(date);
            setter(company_name,drive_desc,criteria,venue,date,pack,link);
        }  
    });
    document.getElementById('modal_drive_id').value = drive_id;
    $("#editModal").modal();
    // movefurther();
});


$(document).on("click", ".dlt", function() {
    btnid = $(this).attr("id");
    drive_id = btnid.substr(11);
    window.$("#confirmmodal").modal();
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
  
<script>
  function LinkFunction(link){
    window.open("https://" + link);
  }
  
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Downloads\Project\resources\views/pages/TPO/drivesTPO.blade.php ENDPATH**/ ?>