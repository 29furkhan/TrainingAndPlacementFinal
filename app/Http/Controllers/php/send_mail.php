<?php

$mailto = $_POST['mail_to'];
$link = mysqli_connect("localhost", "root", "", "test"); 

if($link === false){ 
	die("ERROR: Could not connect. " 
				. mysqli_connect_error()); 
} 
$sql = "SELECT * FROM login where Email='$mailto'"; 
if($res = mysqli_query($link, $sql)){ 
	if(mysqli_num_rows($res) > 0){ 

		 while($row = mysqli_fetch_array($res)){ 
        $mailMsg = "Hi ".$row['Name'].". we are from MGM College of Enginnering Nanded and Here is your Username and Password".
         "<br>"."Username: ".$row['Username']."<br>"." Password: ".$row['Password'];
		} 

		mysqli_free_result($res); 
	} else{ 
		echo "No Matching records are found."; 
	} 
} else{ 
	echo "ERROR: Could not able to execute $sql. " 
								. mysqli_error($link); 
} 
    $mailSub = "Reset Password Request";
   require '../PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "prashantphulari07@gmail.com";
   $mail ->Password = "ManojPhulari@123";
   $mail ->SetFrom("prashantphulari07@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }

   mysqli_close($link); 

   header("Location: ../login.html");


   

