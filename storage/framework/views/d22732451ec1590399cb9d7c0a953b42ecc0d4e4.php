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
                        &nbsp&nbspCounselling
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;outline:none;" href="/Counselling">
                            &nbspHome</a>
                        </li>
                        
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-tachometer"></i>
                            &nbsp
                            <b style="font-weight:500;">Counselling</b>
                        </li>
                    </ul>
                </div>
</div>
<!-- <div class="row">
<div class="col-lg-12" style="margin-top:65px;">
<iframe width="420" height="315"
src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
</div>
</div> -->
<div class="container">
<div class="row">
<?php $__currentLoopData = $counselling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card col-sm-5" style="
    margin-right: 5%;
    margin-bottom: 2%; box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-right:10px;display:block;flex-wrap:wrap;
">
  <div class="card-body">
  <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="<?php echo e($cn->Link); ?>" allowfullscreen></iframe>
</div>
    <h5 class="card-title"><?php echo e($cn->Title); ?></h5>
</div>
</div>

<!-- <div class="card col-sm-5"style="
    margin-right: 5%;
    margin-bottom: 2%;
" >
  <div class="card-body">
  <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen></iframe>
</div>
    <h5 class="card-title">Card title</h5>
</div>
</div>
<div class="card col-sm-5" style="
    margin-right: 5%;
    margin-bottom: 2%;
">
  <div class="card-body">
  <div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen></iframe>
</div>
    <h5 class="card-title">Card title</h5>
</div>
</div> -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.Student.commonHeaderStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TrainingAndPlacementFinal-TPOBranch\resources\views/Pages/Student/counselling.blade.php ENDPATH**/ ?>