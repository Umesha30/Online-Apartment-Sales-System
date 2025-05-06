<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "useracc";

//create connection
$conn = new mysqli ($servername, $username, $password, $dbname);

//check the connection
// if ($conn -> connect_errno){
//     die("Connection Failed : " .$conn -> connect_error);
// }
// else {
//     echo "Connection Succeeded";
// }


?>