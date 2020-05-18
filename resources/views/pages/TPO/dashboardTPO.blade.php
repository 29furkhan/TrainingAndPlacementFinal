<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<?php
  $detect = new Mobile_Detect;
?>


@if($detect->isMobile())
    <script>
      window.location='/notAllowedDevice';
    </script>
@elseif(isset(Auth::user()->email) && Auth::user()->user_type=='students')
    <script>
      window.location='/errorUserPage';
    </script>
@elseif(!isset(Auth::user()->email))
    <script>
      window.location='/main';
    </script>
@endif



@extends('layouts.TPO.commonHeaderTPO')

@section('mainContentTPO')
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
    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
        <div class="card" style="height:24vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: var(--linearcolor);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">TOTAL STUDENTS</b>
                <hr>
                <br>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;">{{$total}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
        <div class="card" style="height:24vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: var(--linearcolor3);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">PLACED STUDENTS</b>
                <hr><br>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;">{{$placed}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
        <div class="card" style="height:24vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: var(--linearcolor2);">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">NOT PLACED</b>
                <hr><br>
                <div style="display:flex;justify-content:space-between;">
                    <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p style="color:#ffffff;font-size:18px;">{{$not_placed}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
            <div class="card" style="height:24vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: var(--linearcolor2);">
                <div class="card-body">
                    <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">ENTREPRENEURS</b>
                    <hr><br>
                    <div style="display:flex;justify-content:space-between;">
                        <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                        <p style="color:#ffffff;font-size:18px;">{{$entrepreneur}}</p>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
            <div class="card" style="height:24vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: var(--linearcolor3);">
                <div class="card-body">
                    <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">TOTAL ACTIVITIES</b>
                    <hr><br>
                    <div style="display:flex;justify-content:space-between;">
                        <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                        <p style="color:#ffffff;font-size:18px;">{{$total_activities}}</p>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
            <div class="card" style="height:24vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;background: linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);">
                <div class="card-body">
                    <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">TOTAL DRIVES</b>
                    <hr><br>
                    <div style="display:flex;justify-content:space-between;">
                        <i style="color:#ffffff;font-size:24px;" class="fa fa-bar-chart" aria-hidden="true"></i>
                        <p style="color:#ffffff;font-size:18px;">{{$total_drives}}</p>
                    </div>
                </div>
            </div>
    </div>

</div>
    
<br>
<br>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-sm-6">
        <div class="card" style="background:var(--linearcolor3);height:50vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">COMPANY-WISE PLACEMENTS</b>
                <hr style="border: 0.5px solid lightgrey;">
                <canvas id="companygraph"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-sm-6">
        <div class="card" style="background:var(--linearcolor3);height:50vh;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px solid #fff;border-radius:10px;">
            <div class="card-body">
                <b style="color:#ffffff;font-weight:500%;font-size:17px;" class="card-title">COMPANIES WE HAVE</b>
                <hr style="border: 0.5px solid lightgrey;">
                <table style="border:1px;color:#ffffff;height:34vh;overflow-y:auto;display:block;text-transform:uppercase;" >
                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;border:1.5px solid black;width:100%;" src="/images/companies/byjus.png" alt="BYJU's" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                BYJU's The Learning App
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/tata.jpg" alt="TCS" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                TATA consultancy Services
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/infosys.png" alt="infosys" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                INFOSYS Information technology
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/wipro.png" alt="wipro" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                WIRPO Information technology
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/accenture.png" alt="accenture" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                Accenture Information technology
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/atos.png" alt="atos" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                Atos Syntel
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/capgemini.jpg" alt="capgemini" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                                CAPgemini Information technology
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/ibm.jpg" alt="ibm" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                               IBM technology
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/sankey.png" alt="ibm" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                               SANKEY solutions
                            </span> 
                        </td>
                    </tr>

                    <tr>
                        <td style="width:9%;">
                            <img style="border-radius:50%;background:white;height:6vh;border:1.5px solid black;width:100%;" src="/images/companies/L&T.png" alt="L&T" srcset="">
                        </td>
                        <td style="width:60%;">
                            <span style="font-weight:800;font-size:13px;">
                            Larsen & Toubro
                            </span> 
                        </td>
                    </tr>

                    


                </table>
            </div>
        </div>
    </div>

</div>
<br><br>

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
    

    $(document).ready(function(){
        var cnt = [];
        var lab = [];

        <?php
        foreach($complanywisecount as $cnt){
            ?>
            cnt.push(<?php echo $cnt; ?>);
        <?php
        }
        ?>

        <?php
        foreach($company_name as $cn){
            ?>
            lab.push("<?php echo $cn; ?>");
        <?php
        }
        ?>
        var data = {
            
            labels: lab,
            datasets: [
                {
                    label : "PLACED",
                    data  : cnt,

                    borderColor:'#EB2880',
                    backgroundColor:'rgb(10,14,211,0.4)',
                    opacity:0.4
                }
            ]
        };

        var ctx = $('#companygraph');
        // console.log(ctx);
        var chart = new Chart(ctx, {
            type: 'line',
            data : data,
            options : {}
        });
        console.log(chart);
    });
</script>
@endsection
