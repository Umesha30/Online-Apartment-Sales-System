<?php

//DB connection
require_once 'connection.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST'){

    $email = $_POST ["userEmail"];
    $password = $_POST ["userPassword"];

    // Check in seller_details table
    $sql_seller = "SELECT * FROM seller_details WHERE sellerEmail = '$email' AND sellerPassword = '$password'";
    $result_seller = mysqli_query($conn, $sql_seller);

    // Check in user_details table
    $sql_user = "SELECT * FROM user_details WHERE userEmail = '$email' AND userPassword = '$password'";
    $result_user = mysqli_query($conn, $sql_user);

    // Check in staffacc table
    $sql_staff = "SELECT * FROM staffacc WHERE SEmail = '$email' AND SPassword = '$password'";
    $result_staff = mysqli_query($conn, $sql_staff);

    // Check if the email and password exist in any of the tables
    if (mysqli_num_rows($result_seller) == 1) {
        // Store session data
        $_SESSION['sellerEmail'] = $email;
        // $_SESSION['role'] = 'seller';  // Set role to seller
        echo "<script> alert('Seller Login Successful')</script>";
        echo "<script> window.location.href = './php/sellerprofile.php';</script>"; // Redirect to seller dashboard
    } 
    elseif (mysqli_num_rows($result_user) == 1) {
        // Store session data
        $_SESSION['userEmail'] = $email;
        // $_SESSION['role'] = 'user';  // Set role to user
        echo "<script> alert('User Login Successful')</script>";
        echo "<script> window.location.href = './php/userprofile.php';</script>"; // Redirect to user dashboard
    } 
    elseif (mysqli_num_rows($result_staff) == 1) {
        // Store session data
        $_SESSION['SEmail'] = $email;
        // $_SESSION['role'] = 'staff';  // Set role to staff
        echo "<script> alert('Staff Login Successful')</script>";
        echo "<script> window.location.href = './php/staffprofile.php';</script>"; // Redirect to staff dashboard
    } 
    else {
        echo "<script> alert('Invalid Email or Password')</script>";
        echo "<script> window.location.href = 'login.php';</script>"; // Redirect back to login page
    }


}
mysqli_close($conn);

?>



<!-- //check email & password
    $sql = "SELECT * FROM seller_details WHERE sellerEmail = '$email' AND sellerPassword = '$password'";

    $sql = "SELECT * FROM user_details WHERE userEmail = '$email' AND userPassword = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
        echo "<script> alert ('User Login Successful')</script>";
        echo "<script> window.location.href = 'Display.php';</script>";
    }
    else {
        echo "<script> alert ('Invalid Email or Password')</script>";
        echo "<script> window.location.href = 'login.php';</script>";
    } -->