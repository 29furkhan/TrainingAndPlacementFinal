<?php
$Username= filter_input(INPUT_POST,'username');
$Password= filter_input(INPUT_POST,'password');

 $flag=0;
//header("Location: ../login.html");
 $link = mysqli_connect("localhost", "root", "", "tpo_db"); 

 if($link === false){ 
 	die("ERROR: Could not connect. " 
 				. mysqli_connect_error()); 
 } 
// $mailto="prashantphulari21@gmail.com";
 $sql = "SELECT * FROM login "; 
 if($res = mysqli_query($link, $sql)){ 
 	if(mysqli_num_rows($res) > 0){ 

 		 while($row = mysqli_fetch_array($res)){ 
			if($Username == $row['Username'] && $Password== $row['Password'])
			{
				// echo "<center><h1>Login Successful</h1></center>";
				 $flag=1;
			}
			
//         $print= "Hi".$row['Name']." Your Password is ".$row['Password'];
//         echo $print;
 		} 

 		mysqli_free_result($res); 
 	} else{ 
 		echo "No Matching records are found."; 
 	} 
 } else{ 
 	echo "ERROR: Could not able to execute $sql. " 
 								. mysqli_error($link); 
 } 
 if($flag == 1)
 {
	echo "<center><h1>Login Successful</h1></center>";
 }
 else
 {
	echo "<center><h1>Login UnSuccessful</h1></center>";
 }

 mysqli_close($link); 
?> 
