<?php

//DB connection
require_once 'connection.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    //Retrive the record with the given ID
    $sql = "SELECT * FROM staffacc WHERE staff_id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $Sname = $row ["Sname"];
        $position = $row ["Position"];
        $Semail = $row ["Semail"];
        $password = $row ["Spassword"];
        $DOB = $row ["SDOB"];
        $phone = $row ["SPhone"];
        $address = $row ["SAddress"];
    

        //display the update form
        echo "<form action='./updateStaff.inc.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $id . "'>";

            echo "<label for='Sname'>Full Name</label><br>";
            echo "<input type='text' id='Sname' name='Sname' value='".$Sname."'><br>";

            echo "<label for='position'>Position</label><br>";
            echo "<input type='text' id='position' name='position' value='".$position."'><br>";

            echo "<label for='email'>E-mail</label><br>";
            echo "<input type='text' id='email' name='email' value='".$Semail."'><br>";

            echo "<label for='password'>Enter Password</label><br>";
            echo "<input type='text' id='password' name='password' value='".$password."'><br>";

            echo "<label for='DOB'>Enter Date of Birth</label><br>";
            echo "<input type='date' id='DOB' name='DOB' value='".$DOB."'><br>";

            echo "<label for='phone'>Enter Phone Number</label><br>";
            echo "<input type='text' id='phone' name='phone' value='".$phone."'><br>";

            echo "<label for='address'>Enter Address</label><br>";
            echo "<textarea cols='50' rows='4' id='address' name='address' placeholder='required' value='".$address."'></textarea><br><br>";
            
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