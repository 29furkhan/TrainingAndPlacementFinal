<?php
$colors = array('white','#f2f2f2');
$color=$colors[1];
$i=0;
?>


<table id="exportstudentstable"> 
                    <tr style="text-transform:uppercase;background:rgb(100,179,231);color:white;">
                        <th scope="col">Name</th>
                        <th scope="col">Branch</th>
                        <th scope="col">CASERP ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roll_No</th>
                        <th scope="col">Class</th>
                        <th scope="col">SSC Marks</th>
                        <th scope="col">HSC Marks</th>
                        <th scope="col">Polytechnic Marks</th>
                        <th scope="col">First Year CGPA</th>
                        <th scope="col">Second Year CHPA</th>
                        <th scope="col">Third Year CGPA</th>
                        <th scope="col">First Year Percentage</th>
                        <th scope="col">Secon Year Percentage</th>
                        <th scope="col">Third Year Percentage</th>
                        <th scope="col">Overall Academic Gap</th> 
                

                    </tr>
                    
                    @foreach($table_rows as $table_row)    
                    <tr class="datahover" style="background:<?php echo $color?>">
                        <td scope="col">{{$table_row->Full_Name}}</td>
                        <td scope="col">{{$table_row->Branch}}</td>
                        <td scope="col">{{$table_row->CASERP_ID}}</td>
                        <td scope="col">{{$table_row->Email}}</td>
                        <td scope="col">{{$table_row->Roll_No}}</td>
                        <td scope="col">{{$table_row->Class}}</td>
                        <td scope="col">{{$table_row->SSC}}</td>
                        <td scope="col">{{$table_row->HSC}}</td>
                        <td scope="col">{{$table_row->Polytechnic}}</td>
                        <td scope="col">{{$table_row->FE_CGPA}}</td>
                        <td scope="col">{{$table_row->SE_CGPA}}</td>
                        <td scope="col">{{$table_row->TE_CGPA}}</td>
                        <td scope="col">{{$table_row->FE_PERCENT}}</td>
                        <td scope="col">{{$table_row->SE_PERCENT}}</td>
                        <td scope="col">{{$table_row->TE_PERCENT}}</td>
                        <td scope="col">{{$table_row->Overall_Academic_Gap}}</td>
                    <tr>
                    <?php $i = !$i; $color=$colors[$i];?>
                    @endforeach
                    
            </table>
            
