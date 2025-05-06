<?php
// Include Connection PHP File
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $DOB = $_POST["DOB"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $pcode = $_POST["pcode"];
    $acctype = $_POST["acctype"]; // Retrieve account type from the form

    // Hash the password for security
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already in use using a prepared statement
    $checkQuery = $conn->prepare("SELECT * FROM user_details WHERE userEmail = ?");
    $checkQuery->bind_param("s", $email);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>alert('This Email is already in use, Please use a different Email');</script>";
        echo "<script>window.location.href='insert.php';</script>"; // Redirect to insert page
    } else {
        // Insert data into the database based on account type
        if ($acctype == "buyer") {
            // Prepared statement for inserting buyer data
            $sql = $conn->prepare("INSERT INTO user_details (userFName, userLName, userEmail, userPassword, userDOB, userPhone, userAddress, userPcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssssss", $Fname, $Lname, $email, $password, $DOB, $phone, $address, $pcode);
            
            // Execute the query and check if the insertion was successful
            if ($sql->execute()) {
                echo "<script>alert('Registered Successfully');</script>";
                echo "<script>window.location.href='php/userprofile.php';</script>"; // Redirect to user profile
            } else {
                echo "Error: " . $sql->error;
            }
        } else if ($acctype == "seller") {
            // Prepared statement for inserting seller data
            $sql = $conn->prepare("INSERT INTO seller_details (sellerFName, sellerLName, sellerEmail, sellerPassword, sellerDOB, sellerPhone, sellerAddress, sellerPcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssssss", $Fname, $Lname, $email, $password, $DOB, $phone, $address, $pcode);
            
            // Execute the query and check if the insertion was successful
            if ($sql->execute()) {
                echo "<script>alert('Registered Successfully');</script>";
                echo "<script>window.location.href='php/sellerprofile.php';</script>"; // Redirect to seller profile
            } else {
                echo "Error: " . $sql->error;
            }
        } else {
            // Handle unknown account type
            echo "<script>alert('Unknown account type selected.');</script>";
            echo "<script>window.location.href='insert.php';</script>"; // Redirect to insert page
            exit; // Exit to prevent further execution
        }
    }

    // Close the prepared statement
    $checkQuery->close();
    if (isset($sql)) {
        $sql->close();
    }
}

// Close connection
$conn->close();

?>
