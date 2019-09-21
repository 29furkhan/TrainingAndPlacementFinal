<?php $__env->startSection('getUsername'); ?>
    <?php if(isset( Auth::user()->email)): ?>
        <a data-toggle="dropdown" style="cursor:pointer;text-decoration:none;" id="profile" class="" >
            <span class="profile-ava">
                <img alt="" style="height:33px;border-radius:50%;" src="images/user.png">
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

<?php $__env->startSection('mainContentTPO'); ?>
<div class="row">
                <div class="col-lg-12" style="margin-top:65px;">
                    <h3 class="page-header" style="opacity:0.2;">
                        <i style="font-size:30px;" class="fa fa-tachometer"></i>
                        &nbsp&nbspDashboard
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
                            <b style="font-weight:500;">Dashboard</b>
                        </li>
                    </ul>
                </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Furkhan\XAMPP\htdocs\Prashant\resources\views/Pages/TPO/dashboardTPO.blade.php ENDPATH**/ ?>