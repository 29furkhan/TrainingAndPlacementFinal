var globaltablesetter=0;

function searchContent(isearchinput,iexporttable)
{
    globaltablesetter=1;
    // console.log('Called');
    if(globaltablesetter==1){
        console.log('Inside');
        var filter, tr, td1,td2, i, txtValue1,txtValue2;
        var esearchinput;
        var eexporttable;
        
        esearchinput=document.getElementById(isearchinput);
        filter = esearchinput.value.toUpperCase();
        eexporttable = document.getElementById(iexporttable);
        console.log(esearchinput);
        console.log(iexporttable);
        tr = eexporttable.getElementsByTagName("tr");
        // console.log(filter);
        
        
        for (i = 0; i < tr.length; i++) {
          td1 = tr[i].getElementsByTagName("td")[4];
          td2 = tr[i].getElementsByTagName("td")[0];
          if (td1 || td2) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            
            if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1) ) {
                console.log("Inside");
              tr[i].style.display = "";
            //   tr[i].style.color = 'red';
              
            } else {
                console.log("Outside");
              tr[i].style.display = "none";
            //   tr[i].style.color = 'black';
            }
          }       
        }
    }
  
}

function searchCompany(ip) {
  // alert('Aaya re');
  var input, filter, table, tr, td, i,alltables;
  alltables = document.querySelectorAll("table[data-name=companytable]");
  input = document.getElementById(ip);
  filter = input.value.toUpperCase();
  alltables.forEach(function(table){
    tr = table.getElementsByTagName("tr");
      for (i = 0; i < 1; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        dd = tr[i].getElementsByTagName("td")[0];
        // alert(dd.innerHTML);
        dd = dd.innerHTML+"Main";
        element = document.getElementById(dd);
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            element.style.display="block";
          } else {
            element.style.display = "none";
          }
        } 
      }      
  });
}

function searchActivity(ip) {
  var input, filter, table, tr, td, i,alltables;
  alltables = document.querySelectorAll("table[data-name=activitytable]");
  input = document.getElementById(ip);
  filter = input.value.toUpperCase();
  alltables.forEach(function(table){
    tr = table.getElementsByTagName("tr");
      for (i = 0; i < 1; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        dd = tr[i].getElementsByTagName("td")[0];
        dd = dd.innerHTML+"Main";
        element = document.getElementById(dd);
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            // alert(td.innerHTML +"Visible");
            element.style.display="block";
          } else {
            // alert(td.innerHTML);
            element.style.display = "none";
          }
        } 
      }      
  });
}


function readCriteria(){
  var criteria = [];
  criteria[0] = document.getElementById('ssccr').value;
  criteria[1] = document.getElementById('hsccr').value;
  criteria[2] = document.getElementById('polycr').value;
  criteria[3] = document.getElementById('cgpacr').value;
  criteria[4] = document.getElementById('percentcr').value;
  criteria[5] = document.getElementById('gapcr').value;

  for(var i =0;i<criteria.length;i++){
    console.log(criteria[i]);
  }
}

function resetCriteria(){
  document.getElementById('ssccr').value="60+ (Including 60%) ";
  document.getElementById('hsccr').value="60+ (Including 60%) ";
  document.getElementById('polycr').value="60+ (Including 60%) ";
  document.getElementById('cgpacr').value="6+ (Including 6.0 CGPA) ";
  document.getElementById('percentcr').value="60+ (Including 60%) ";
  document.getElementById('gapcr').value="No Gap ";
}

