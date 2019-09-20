<?php $__env->startSection('commonSidebarStudent'); ?>
<script>
    var flag=0;
    var flag1=0;
    function openStudent(){
        if(flag==0)
        {
            document.getElementById('studentmenu').style.display="block";
            document.getElementById('studentmenucaret').className = "fa fa-caret-up";
            flag=1;
        }
        else
        {
            document.getElementById('studentmenu').style.display="none";
            document.getElementById('studentmenucaret').className = "fa fa-caret-down";
            flag=0;
        }   
    }

    function openChart(){
        if(flag1==0)
        {
            document.getElementById('chartmenu').style.display="block";
            document.getElementById('chartmenucaret').className = "fa fa-caret-up";
            flag1=1;
        }
        else
        {
            document.getElementById('chartmenu').style.display="none";
            document.getElementById('chartmenucaret').className = "fa fa-caret-down";
            flag1=0;
        }   
    }

</script>

        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a style="padding-left:20px;"  onclick="" href="/dashboard">
                <i style="font-size:20px;" class="fa fa-tachometer"></i>
                &nbsp&nbsp          
                <span style="font-size:20px;">Dashboard</span>
                      </a>
          </li>
          
          <li class="active">
            <a style="padding-left:20px;" class="" href="/dashboard">
                <i style="font-size:20px;" class="fa fa-industry"></i>
                &nbsp&nbsp          
                <span style="font-size:20px;">Drives</span>
                      </a>
          </li>

          <li class="active">
            <a style="padding-left:20px;" class="" href="index.html">
            <i style="font-size:20px;" class="fa fa-tasks"></i>
                &nbsp&nbsp          
            <span style="font-size:20px;">Activities</span>
                      </a>
          </li>

          <li class="active">
            <a style="padding-left:20px;" class="" href="index.html">
                <i style="font-size:20px;" class="fa fa-file-video-o"></i>
                &nbsp&nbsp          
                <span style="font-size:20px;">Councelling</span>
                      </a>
          </li>  

          <li class="active">
            <a style="padding-left:20px;" class="" href="index.html">
                          <i style="font-size:20px;" class="fa fa-clipboard"></i>
                          &nbsp&nbsp
                          <span style="font-size:20px;">Notice Board</span>
                      </a>
          </li>


        
        </ul>

<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\TrainingAndPlacement\resources\views/layouts/commonSidebarStudent.blade.php ENDPATH**/ ?>