
<?php
// $mailto= "prashantphulari21@gmail.com"
// $mailSub ="Response from mail";
// $message ="Hello Prashant i am your website";
$mailto =$_POST['mail_to'];
$mailSub =$_POST['Subject'];
$message =$_POST['Message'];

require '../PHPMailer/PHPMailerAutoload.php';
$mail=new PHPMailer();
$mail ->IsSmtp();
$mail ->SMTPDebug = 0;
$mail ->SMTPAuth= true;
$mail ->SMTPSecure= 'ssl';
$mail ->Host = "smtp.gmail.com";
$mail->port =587;
$mail-> IsHTML(true);
$mail ->Username = "prashantphulari07@gmail.com";
$mail ->Password ="ManojPhulari@123";
$mail ->SetFrom("prashantphulari07@gmail.com");
$mail ->Subject = $mailSub;
$mail ->Body = $message;
$mail ->AddAddress($mailto);

if(!$mail ->Send())
{
    echo "Mail not send";
}
else {
    echo "mail is Send";
}

