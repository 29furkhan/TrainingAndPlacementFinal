<?php
echo '  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
$first_name= filter_input(INPUT_POST,'first_name');
$last_name= filter_input(INPUT_POST,'last_name');
$Email= filter_input(INPUT_POST,'email');
$Password= filter_input(INPUT_POST,'password');
$Repassword=filter_input(INPUT_POST,'repassword');

if(!empty($first_name) && !empty($last_name) && !empty($Email) && !empty($Password) && !empty($Repassword) ) {
    $host= "localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="tpo_db";

    $conn = new mysqli( $host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()) {
        die('Connect error ('.mysqli_connect_error().') '. mysqli_connect_error());
    }
    else if($Password == $Repassword) {
        $sql= "INSERT INTO login values('$first_name','$last_name','$Email','$Password')";
        
        if($conn->query($sql)) {
            echo '<script type="text/javascript"> document.write (swal("Good job!", "You clicked the button!", "success"))    ;</script>';
        }
    }
}
else {
    echo "Name should not be empty";
    die();
}

?>
