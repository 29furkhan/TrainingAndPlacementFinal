<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');


?>

<?php
    $class_detector = 0;
?>

<?php
  $detect = new Mobile_Detect;
?>

<?php if($detect->isMobile()): ?>
    <script>
      window.location='/notAllowedDevice';
	</script>
<?php elseif(isset(Auth::user()->email) && Auth::user()->user_type=='TPO'): ?>
    <script>
      window.location='/errorUserPage';
    </script>
<?php elseif(!isset(Auth::user()->email)): ?>
    <script>
      window.location='/main';
    </script>
<?php endif; ?>


<?php $__env->startSection('getUsername'); ?>
    <?php if(isset( Auth::user()->email)): ?>
        <a data-toggle="dropdown" style="cursor:pointer;text-decoration:none;" id="profile" class="" >
            <span class="profile-ava">
                <img alt="" style="height:33px;border-radius:50%;" src="https://github.com/29furkhan/TrainingAndPlacementFinal/blob/master/user.png?raw=true">
            </span>
            <span class="username" style="color:white;font-size:14px;">
            <?php echo e(Auth::user()->name); ?>

            </span>
            <b class="caret"></b>
        </a>
    <?php else: ?>
        <script>window.location = "/main";</script>
   <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('logoutSection'); ?>
<li><a href="/php/logout"><i class="fa fa-sign-out" style="font-size:20px;"></i>&nbsp&nbsp&nbspLog Out</a></li>
<?php $__env->stopSection(); ?>                       


<?php $__env->startSection('mainContentStudent'); ?>

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


<?php if($activities): ?>
<br>
        <div class="row" style="justify-content:flex-end;margin-right:3px;">
            <div id="searchcompany" class="col-lg-4 col-sm-4 col-md-4">
                <div class="">
                    <div class="search" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;">
                        <input id="activitySearch" onkeyup="searchActivityStudents(id);" style="border-radius:5px 0 0 5px;" type="text"   class="searchTerm"   placeholder="Search By Company Name">
                            <a href="javascript:void(0);" id="btnToSearchActivity" class="fa fa-search" style="background:white;cursor:pointer;text-decoration:none;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);">
                            </a>
                    </div>
                </div>
            </div>
        </div>
        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(in_array($class,$main[$class_detector])): ?>
            <div id="<?php echo e($as->Activity_ID); ?>Main">
                <hr class="" style="border:1px solid black;"><!-- <br><br> -->
                <div class="row">
                    <div class="col-md-3">
                    <!-- Export Button -->
                        <form method="GET" action="/activityStudent/storeData" style="width:50%;" class="form-group">
                                        <?php echo e(csrf_field()); ?>

                                        <input style="display:none;"  value="<?php echo e(Auth::user()->email); ?>" type="text" name="caserp_id" class="form-control"/>
                                        <input style="display:none;"  value="<?php echo e($as->Activity_ID); ?>" type="text" name="activity_id" class="form-control"/>
                                        <input style="display:none;"  value="<?php echo e($as->Activity_Fee); ?>" type="number" name="amount" class="form-control"/>
                                        <div>
                                            <button type="submit" data-toggle="tooltip" title="Pay for Activity!" style="border-radius:0;margin-right:20px;"  class="btn btn-primary">
                                                PAY
                                            </button>
                                        </div>
                        </form>
                    <!-- Export Button -->
                    </div>            
                </div>
                    <div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
                        <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
                            <div class="card-body">
                                <table style="text-transform:uppercase;border-collapse: collapse;border-spacing: 0;width: 100%;border: 2px solid black;" id="table_activity_students" class="table table-hover table-striped table.active justify-content: space-evenly;" data-name="activitystudentstable" >
                                    <tbody style="text-align:center;">
                                        <tr>
                                            <td style="display:none;"><?php echo e($as->Activity_ID); ?></td>
                                            <td style="text-align:left;border: 2px solid black;"><b>Activity</b></td>
                                            <td style="text-align:left;border: 2px solid black;font-weight:600;"><?php echo e($as->Activity_Name); ?></td>
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
                            </div>
                        </div>
                    </div>
                    <!-- End of main Cards -->
                </div>
                <!-- End of Main Div-->
                <!-- <br> -->
            <?php endif; ?>
            <?php $class_detector ++;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
<?php else: ?>
    <div class="alert alert-danger" id="NoDataFound">
        <div id="" style="font-size:20px;color:rgb(100,179,231);font-weight:600%;">
            Sorry!!No Current Acitivities
        </div>
    </div>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Student.commonHeaderStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Downloads\Project\resources\views/pages/Student/activities.blade.php ENDPATH**/ ?>