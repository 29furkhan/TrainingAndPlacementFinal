<?php $__env->startSection('commonSidebarTPO'); ?>
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
                <span style="font-size:20px;">Counselling</span>
                      </a>
          </li>

          <li class="active">
            <a style="padding-left:20px;" class="" href="index.html">
                <i style="font-size:20px;" class="fa fa-picture-o"></i>
                          &nbsp&nbsp
                          <span style="font-size:20px;">Gallery</span>
                      </a>
          </li>

          <li class="active">
            <a style="padding-left:20px;" class="" href="index.html">
                          <i style="font-size:20px;" class="fa fa-clipboard"></i>
                          &nbsp&nbsp
                          <span style="font-size:20px;">Notice Board</span>
                      </a>
          </li>

        <li class="active">
            <a style="color:white;cursor:pointer;padding-left:20px;" onclick="openStudent();">
                <i style="font-size:20px;" class="fa fa-graduation-cap"></i>
                          &nbsp
                          <span style="font-size:20px;">Students</span>
                
                <i id="studentmenucaret" style="margin-right:20px;float:right;font-size:20px;" class="fa fa-caret-down"></i>
                
            </a>
            
            <ul id="studentmenu" class="sub" style="overflow:hidden;display:none;">
                <li>
                    <a style="padding-left:60px;" class="" href="#">Process Data</a>
                </li>

                <li>
                    <a style="padding-left:60px;" class="" href="/export">Export Data</a>
                </li>
            </ul>
            
        </li>

          
        <li class="active">
            <a style="color:white;cursor:pointer;padding-left:20px;" class="" onclick="openChart();">
                <i style="font-size:20px;" class="fa fa-pie-chart"></i>
                          &nbsp&nbsp
                          <span style="font-size:20px;">Charts</span>
                <i id="chartmenucaret" style="margin-right:20px;float:right;font-size:20px;" class="fa fa-caret-down"></i>
                
            </a>

            <ul id="chartmenu" class="sub" style="overflow:hidden;display:none;">
                <li>
                    <a style="padding-left:60px;" class="" href="#">Drives Charts</a>
                </li>

                <li>
                    <a style="padding-left:60px;" class="" href="#">Student Charts</a>
                </li>
            </ul>
            
        </li>

        </ul>

<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\TPOPrash\resources\views/layouts/TPO/commonSidebarTPO.blade.php ENDPATH**/ ?>