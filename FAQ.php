<?php

require_once 'connection.php';//data base connection

//Fetch available inquiries
$sql = "SELECT * FROM inquiry";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CityNest</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/styles.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <style>

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
        <div id="header-placeholder"></div>

        <script>
            // to include the header   
            fetch('header.html')
                .then(response => response.text())
                .then(data => {
                     document.getElementById('header-placeholder').innerHTML = data;
                });   
        </script>

        
        <br>
        <div class="terms">
            <br>
            <h1>FAQ</h1>
            <br>
            <h2>How To Register ?</h2>
                <p>
                    Go to sign in and register using the form.<br><a href="insert.php">Sign Up</a>
                </p>

            <h2>How To Contact ?</h2>
                <p>
                    You can find our contact information through below link!<br><a href="contactus.html">Contact Us!</a>
                </p>
                        
        </div>

        <h2 style="text-align: center;">Frequently Asked Questions</h2>
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
                    echo "<p class='apartment-title'>User Name : " . $row["iname"] . "</p>";
                    echo "<p class='apartment-description'>Question : " . $row["imessage"] . "</p>";
                    // echo "<p class='apartment-description'>City: " . $row["City"] . "</p>";
                    // echo "<p class='apartment-price'>Price: $" . $row["Price"] . "</p>";
                    echo "<div class='view-btn'>";
                    echo "<a href='./php/inqD.php?id=" . $row["inq_id"] . "'><button style='background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>Manage</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
            } else {
                echo "<p>No available Reviews.</p>";
            }
            ?>
        </div>

        <!-- FOOTER -->
        <br><br>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="apartments.html">Apartments</a></li>
                            <li><a href="sellers.html">Sellers</a></li>
                            <li><a href="aboutus.html">About Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Get Help</h4>
                        <ul>
                            <li><a href="FAQ.php">FAQ</a></li>
                            <li><a href="privacy&P.html">Privacy Policy</a></li>
                            <li><a href="terms&C.html">Terms & Conditions</a></li>
                            <li><a href="references.php">References</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Contact Us</h4>
                        <ul>
                            <li><a href="contactus.html">Mobile</a></li>
                            <li><a href="contactus.html">E - mail</a></li>
                            <li><a href="contactus.html">Address</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow Us</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UC5rvMJhPcnLun-0cUWBha6Q" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Footer-->
        <div class="footerbottom">
            <p>&copy; 2024 CityNest. All Rights Reserved.</p>
        </div>
    </body>
</html>