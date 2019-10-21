<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<?php if(isset(Auth::user()->email) && Auth::user()->user_type=='students'): ?>
    <script>
      window.location='/errorUserPage';
    </script>
<?php elseif(!isset(Auth::user()->email)): ?>
    <script>
      window.location='/main';
    </script>
<?php endif; ?>


<?php
use Illuminate\Support\Facades\Input;  
use Barryvdh\Debugbar\Facade as Debugbar;
?>

<?php       
    $year = date('Y');
    $colors = array('white','#f2f2f2');
    $color=$colors[1];
    $var=0;
    $output='';
?>
<!-- PHP for Fetching Students Data -->


<?php $__env->startSection('mainContentTPO'); ?>


    


<script>
var query="select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email";
</script>

            <!-- //     if(data.bit=='1'){
            //         // console.log('Inside 1');
            //         dataset = data.queryresult;
            //         console.log(dataset);
            //         getData(dataset);
            //         // setInputFieldWithQueryResult(dataset);
            //         globaltablesetter=1;
            //         document.getElementById('DataFound').style.display="block";
            //         if(getYear==getBranch){
            //             // Branch and Year is all
            //             query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email';
            //             document.getElementById('DataFoundMsg').innerHTML="Data of all branches of all years";  
            //         }
            //         else if(getYear=='all' && getBranch!='all'){
            //             // Branch not all but year all
            //             query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and Branch=?';
            //             document.getElementById('DataFoundMsg').innerHTML="Data of " +getBranch +' of all Years';
            //         }
            //         else if(getBranch=='all' && getYear!='all'){
            //             //branch all but year not all
            //             query = 'select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and Passout_Year=?';
            //             document.getElementById('DataFoundMsg').innerHTML="Data of all branches of year " +getYear;
            //         }
            //         else{
            //             //Branch and year are selected from dropdown
            //             query = "select distinct * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd where sp.Email = sa.Email and sp.Email = pd.Email and Branch=? and Passout_Year=?";
            //             document.getElementById('DataFoundMsg').innerHTML="Data of " +getBranch+' '+getYear+' Batch';
            //         }
            //         document.getElementById('searchdiv').style.display="block";
            //         document.getElementById('maincards').style.display="flex";
            //         document.getElementById('downloadbutton').style.display='block';
            //         document.getElementById('filters').style.display="block";
            //         document.getElementById('NoDataFound').style.display='none';
                   
            //     }
            //     else{
            //         document.getElementById('NoDataFound').style.display='block';
            //         document.getElementById('NoDataFoundMsg').innerHTML = 'Sorry!!! No Data Found For ' +getBranch+' '+getYear +' Batch';
            //         globaltablesetter=0;
            //         document.getElementById('searchdiv').style.display="none";
            //         document.getElementById('maincards').style.display="none";
            //         document.getElementById('downloadbutton').style.display='none';
            //         document.getElementById('filters').style.display="none";
            //         document.getElementById('DataFound').style.display="none";
                    
            //     }
            // } -->

<script>
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
<form id="exportform">
<?php echo csrf_field(); ?>
<div class="" style="display:flex;flex-wrap:wrap;">
    <!-- DropDown For Passing YEar -->
    <div>
        <div style="display:flex;flex-direction:column;justify-content:space-between;">
            <b style="font-weight:550;font-size:16px;">Passout Year</b>
            <select onMouseOver="hoverData(id);" onMouseOut="this.style.background='white'" id='passyear' onmousedown="expand(id);" onblur="shrink(id)" onchange="shrink(id)" style="cursor:pointer;margin-right:30px;height:40px;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;margin-top:5px;width:97px;font-weight:100;font-size:15px;border-radius:4px;background-color:#FFFFFF;">
                <option value='all' selected>All Years</option>
                <option value='<?php echo $year+1;?>'><?php echo $year+1;?></option>
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
            <option value='all' selected>All Branches</option>
            <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($br->branch); ?>"><?php echo e($br->branch); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- <option value="MECH" >Mechanical Engineering</option>
            <option value="CIVIL" >Civil Engineering</option>
            <option value="ETC">Electronics And Telecommunications</option>
            <option value="IT" >Information Technology</option> -->

            </select>
        </div>
    </div>    

    <!-- Show Button -->
    <div>
        <div style="margin-right:30px;display:flex;flex-wrap:wrap;flex-direction:column;justify-content:space-between;">
            <b>&nbsp&nbsp&nbsp</b>
            <button id="show" onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" type="submit" name="show" style="border-radius:4px;color:white;border:2px solid white;margin-top:7px;font-weight:550;font-size:15px;background-color:rgb(100,179,231);box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:87.69px;height:42px;">SHOW</button>
        </div>
    </div>
    
    <script>

        function getData(){
            // alert('Called');
            var getYear,getBranch;
            var getYear = document.getElementById('passyear').value;
            var getBranch = document.getElementById('branch').value;

            if(getYear=='all'){
                if(getBranch=='all')
                    query="select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email";
                else
                    query="select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and sp.branch ='"+getBranch+"'";
            }// Outer if for year==all    
            else if(getBranch=='all'){
                if(getYear=='all'){
                    query="select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email";  
                }
                else{
                    query="select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and sp.Passout_Year ='"+getYear+"'";
                }
            }// Outer Else if close branch==all
            else{
                query="select * from student_profile sp INNER JOIN student_academics sa INNER JOIN placement_details pd ON sp.Email = sa.Email and sp.Email = pd.Email and sp.Passout_Year ='"+getYear+"'"+" and sp.Branch='"+getBranch+"'";  
            }

            document.getElementById('hiddenquery').value=query;
            // console.log(query + ' and Branch like "Mechanical%" ');
            return true;
        }

    </script>

    <!-- Filter Button -->
    <div id="filters" style="margin-right:30px;display:block;"class="">
        <div id="innerfilter" style="display:none;flex-wrap:wrap;flex-direction:column;justify-content:space-between;">
            <b>&nbsp&nbsp&nbsp</b>
            <button data-toggle="modal" data-target="#myModal" id="filterbtn" onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" type="button" name="show" style="border-radius:4px;color:white;border:2px solid white;margin-top:7px;font-weight:550;font-size:15px;background-color:rgb(100,179,231);box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:100px;height:42px;"><span><i class="fa fa-filter"></i>&nbsp&nbspFILTERS</span></button>
        </div>
    </div>
    <!-- Filter Ends --> 
    

</form>

<!-- Download Button -->
<div id='downloadbutton' style="display:none;">
        <div style="margin-right:30px;display:flex;flex-wrap:wrap;flex-direction:column;justify-content:space-between;">
            <b>&nbsp&nbsp&nbsp</b>
            <form onsubmit="return getData();" id='downloadformdata' method='POST' action='/php/export'>
            <?php echo csrf_field(); ?>
                <input name='hiddenquery' style='display:none;' type="text" name='hiddenquery' id='hiddenquery'/> 
                <button id='downloadbutton' onMouseOver="this.style.background='rgb(40,169,231)'" onMouseOut="this.style.background='rgb(100,179,231)'" style="border-radius:4px;color:white;border:2px solid white;margin-top:7px;font-weight:550;font-size:15px;background-color:rgb(100,179,231);box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:auto;height:42px;" type='submit' name='submit ' class="download" value='DOWNLOAD'><i style="font-size:20px;" class="fa fa-download" aria-hidden="true"></i></button>
            </form>
        </div>
</div>

	

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

<div class="alert alert-danger" id="NoDataFound" style="display:none;">
    <div id="NoDataFoundMsg" style="font-size:20px;color:rgb(100,179,231);font-weight:600%;">
        Sorry!!No Data Found
    </div>
</div>


<!-- New Row 2 -->

<div class='alert alert-danger' id='NoDataFound' style="display:none;">
    <h4 id='NoDataFoundMsg' style="color:rgb(100,179,231);">No Data Found</h4>
</div>

<div id='DataFound' style="display:none;">
    <h4 id='DataFoundMsg' style="color:rgb(100,179,231);">Data For Branch And Passout Year</h3>
</div>
                     
<div id="maincards" class="maincards" style="display:none;margin-right:10px;display:block;flex-wrap:wrap;">
    <div id='actualcard' class="card" style="display:none;border-radius:8px;width:100%;height:auto;max-height:50vh;overflow-y:auto;">
        <div class="card-body">
            <div id="tablecontent" style="overflow-x:auto;overflow-y:auto;white-space:nowrap;border-radius:4px;">
                <table id="exportstudentstable"> 
                    <tr id='demo2' style="text-transform:uppercase;background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);color:white;">
                        <th scope="col">CASERP ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Class</th>
                        <th scope="col">Name</th>
                        <th scope="col">SSC Marks</th>
                        <th scope="col">HSC Marks</th>
                        <th scope="col">Polytechnic Marks</th>
                        <th scope="col">First Year CGPA</th>
                        <th scope="col">Second Year CHPA</th>
                        <th scope="col">Third Year CGPA</th>
                        <th scope="col">First Year Percentage</th>
                        <th scope="col">Second Year Percentage</th>
                        <th scope="col">Third Year Percentage</th>
                        <th scope="col">Overall Academic Gap</th> 
                        <th scope="col">Placement Status</th> 
                        <th scope="col">Company Name</th> 
                        <th scope="col">Package</th> 
                    </tr>   
                    <script> 
                        var hoverflag=0;
                        var getYear,getBranch;
                        $(document).ready(function(){
                            
                            $('#exportform').on('submit',function(e){
                                e.preventDefault();
                                var getYear = document.getElementById('passyear').value;
                                var getBranch = document.getElementById('branch').value;
                                var msg="";
                                // alert(getYear + getBranch);
                                $.ajax({
                                     url:'/php/sendyearandbranch',
                                     type:'GET',
                                //     dataTye:'json',
                                     data:{year:getYear,branch:getBranch},
                                     success:function(data){
                                        if(data.databit=='1'){
                                            globalsetter = 1;
                                            document.getElementById('NoDataFound').style.display='none';
                                            document.getElementById('searchdiv').style.display="block";
                                            document.getElementById('maincards').style.display="block";
                                            document.getElementById('downloadbutton').style.display='block';
                                            document.getElementById('filters').style.display="block";
                                            
                                            document.getElementById('actualcard').style.display="block";
                                            document.getElementById('searchdiv').style.display="block";
                                            document.getElementById('downloadbutton').style.display="flex";
                                            document.getElementById('innerfilter').style.display="flex";
                                            
                                            $("#exportstudentstable").find("tr:gt(0)").remove();
                                            table = document.getElementById('exportstudentstable');
                                            
                                            cell = []
                                            color = ['white','#f2f2f2'];
                                            var index = 0
                                            
                                            var datajson = JSON.parse(data.studentsjson);
                                            
                                            for(var i=0;i<datajson.length;i++){
                                                
                                                row = table.insertRow(i+1);
                                                col = color[index];
                                                
                                                if(index){
                                                    index=0;
                                                }
                                                else{
                                                    index=1;
                                                }

                                                row.style.background=col; 
                                                
                                                for(var j=0;j<18;j++){
                                                    
                                                    cell[j] = row.insertCell(j);
                                                }
                                                
                                                cell[0].innerHTML = datajson[i].CASERP_ID;
                                                cell[1].innerHTML = datajson[i].Email;
                                                cell[2].innerHTML = datajson[i].Branch;
                                                cell[3].innerHTML = datajson[i].Class;
                                                cell[4].innerHTML = datajson[i].First_Name + ' ' + datajson[i].Middle_Name+" "+
                                                                    datajson[i].Last_Name;
                                                cell[5].innerHTML = datajson[i].SSC;
                                                cell[6].innerHTML = datajson[i].HSC;
                                                cell[7].innerHTML = datajson[i].Poly;
                                                cell[8].innerHTML = datajson[i].FE_CGPA;
                                                cell[9].innerHTML = datajson[i].SE_CGPA;
                                                cell[10].innerHTML = datajson[i].TE_CGPA;
                                                cell[11].innerHTML = datajson[i].FE_PERCENT;
                                                cell[12].innerHTML = datajson[i].SE_PERCENT;
                                                cell[13].innerHTML = datajson[i].TE_PERCENT;
                                                cell[14].innerHTML = datajson[i].Overall_Gap;
                                                cell[15].innerHTML = datajson[i].Placement_Status;
                                                cell[16].innerHTML = datajson[i].Company_Name;
                                                cell[17].innerHTML = datajson[i].Package;
                                                cell = [];
                                            }
                                        } // End if
                                        else{
                                            document.getElementById('NoDataFound').style.display='block';
                                            if(getYear=='all')
                                            {
                                               if(getBranch=='all')
                                                    msg = 'Sorry!!! No Data Found';
                                                else
                                                    msg = 'Sorry!!! No Data For ' +getBranch;
                                            }
                                            else if(getBranch=='all'){
                                                if(getYear=='all')
                                                    msg = 'Sorry!!! No Data Found';
                                                else
                                                    msg = 'Sorry!!! No Data Found For Batch '+getYear ;
                                            }
                                            else{
                                                msg="Sorry!!! No Data Found For Branch "+getBranch+' '+getYear;
                                            }
                                            document.getElementById('NoDataFoundMsg').innerHTML = msg;
                                            globaltablesetter=0;
                                            document.getElementById('searchdiv').style.display="none";
                                            document.getElementById('maincards').style.display="none";
                                            document.getElementById('downloadbutton').style.display='none';
                                            document.getElementById('filters').style.display="none";
                                            document.getElementById('actualcard').style.display="none";
                                            document.getElementById('searchdiv').style.display="none";
                                            document.getElementById('downloadbutton').style.display="none";
                                            document.getElementById('innerfilter').style.display="none";
                                            
                                            // document.getElementById('DataFound').style.display="none";
                                        }
                                    } // End Success
                                }); // End AJAX
                            }); // End on submit
                        }); // End Jquery
                    </script>
            </table>
         </div>      
      </div>
    </div>
</div>
<!-- End of Row 2 -->
<br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.TPO.commonHeaderTPO', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Furkhan\XAMPP\htdocs\TPO\resources\views/Pages/TPO/exportStudentsData.blade.php ENDPATH**/ ?>