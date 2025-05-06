<?php

//DB Connection
require_once 'connection.php';

//check the delete_id parameter exists in the URL
if (isset($_GET['delete_id'])){
    $deleteID = $_GET['delete_id'];

    $sql = "DELETE FROM user_details WHERE user_id = '$deleteID'";
    if($conn->query($sql) === TRUE){
        echo "<script> alert ('Successfully Deleted');</script>";
        echo "<script> window.location.href = 'php/userD.php';</script>";
    }else {
        echo "Account Delete Failed";
    }
}else {
    echo "Delete id Parameter not found";
}


$conn->close();

?>