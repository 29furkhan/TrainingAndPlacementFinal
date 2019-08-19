<?php
use Illuminate\Support\Facades\Input;  
?>

<?php       
    $year = date('Y');
    $colors = array('white','#f2f2f2');
    $color=$colors[1];
    $var=0;
?>

@extends('layouts.commonHeaderTPO')
@section('mainContentTPO')


<script>
    var hoverflag=0;

    function showCards(id)
    {
        globaltablesetter=1;
        document.getElementById('searchdiv').style.display="block";
        document.getElementById('maincards').style.display="flex";
        document.getElementById('filters').style.display="block";
    }

    function expand(id)
    {
        element = document.getElementById(id);
        if(element.options.length>5)
        {
            // console.log('inside if');
            element.size=5;
            element.style.height="100px";
            element.style.background='white';
            hoverflag=1;
        }
    }

    function hoverData(id){
        if(hoverflag==0){
            // console.log('inside');
            document.getElementById(id).style.background='#E8E8E8';
            hoverflag = 0;
        }
    }

    function shrink(id)
    {
        element = document.getElementById(id);
        element.size=0;
        element.style.height="40px";
        hoverflag=0;
        
    }

   
</script>

<div class="row">
                <div class="col-lg-12" style="margin-top:65px;">
                    <h3 class="page-header" style="opacity:0.2;">
                        <i style="font-size:30px;" class="fa fa-user"></i>
                        &nbsp&nbspStudents
                    </h3>
                    <ul class="breadcrumb" style="width:99%;border-radius:5px;">
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-home"></i>
                            <a style="outline:0;text-decoration:none;outline:none;" href="/dashboard">
                            &nbspHome</a>
                        </li>

                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-user"></i>
                            &nbsp
                            <b style="font-weight:500;">Students</b>
                        </li>
                        
                        
                        <li style="font-size:15px;">
                            <i style="opacity:0.2;" class="fa fa-file"></i>
                            &nbsp
                            <b style="font-weight:500;">Export Data</b>
                        </li>
                    </ul>
                </div>
</div>

<!-- Drop Downs -->
<div class="" style="display:flex;flex-wrap:wrap;">
    <!-- DropDown For Passing YEar -->
    <div>
        <div style="display:flex;flex-direction:column;justify-content:space-between;">
            <b style="font-weight:550;font-size:16px;">Passout Year</b>
            <select onMouseOver="hoverData(id);" onMouseOut="this.style.background='white'" id='passyear' onmousedown="expand(id);" onblur="shrink(id)" onchange="shrink(id)" style="cursor:pointer;margin-right:30px;height:40px;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-top:5px;width:97px;font-weight:100;font-size:15px;border-radius:4px;background-color:#FFFFFF;">
                <option selected><?php echo $year+1;?></option>
                <?php
                   for($i=date('Y');$i>2014;$i--){
                    echo "<option>".$i."</option>";
                   } 
                ?>                
            </select>
        </div>
    </div>

    <!-- DropDown For Branch -->
    <div>
        <div style="display:flex;flex-direction:column;justify-content:space-between;">
            <b style="font-weight:550;font-size:16px;">Branch</b>
            <select onMouseOver="hoverData(id);" onMouseOut="this.style.background='white'" id='branch' onmousedown="expand(id);" onblur="shrink(id)" onchange="shrink(id)" style="cursor:pointer;margin-right:30px;height:40px;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-top:5px;width:180px;font-weight:100;font-size:15px;border-radius:4px;background-color:#FFFFFF;">
            <option selected></option>

            </select>
        </div>
    </div>    

    <!-- Show Button -->
    <div class="">
        <div style="margin-right:30px;display:flex;flex-wrap:wrap;flex-direction:column;justify-content:space-between;">
            <b>&nbsp&nbsp&nbsp</b>
            <button id="show" onclick="showCards()" onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" type="button" name="show" style="border-radius:4px;color:white;border:2px solid white;margin-top:7px;font-weight:550;font-size:15px;background-color:rgb(100,179,231);box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:87.69px;height:42px;">SHOW</button>
        </div>
    </div>

    <!-- Filter Button -->
    <div id="filters" style="margin-right:30px;display:none;"class="">
        <div style="display:flex;flex-wrap:wrap;flex-direction:column;justify-content:space-between;">
            <b>&nbsp&nbsp&nbsp</b>
            <button data-toggle="modal" data-target="#studentfilters" id="filterbtn" onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" type="button" name="show" style="border-radius:4px;color:white;border:2px solid white;margin-top:7px;font-weight:550;font-size:15px;background-color:rgb(100,179,231);box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:100px;height:42px;"><span><i class="fa fa-filter"></i>&nbsp&nbspFILTERS</span></button>
        </div>
    </div>
    <!-- Filter Ends -->

    


</div>
<!-- End of One Row  -->

<br>
<!-- New Row 2 -->
<div id="maincards" class="maincards" style="display:none;flex-wrap:wrap;">
    <div class="card" style="border-radius:8px;width:100%;height:auto">
        <div class="card-body">
            <div id="tablecontent" style="overflow-x:auto;white-space:nowrap;border-radius:4px;">
                @include('studentsDataTable')
            <!-- Avoid Page Refresh on Pagination -->
            <script>
                $(document).ready(function(){
                    $(document).on('click','.pagination a',function(e){
                        e.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];
                        fetch_data(page);
                    });

                    function fetch_data(page){
                        $.ajax({
                            url:'/export/fetch_data?page='+page,
                            success: function(data){
                                $('#tablecontent').html(data);
                            }
                        });
                    }

                });                
            </script>

        </div>      
      </div>
    </div>
</div>
<!-- End of Row 2 -->
@endsection