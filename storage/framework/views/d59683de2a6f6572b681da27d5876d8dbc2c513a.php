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

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">TOTAL STUDENTS</b>
                <hr>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;"><?php echo e($total); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">PLACED STUDENTS</b>
                <hr>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;"><?php echo e($placed); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">NOT PLACED</b>
                <hr>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;"><?php echo e($not_placed); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">ENTREPRENEURS</b>
                <hr>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;"><?php echo e($entrepreneur); ?></p>
                </div>
            </div>
        </div>
    </div>


</div>
<br>
<br>
<div class="row">
    <div class="col-lg-12 col-md-12 ">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;">
                <div class="card-body">
                    <!-- <b style="color:red;font-weight:500%;font-size:17px;" class="card-title">PLACEMENT FIGURES</b> -->
                    <canvas id="placementgraph"></canvas>
                </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        var data = {
            labels: ['MECH','CSE','IT','CIVIL','ETC'],
            datasets: [
                {
                    label : "PLACED",
                    data  : [<?php echo $mech_placed; ?>,<?php echo $cse_placed; ?>,<?php echo $it_placed; ?>,<?php echo $civil_placed; ?>,<?php echo $etc_placed; ?>],

                    borderColor:'rgb(100,179,231)',
                    backgroundColor:'rgb(100,179,231,0.4)',
                    opacity:0.4
                },
                {
                    label : "NOT PLACED",
                    data  : [<?php echo $mech_not_placed; ?>,<?php echo $cse_not_placed; ?>,<?php echo $it_not_placed; ?>,<?php echo $civil_not_placed; ?>,<?php echo $etc_not_placed; ?>],
                    
                    borderColor:'rgb(0,255,0)',
                    backgroundColor:'rgb(0,255,0,0.4)',
                },
                {
                    label : "ENTREPRENEURS",
                    data  : [<?php echo $mech_entrepreneurs; ?>,<?php echo $cse_entrepreneurs; ?>,<?php echo $it_entrepreneurs; ?>,<?php echo $civil_entrepreneurs; ?>,<?php echo $etc_entrepreneurs; ?>],    
                    borderColor:'rgb(255,0,0)',
                    backgroundColor:'rgb(255,0,0,0.4)',
                }
            ]
        };

        var ctx = $('#placementgraph');
        // console.log(ctx);
        var chart = new Chart(ctx, {
            type : "bar",
            data : data,
            options : {}
        });
        console.log(chart);
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Furkhan\shaikh\xampp\htdocs\Project\resources\views/pages/TPO/dashboardTPO.blade.php ENDPATH**/ ?>