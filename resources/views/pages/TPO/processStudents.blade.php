<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>

<script>
  var globalstatus = 0;
  var globalsearchactive = 0;
</script>

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

<!-- BreadCrumb -->
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
                            <b style="font-weight:500;">Process Data</b>
                        </li>
                    </ul>
                </div>
</div>

<!-- Search Box Start -->
<div class="row" style="justify-content:flex-end;margin-right:3px;">
  <div id="searchprocess" class="col-lg-4 col-sm-4 col-md-4">
      <div class="">
        <div class="search" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;">
          <input id="processsearch" onclick ='setGlobalSearchActive();' onblur = setGlobalSearchDeactive(); style="border-radius:5px 0 0 5px;" type="text"   class="searchTerm"   placeholder="Search By Name or CASERP ID">
            <a href="javascript:void(0);" id="processbutton" class="fa fa-search" style="background:white;cursor:pointer;text-decoration:none;padding:5px;border-radius:0 5px 5px 0;font-size:20px;color: rgb(100,179,231);">
            </a>
        </div>
    </div>
  </div>
</div>
<!-- Search Box End -->

<br>
<div id='rowstudenttable' class="row" style="display:none;white-space:nowrap;">
  <div class="col-lg-12 col-md-12" style="white-space:nowrap;">
    <div class="card" style="white-space:nowrap;box-shadow:0 .1rem 1rem rgba(0,0,0,.15)!important;">
        <div class="card-body" style="white-space:nowrap;overflow:auto;">
          <table id='processtable' style="font-size:14px;overflow-x:auto;white-space:nowrap;"> 
            <tr style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);color:white;text-transform:uppercase;">
            <th>Action</th>      
            <th>Email</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Class</th>
            <th>Placement Status</th>
            <th>Company Name</th>
            <th>Package (or Fund)</th>
            
            </tr>
          </table>
        </div>
    </div>
  </div>
</div>

<!-- Modal To Edit Data -->
<div class="modal fade" id="editplacement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);color:#fff;">
        <h5 id='modaltitle' class="modal-title" style="font-weight:600;text-transform:uppercase;">Edit Placement Status of Furkhan</h5>
        <button style="color:#fff;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div style="margin-bottom:20px;">
          <b> EMAIL </b>
          <input id='emailtext' class="form-control" type="text" value="29furkhanshaikh@gmail.com" disabled/>
        </div>

        <div style="margin-bottom:20px;">
          <b> NAME </b>
          <input id='nametext' class="form-control" type="text" value="Furkhan Mujibodden Shaikh" disabled/>
        </div>

        <div style="margin-bottom:20px;">
          <b> BRANCH </b>
          <input id='branchtext' class="form-control" type="text" value="Computer Science And Engineering" disabled/>
        </div>

        <div style="margin-bottom:20px;">
          <b> CLASS </b>
          <input id='classtext' class="form-control" type="text" value="BECSEII" disabled/>
        </div>

        <div style="margin-bottom:20px;"> 
          <b> PLACEMENT STATUS </b>
          <select onchange="turnOnPlacement();" id="placement_status" style="cursor:pointer;margin-right:30px;height:40px;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;width:100%;font-weight:100;font-size:15px;border-radius:4px;background-color:#FFFFFF;">
            <option selected disabled>Select</option>       
            <option value='Placed'>Placed</option>
            <option value='Not Placed'>Not Placed</option>
            <option value='Entrepreneur'>Entrepreneur</option>
          </select>
        </div>

          <div id="company" style="margin-bottom:20px;display:none;">
            <b> COMPANY </b>
            <input id="companytext" class="form-control" type="text" value="" placeholder='Ex. TCS'/>
          </div>

          <div id="package" style="margin-bottom:20px;display:none;">
            <b> PACKAGE (OR FUND) </b>
            <input id="packagetext" class="form-control" type="text" value="" placeholder='Ex. 3.36 LPA'/>
          </div>

          <div id='error_message' style='display:none;'>
            <p style='margin-top:20px;color:red;'>*The Company Name And Package Required</p>
          </div>
        
      </div> 
      <!-- Body Ends -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button id='savechanges' onclick="savechanges();" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> 
<!-- Modal Ends -->



<script>

  function setGlobalSearchActive(){
    globalsearchactive = 1;
  }

  function setGlobalSearchDeactive(){
    globalsearchactive = 0;
  }

  function updatePlacementStatus1(status,company,package){
    var email = $('#emailtext').val();
    $.ajax({
      url : '/php/insert/updatestudent',
      type: 'GET',
      data:{email:email,status:status,company:company,package:package},
      success:function(){
        location.reload();
      }
    });
  }

  function updatePlacementStatus2(status,company,package){
    var email = $('#emailtext').val();
    $.ajax({
      url : '/php/insert/updatestudent',
      type: 'GET',
      data:{email:email,status:status,company:company,package:package},
      success:function(){
        location.reload();
      }
    });
  }



  function savechanges(){
    var status = document.getElementById('placement_status').value;
    if(globalstatus==1){
      document.getElementById('placement_status').value;
      var company = document.getElementById('companytext').value;
      var package = document.getElementById('packagetext').value;
      
      if(status!='Not Placed')
        if(company!='' && package!=''){  
          updatePlacementStatus1(status,company,package);
          $('#editplacement').modal('toggle');
        }
        else{
          document.getElementById('error_message').style.display='block';
        }
        else{
        // alert('submitted else');
        updatePlacementStatus2(status,"Null","0");
        $('#editplacement').modal('toggle');
      }
    }
  }

  function processModal(email,name,branch,class_){
    globalstatus = 0;
    $('#editplacement').modal('show');
    $('#modaltitle').html('Edit Placement Status of' +' '+email);
    $('#emailtext').val(email);
    $('#nametext').val(name);
    $('#branchtext').val(branch);
    $('#classtext').val(class_);

  }

  $(document).ready(function(){
    table = document.getElementById('processtable');
    cell = []
    color = ['white','#f2f2f2'];
    var index = 0;
    // Enter Key
    $(document).keypress(function(event){
      // alert(globalsearchactive);
      if(event.keyCode == 13){
        // alert('fuki');
        $('#processbutton').click();
      }
    });

    $('#processbutton').click(function(){
      $('#rowstudenttable').show();
      $("#processtable").find("tr:gt(0)").remove();
      var processsearch = $('#processsearch').val();
      var _token = $('input[name="_token"]').val();
      var data;
      $.ajax({
        url:"/php/insert/searchstudent",
        method:"GET",
        data:{processsearch:processsearch,_token:_token},
        success:function(result){
            if(result.bit=='1'){
              data = JSON.parse(result.success);
              for(var i=0;i<data.length;i++){
                
                row = table.insertRow(i+1);
                col = color[index];
                if(index){
                  index=0;
                }
                else{
                  index=1;
                }
                
                row.style.background=col; 

                for(var j=0;j<8;j++){
                  cell[j] = row.insertCell(j);
                }
                cell[1].innerHTML = data[i].Email;
                email = cell[1].innerHTML;
                cell[2].innerHTML = data[i].First_Name +' '+data[i].Middle_Name+' '+data[i].Last_Name ;
                name = cell[2].innerHTML;
                cell[3].innerHTML = data[i].Branch;
                branch = cell[3].innerHTML;
                cell[4].innerHTML = data[i].Class;
                class_ = cell[4].innerHTML;
                cell[5].innerHTML = data[i].Placement_Status;
                cell[6].innerHTML = data[i].Company_Name;
                cell[7].innerHTML = data[i].Package;
                cell[0].innerHTML = '<button data-toggle="modal" onclick="processModal(\''+email+'\',\''+name+'\',\''+branch+'\',\''+class_+'\');" class="btn btn-primary" style="background:linear-gradient(to right top, #726bd1, #5087e3, #2f9fec, #2db5ed, #4fc8eb, #41c9f0, #2dcbf4, #00ccf9, #00baff, #00a4ff, #4587ff, #935ffb);border:1px solid white;"><i class="fa fa-pencil" style="font-size:18px"></i></button>';

                cell = [];                  
                // console.log(data[i].Email);
              }
            }
            else{
              alert(result.success);
              // globalsearchactive=1;
            }
          }
      });
    });

});


  function turnOnPlacement(){
    globalstatus = 1;
    // console.log('jasnk');
    var status = document.getElementById('placement_status').value;
    // alert(status);
    if(status=='Placed' || status=='Entrepreneur' ){
      document.getElementById('company').style.display="block";
      document.getElementById('package').style.display="block";
    }
    else 
      turnOffPlacement();
  }

  function turnOffPlacement(){
    // alert('called');
    // var status = document.getElementById('placement_status').value
    document.getElementById('company').style.display="none";
    document.getElementById('package').style.display="none";
  }

</script>

@endsection
