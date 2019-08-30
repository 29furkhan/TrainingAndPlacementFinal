<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class connect extends Controller
{
    var $host,$dbusername,$dbpassword,$dbname;

    public function getDBConnection($first_name,$last_name,$Email,$CASERP_ID,$Password,$Repassword)
    {
        if(!empty($first_name) && !empty($last_name) && !empty($Email) && !empty($CASERP_ID) &&!empty($Password) && !empty($Repassword) )
        {
            $host= "localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="tpo_db";
        
            $conn = new mysqli( $host,$dbusername,$dbpassword,$dbname);
        
            if(mysqli_connect_error()) {
                return 0;
            }
            else{
                return 1;
            }
        }
            
    }

    public function checkData()
    {
        $first_name= filter_input(INPUT_POST,'first_name');
        $last_name= filter_input(INPUT_POST,'last_name');
        $Email= filter_input(INPUT_POST,'email');
        $CASERP_ID= filter_input(INPUT_POST,'caserp_id');
        $Password= filter_input(INPUT_POST,'password');
        $Repassword=filter_input(INPUT_POST,'repassword');

        $response = $this->getDBConnection($first_name,$last_name,$Email,$CASERP_ID,$Password,$Repassword);
        if($response)
        {
            $sql1= "INSERT INTO usercredits values('$CASERP_ID','$Password','$Email')";
            $sql2= "INSERT INTO temp(
                CASERP_ID,Email,Roll_No,Class,
                SSC,HSC,Polytechnic,
                FE_CGPA,SE_CGPA,TE_CGPA,
                FE_PERCENT,SE_PERCENT,TE_PERCENT,
                overall_academic_gap,Passing_Year,
                Branch,First_Name,Last_Name,Middle_Name
            )
            values(
                '$CASERP_ID','$Email',0,'NULL',
                0,0,0,
                0,0,0,
                0,0,0,
                0,0000,
                'Null','$first_name','$last_name','Null'
            )";   

            if ($conn->query($sql1) && $conn->query($sql2)) {
                echo "New record created successfully";
                return view('Pages.login');
            }
        }

    }
}





