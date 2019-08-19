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
