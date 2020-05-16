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
<?php elseif(isset(Auth::user()->email) && Auth::user()->user_type=='student'): ?>
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
                        <i style="font-size:30px;" class="fa fa-picture-o"></i>
                        &nbsp&nbspGallery
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;outline:none;" href="/Counselling">
                            &nbspHome</a>
                        </li>
                        
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-picture-o"></i>
                            &nbsp
                            <b style="font-weight:500;">Gallery</b>
                        </li>
                    </ul>
                </div>
</div>

<div class="row">
    <div class="col-md-3">
        <button title="Create a Fresh Activity" style="font-size:12px;border-radius:0;"class='btn btn-primary'>
        CREATE ALBUM
        </button>
    </div>
</div>
<!-- <hr class="" style="border:1px solid black;"> -->
<br>
<div class="row">
    <div class="col-md-3" style="">
        <!-- <div class="container">  -->
            <div class="card">
                <div class="card-body">
                    <label style="color:rgb(100,179,231);" class="card-title">TRAINING AT TCS</label>
                    <img src="images/user.png" alt="Problem" class="img-fluid" srcset="">
                    <br>
                    <br>
                    <button title="View Album" style="font-size:12px;font-size:12px;border-radius:0;"class='btn btn-primary'>
                        EXPLORE
                    </button>
                </div>
            </div>
            
        <!-- </div> -->
    </div>   

    <div class="col-md-3" style="">
        <!-- <div class="container">  -->
            <div class="card">
                <div class="card-body">
                    <label style="color:rgb(100,179,231);" class="card-title">TRAINING AT TCS</label>
                    <img src="images/user.png" alt="Problem" class="img-fluid" srcset="">
                    <br>
                    <br>
                    <button title="View Album" style="font-size:12px;font-size:12px;border-radius:0;"class='btn btn-primary'>
                        EXPLORE
                    </button>
                </div>
            </div>
            
        <!-- </div> -->
    </div>   
</div>    


        


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Furkhan\shaikh\xampp\htdocs\Project\resources\views/pages/TPO/photoGalleryTPO.blade.php ENDPATH**/ ?>