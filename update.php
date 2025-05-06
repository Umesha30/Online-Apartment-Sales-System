<?php

//DB connection
require_once 'connection.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    //Retrive the record with the given ID
    $sql = "SELECT * FROM user_details WHERE user_id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $Fname = $row ["userFName"];
        $Lname = $row ["userLName"];
        $email = $row ["userEmail"];
        $password = $row ["userPassword"];
        $DOB = $row ["userDOB"];
        $phone = $row ["userPhone"];
        $address = $row ["userAddress"];
        $pcode = $row ["userPcode"];

        //display the update form
        echo "<form action='./update.inc.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $id . "'>";

            echo "<label for='Fname'>First Name</label><br>";
            echo "<input type='text' id='Fname' name='Fname' value='".$Fname."'><br>";

            echo "<label for='Lname'>Last Name</label><br>";
            // echo "<h1> ".$Lname." </h1>";
            echo "<input type='text' id='Lname' name='Lname' value='".$Lname."'><br>";

            echo "<label for='email'>E-mail</label><br>";
            echo "<input type='text' id='email' name='email' value='".$email."'><br>";

            echo "<label for='password'>Enter Password</label><br>";
            echo "<input type='text' id='password' name='password' value='".$password."'><br>";

            echo "<label for='DOB'>Enter Date of Birth</label><br>";
            echo "<input type='date' id='DOB' name='DOB' value='".$DOB."'><br>";

            echo "<label for='phone'>Enter Phone Number</label><br>";
            echo "<input type='text' id='phone' name='phone' value='".$phone."'><br>";

            echo "<label for='address'>Enter Address</label><br>";
            echo "<textarea cols='50' rows='4' id='address' name='address' value='".$address."'></textarea><br><br>";

            echo "<label for='postalcode'>Enter Postal Code</label><br>";
            echo "<input type='text' id='pcode' name='pcode' placeholder='required' value='".$pcode."'><br><br>";
            
            echo "<button type='submit'>Update</button>";
        
        echo "</form>";
    } 
    else {
        echo "No Record Available";
    }

}
else {
    echo "ID Parameter is Missing";
}

?>