var globaltablesetter=0;

function searchContent(isearchinput,iexporttable)
{
    if(globaltablesetter==1){
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
          td1 = tr[i].getElementsByTagName("td")[2];
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

function loginCredits(){
  var name='Furkhan';
  var age=20;
  // console.log('I am Executed');
  $.ajax({
    type: 'post',
    data:
    {
      'Name':name,
      'Age':age
    },
    url: '/php/hello.php',
    success: function(data,status) {
        console.log(data);
    },
    error: function(){
      console.log('Error');
    }
});
}
