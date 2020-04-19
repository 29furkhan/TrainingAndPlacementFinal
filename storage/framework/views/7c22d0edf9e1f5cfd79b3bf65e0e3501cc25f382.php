<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
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
<br>
<?php if($activities): ?>
    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="maincards" class="maincards" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;">
            <div id='actualcard' class="card" style="width:100%;height:auto;max-height:50vh;overflow-y:auto;">
                <div class="card-body">
                    <div class="card-title">
                        <b style="font-size:16px;"><?php echo e($as->Activity_Name); ?></b>
                    </div>
                    <!-- Description -->
                    <div style="text-align:justify;">
                        <?php echo e($as->Activity_Description); ?>

                    </div>
                    <div style="margin-top:10px;">
                        <b>FEE:&nbsp<?php echo e($as->Activity_Fee); ?> &#x20b9</b>
                    </div>
                    <br>
                    <!-- Export Button -->
                    <form method="GET" action="/activityStudent/storeData" style="width:50%;" class="form-group">
                        <?php echo e(csrf_field()); ?>

                        <input style="display:none;"  value="<?php echo e(Auth::user()->email); ?>" type="text" name="caserp_id" class="form-control"/>
                        <input style="display:none;"  value="<?php echo e($as->Activity_ID); ?>" type="text" name="activity_id" class="form-control"/>
                        <input style="display:none;"  value="<?php echo e($as->Activity_Fee); ?>" type="number" name="amount" class="form-control"/>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="alert alert-danger" id="NoDataFound">
        <div id="" style="font-size:20px;color:rgb(100,179,231);font-weight:600%;">
            Sorry!!No Current Acitivities
        </div>
    </div>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Student.commonHeaderStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\TrainingAndPlacementFinal-StudentBranch\resources\views/pages/Student/activities.blade.php ENDPATH**/ ?>