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

<?php $__env->startSection('logout'); ?>
<li><a href="/php/logout"><i class="fa fa-sign-out" style="font-size:20px;"></i>&nbsp&nbsp&nbspLog Out</a></li>
<?php $__env->stopSection(); ?>                       
<?php /**PATH C:\xampp\htdocs\TrainingAndPlacementFinal-TPOBranch\resources\views/layouts/commonLoginLogout.blade.php ENDPATH**/ ?>