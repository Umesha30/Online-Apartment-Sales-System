<?php

//include DB
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];//Ensure the id field in the form
    $Fname = $_POST ["Fname"];
    $Lname = $_POST ["Lname"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $DOB = $_POST ["DOB"];
    $phone = $_POST ["phone"];
    $address = $_POST ["address"];
    $pcode = $_POST ["pcode"];

    //Update data in the DB
    $sql = "UPDATE seller_details SET sellerFName='$Fname', sellerLName='$Lname', sellerEmail='$email',
    sellerPassword='$password', sellerDOB='$DOB', sellerPhone='$phone', sellerAddress='$address',
    sellerPcode='$pcode' WHERE seller_id='$id'";

    //Check if update was successfull
    if ($conn->query($sql) === TRUE){
        echo "<script> alert('User Details Updated Successfully');</script>";
        echo "<script>window.location.href = 'php/sellerD.php'; </script>";
    }
    else {
        echo "Details Update Failed : " .$conn->error;
    }
}
//close connection
$conn->close();

?>