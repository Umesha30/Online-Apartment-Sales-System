<?php

//DB connection
require_once 'connection.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $Cno = $_POST["contactno"];
    $message = $_POST["message"];

    //Insert data into the database
    $sql = "INSERT INTO inquiry (iname,email,contactNo,imessage)
    VALUES ('$name','$email','$Cno','$message')";//table names and form names

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message Sent Successfully');</script>";
        echo "<script>window.location.href='contactus.html';</script>"; // Change to show user profile
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

?>