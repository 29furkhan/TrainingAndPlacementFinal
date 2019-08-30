<?php
use Illuminate\Support\Facades\Input;  
?>

<?php       
    $year = date('Y');
    $colors = array('white','#f2f2f2');
    $color=$colors[1];
    $var=0;
?>

@extends('layouts.TPO.commonHeaderTPO')
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
        if(element.options.length>4)
        {
            // console.log('inside if');
            element.size=3;
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

<script>
    // console.log("Inside Script");

    // JQUERY FOR SSC
    $(document).ready(function(){
        // console.log('ready');
        $('#ssccr').change(function(){
            // console.log('Inside');
            if($(this).val()=="customssc")
            {
                // console.log('Inside IF');
                $('#customssctxtdiv').show();
            }
            else
            {
                // console.log('Inside Else');
                $('#customssctxtdiv').hide();
            }
        });
    });

    // JQUERY FOR HSC
    $(document).ready(function(){
        // console.log('ready');
        $('#hsccr').change(function(){
            // console.log('Inside');
            if($(this).val()=="customhsc")
            {
                // console.log('Inside IF');
                $('#customhsctxtdiv').show();
            }
            else
            {
                // console.log('Inside Else');
                $('#customhsctxtdiv').hide();
            }
        });
    });
    
    // JQUERY FOR POLY
    $(document).ready(function(){
        // console.log('ready');
        $('#polycr').change(function(){
            // console.log('Inside');
            if($(this).val()=="custompoly")
            {
                // console.log('Inside IF');
                $('#custompolytxtdiv').show();
            }
            else
            {
                // console.log('Inside Else');
                $('#custompolytxtdiv').hide();
            }
        });
    });

    // JQUERY FOR CGPA
    $(document).ready(function(){
        // console.log('ready');
        $('#cgpacr').change(function(){
            // console.log('Inside');
            if($(this).val()=="customcgpa")
            {
                // console.log('Inside IF');
                $('#customcgpatxtdiv').show();
            }
            else
            {
                $('#customcgpatxtdiv').hide();
            }
        });
    });
    
    // JQUERY FOR PERCENT
    $(document).ready(function(){
        // console.log('ready');
        $('#percentcr').change(function(){
            // console.log('Inside');
            if($(this).val()=="custompercent")
            {
                // console.log('Inside IF');
                $('#custompercenttxtdiv').show();
            }
            else
            {
                $('#custompercenttxtdiv').hide();
            }
        });
    });

    // JQUERY FOR GAP
    $(document).ready(function(){
        // console.log('ready');
        $('#gapcr').change(function(){
            // console.log('Inside');
            if($(this).val()=="customgap")
            {
                // console.log('Inside IF');
                $('#customgaptxtdiv').show();
            }
            else
            {
                $('#customgaptxtdiv').hide();
            }
        });
    });
    
    
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
            <select onMouseOver="hoverData(id);" onMouseOut="this.style.background='white'" id='branch' onmousedown="expand(id);" onblur="shrink(id)" onchange="shrink(id)" style="cursor:pointer;margin-right:30px;height:40px;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-top:5px;width:277px;font-weight:100;font-size:15px;border-radius:4px;background-color:#FFFFFF;">
            <option selected>Computer Science And Engineering</option>
            <option>Mechanical Engineering</option>
            <option>Civil Engineering</option>
            <option>Electronics And Telecommunications</option>
            <option>Information Technology</option>

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
            <button data-toggle="modal" data-target="#myModal" id="filterbtn" onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" type="button" name="show" style="border-radius:4px;color:white;border:2px solid white;margin-top:7px;font-weight:550;font-size:15px;background-color:rgb(100,179,231);box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:100px;height:42px;"><span><i class="fa fa-filter"></i>&nbsp&nbspFILTERS</span></button>
        </div>
    </div>
    <!-- Filter Ends --> 

<!-- Modal For Filters-->
	<div class="modal right fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog">
			<div class="modal-content">

				<div style="display:block;" class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Filter Students</h4>
				</div>

				<div class="modal-body">
                <form action="filters.php" method="POST">
                    <label>SSC Criteria</label>
                        <select id="ssccr" style="margin-bottom:20px;" class="form-control">
                            <option selected value='60+ (Including 60%) '>60+ (Including 60%) </option>
                            <option value = "70+ (Including 70%) " >70+ (Including 70%)</option>
                            <option value = "80+ (Including 70%) ">80+ (Including 80%)</option>
                            <option value = "No Criteria ">No Criteria</option>
                            <option value='customssc'>Custom Criteria</option>
                        </select>

                    <div id="customssctxtdiv" style="display:none;" class="form-group">
                        <label>Enter SSC Criteria:</label>
                        <input placeholder="Ex. 60 " type="text" class="form-control" id="customssctxt" required>
                    </div>

                    <label>HSC Criteria</label>
                        <select id="hsccr" style="margin-bottom:20px;" class="form-control">
                            <option selected value='60+ (Including 60%) '>60+ (Including 60%) </option>
                            <option value = "70+ (Including 70%) " >70+ (Including 70%)</option>
                            <option value = "80+ (Including 70%) ">80+ (Including 80%)</option>
                            <option value = "No Criteria ">No Criteria</option>
                            <option value='customhsc'>Custom Criteria</option>
                        </select>

                    <div id="customhsctxtdiv" style="display:none;" class="form-group">
                        <label>Enter HSC Criteria:</label>
                        <input type="text" class="form-control" id="customhsctxt" required>
                    </div>


                    <label>Polytechnic Criteria</label>
                        <select id="polycr" style="margin-bottom:20px;"  class="form-control">
                            <option selected value='60+ (Including 60%) '>60+ (Including 60%) </option>
                            <option value = "70+ (Including 70%) " >70+ (Including 70%)</option>
                            <option value = "80+ (Including 70%) ">80+ (Including 80%)</option>
                            <option value = "No Criteria ">No Criteria</option>
                            <option value='custompoly'>Custom Criteria</option>
                        </select>

                    <div id="custompolytxtdiv" style="display:none;" class="form-group">
                        <label>Enter Polytechnic Criteria:</label>
                        <input type="text" class="form-control" id="custompolytxt" required>
                    </div>


                    <label>Overall CGPA Criteria (Engg) </label>
                        <select id="cgpacr" style="margin-bottom:20px;"  class="form-control">
                            <option selected value='6+ (Including 6.0 CGPA) '>6+ (Including 6.0 CGPA) </option>
                            <option value = "7+ (Including 7.0 CGPA) " >7+ (Including 7.0 CGPA)</option>
                            <option value = "8+ (Including 8.0 CGPA) ">8+ (Including 8.0 CGPA)</option>
                            <option value = "No Criteria ">No Criteria</option>
                            <option value='customcgpa'>Custom Criteria</option>
                        </select>

                    <div id="customcgpatxtdiv" style="display:none;" class="form-group">
                        <label>Enter CGPA Criteria:</label>
                        <input type="text" class="form-control" id="customcgpatxt" required>
                    </div>


                    <label>Overall Percentage Crieria (Engg)</label>
                        <select id="percentcr" style="margin-bottom:20px;" class="form-control">
                            <option selected value='60+ (Including 60%) '>60+ (Including 60%) </option>
                            <option value = "70+ (Including 70%) " >70+ (Including 70%)</option>
                            <option value = "80+ (Including 70%) ">80+ (Including 80%)</option>
                            <option value = "No Criteria ">No Criteria</option>
                            <option value='custompercent'>Custom Criteria</option>
                        </select>

                    <div id="custompercenttxtdiv" style="display:none;" class="form-group">
                        <label>Enter Percentage Criteria:</label>
                        <input type="text" class="form-control" id="custompercenttxt" required>
                    </div>

                    
                    <label>Overall Academic Gap</label>
                        <select id="gapcr" style="margin-bottom:20px;" class="form-control">
                            <option selected value='No Gap '>No Gap </option>
                            <option value = "1 Year">1 Year</option>
                            <option value = "No Criteria">No Criteria</option>
                            <option value='customgap'>Custom Gap</option>
                        </select>

                    <div id="customgaptxtdiv" style="display:none;" class="form-group">
                        <label>Enter Gap Criteria:</label>
                        <input type="text" class="form-control" id="customgaptxt" required>
                    </div>



                    <input value="Apply" type="submit" id="apply" class="btn btn-info"   onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" style="margin-right:10%;width:30%;height:40px;color:white;background-color:rgb(100,179,231);font-weight:500;"/>
                    <input value="Reset" type="button" id="reset" class="btn btn-info"  onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" style="background-color:rgb(100,179,231);width:30%;height:40px;color:white;font-weight:500;"/>
                </form>       
                </div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	


</div>
<!-- End of One Row  -->

<br>
<!-- New Row 2 -->
<div id="maincards" class="maincards" style="margin-right:10px;display:none;flex-wrap:wrap;">
    <div class="card" style="border-radius:8px;width:100%;height:auto">
        <div class="card-body">
            <div id="tablecontent" style="overflow-x:auto;white-space:nowrap;border-radius:4px;">
                @include('studentsDataTable')
            <!-- Avoid Page Refresh on Pagination -->
            <!-- <script>
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
            </script> -->

        </div>      
      </div>
    </div>
</div>
<!-- End of Row 2 -->
@endsection