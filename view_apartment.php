<?php 
require_once 'connection.php';
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/icon1.png" type="image/x-icon">

        <title>View Apartment</title>

        <style type="text/css">
            
            /* Styles for Apartment View Page */
            .apartment-details {
                width: fit-content;
                margin: 0 auto;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                display: flex;
                justify-content: center;
                height: fit-content;
                margin-bottom: 30px;
            }

            .section1 {
                width: 100%;
                padding: 20px;
            }

            .section2 {
                width: 100%;
                padding: 50px;
            }

            .apartment-details h2 {
                font-size: 24px;
                color: #333;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .apartment-details img {
                display: block;
                margin: 20px auto;
                width: 80%;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }

            .apartment-details p {
                font-size: 16px;
                color: #666;
                margin-bottom: 20px;
            }

            .apartment-details p:first-child {
                margin-top: 0;
            }

            .apartment-details .not-found {
                color: #ff0000;
                font-weight: bold;
            }

            .buy-back {
                display: flex;
                justify-content: center;
            }

            .btn {
                background-color: orange;
                width: 80px;
                border: none;
                border-radius: 10px;
                height: 50px;
                color: black;
                font-weight: 600;
                cursor: pointer;
            }

            .btn2 {
                background-color: darkorange;
                width: 100px;
                border: none;
                border-radius: 10px;
                height: 50px;
                color: black;
                font-weight: 600;
                cursor: pointer;
            }

            h4 {
                color: black;
            }

            .acontainer {
                width: 90%;
                margin: 0 auto;
                padding: 20px 0;
                display: flex;
                flex-wrap: wrap; /* Added to allow wrapping of apartment cards */
                justify-content: center;
                align-items: flex-start; /* Changed to align items at the start */
            }

        

            /* Apartment Card Styles */
            .apartment-card {
                border: 1px solid #ccc;
                background-color: #FFFDD0;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                border-radius: 5px;
                margin-bottom: 20px;
                padding: 20px;
                overflow: hidden;
                width: calc(33.33% - 35px); /* Adjusted width to fit 3 apartments in a row */
                margin-right: 20px; /* Added right margin to create spacing between cards */
                box-sizing: border-box; /* Added to include border and padding in width calculation */
            }

            .apartment-image {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            .apartment-details {
                padding: 10px;
            }

            .apartment-title {
                font-size: 20px;
                margin-bottom: 5px;
                text-align: left;
            }

            .apartment-description {
                font-size: 16px;
                color: #666;
                margin-bottom: 5px;
                text-align: left;
            }

            .apartment-price {
                font-size: 18px;
                font-weight: bold;
                color: #007bff;
                text-align: center;
            }

            /* .view-btn {
                display: flex;
                justify-content: center;
                margin-top: 20px;
                margin-bottom: 30px;
            } */

        </style>

    </head>

    <body>
        <!------------------- NAVIGATION ------------------->        
        <div id="header-placeholder"></div>

        <script>
            // to include the header   
            fetch('header.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('header-placeholder').innerHTML = data;
                });   
        </script>
        
        <?php
        
        // Check if an apartment ID is provided in the URL
        if (isset($_GET['id'])) {
            $apartment_id = $_GET['id'];

            // Fetch apartment details from the database
            $sql = "SELECT * FROM apartment WHERE Apartment_ID = $apartment_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $apartment = $result->fetch_assoc();
                // Display apartment details
                echo "<div class='apartment-details'>";
                echo "<div class='section1'>";
                echo "<img src='" . $apartment["APT_image"] . "' width='200'>";
                echo "</div>";
                echo "<div class='section2'>";
                echo "<h2>" . $apartment["APT_Name"] . "</h2>";
                echo "<p>Address: " . $apartment["APT_Address"] . "</p>";
                echo "<p>City: " . $apartment["City"] . "</p>";
                echo "<p> " . $apartment["Apt_Details"] . "</p>";
                echo "<p> LKR " . $apartment["Price"] . "</p>";
                echo "<div class='buy-back'>";
                echo "<a href='./php/aptD.php'><button class='btn'>Manage</button></a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

            } else {
                echo "<p>Apartment not found.</p>";
            }
        } else {
            echo "<p>Apartment ID not provided.</p>";
        }
        ?>

        <br><center><a href="./php/addreview.php"><button class="btn2">Add Review</button></a></center><br><br>



        <?php

        require_once 'connection.php';

        //Fetch available inquiries
        $sql = "SELECT * FROM reviews";
        $result = $conn->query($sql);

        ?>

        <h2 style="text-align: center;">User Reviews</h2>
        <div class="acontainer">

            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($count % 3 == 0 && $count > 0) {
                        // Start a new row after every 3 apartments
                        echo "</div><div class='container'>";
                    }
                    echo "<div class='apartment-card'>";
                    // echo "<img src='" . $row["APT_image"] . "' class='apartment-image'>";
                    echo "<div class='apartment-detail'>";
                    echo "<p class='apartment-title'>Rating : " . $row["rating"] . "</p>";
                    echo "<p class='apartment-description'> " . $row["useremail"] . "</p><br>";
                    echo "<p class='apartment-title'> " . $row["comment"] . "</p><br>";
                    // echo "<p class='apartment-description'>" . $row["sellerAddress"] . " " . $row["sellerPcode"] . "</p>";
                    echo "<div class='view-btn'>";
                    echo "<a href='./php/reviewD.php?id=" . $row["review_id"] . "'><button style='background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>Manage</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
            } else {
                echo "<p>No Available Reviews.</p>";
            }
            ?>

        </div>

        

        

    </body>

    

    


</html>