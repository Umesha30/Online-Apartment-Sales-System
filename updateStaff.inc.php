<?php

//include DB
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];//Ensure the id field in the form
    
    $Sname = $_POST ["Sname"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $DOB = $_POST ["DOB"];
    $phone = $_POST ["phone"];
    $address = $_POST ["address"];
    

    //Update data in the DB
    $sql = "UPDATE staffacc SET Sname='$Sname', Semail='$email',
    Spassword='$password', SDOB='$DOB', SPhone='$phone', SAddress='$address' WHERE staff_id='$id'";

    //Check if update was successfull
    if ($conn->query($sql) === TRUE){
        echo "<script> alert('User Details Updated Successfully');</script>";
        echo "<script>window.location.href = 'php/staffD.php'; </script>";
    }
    else {
        echo "Details Update Failed : " .$conn->error;
    }
}
//close connection
$conn->close();

?>