<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p>Hi, <?php echo e($ds->Name); ?></p>
<p>Here is the password for your registered email : <?php echo e($ds->Password); ?></p>
<p>Thanks for Choosing this Application Any Query Contact:</p>
<p>1. Prashant Phulari :9022247003</p>
<p>2. Furkhan Shaikh :9763118461</p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\TrainingAndPlacementFinal-TPOBranch\resources\views/dynamic_email_template.blade.php ENDPATH**/ ?>