<?php

require_once 'connection.php';

//Fetch available apartments
$sql = "SELECT * FROM apartment";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CityNest</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/footer.css">
        <!-- <link rel="stylesheet" href="styles/styles.css"> -->
        <link rel="stylesheet" href="styles/Location.css">
        <link rel="stylesheet" href="styles/apt.css">
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
                text-align: center;
            }

            .apartment-description {
                font-size: 16px;
                color: #666;
                margin-bottom: 5px;
                text-align: center;
            }

            .apartment-price {
                font-size: 18px;
                font-weight: bold;
                color: #007bff;
                text-align: center;
            }

            .view-btn {
                display: flex;
                justify-content: center;
                margin-top: 20px;
                margin-bottom: 30px;
            }


            
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

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to CityNest</h1>
                <h3>Find your dream apartment with ease</h3>
            </div>
        </section>
        

        <!-- <h1>Apartments</h1> --> 

        <h2 style="text-align: center;">Available Apartments</h2>
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
                    echo "<img src='" . $row["APT_image"] . "' class='apartment-image'>";
                    echo "<div class='apartment-detail'>";
                    echo "<p class='apartment-title'>" . $row["APT_Name"] . "</p>";
                    echo "<p class='apartment-description'>Address: " . $row["APT_Address"] . "</p>";
                    echo "<p class='apartment-description'>City: " . $row["City"] . "</p>";
                    echo "<p class='apartment-price'>Price: LKR " . $row["Price"] . "</p>";
                    echo "<div class='view-btn'>";
                    echo "<a href='view_apartment.php?id=" . $row["Apartment_ID"] . "'><button style='background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>View</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
            } else {
                echo "<p>No available apartments.</p>";
            }
            ?>
        </div>




         
        


        <!-- Added Apartments -->
        

        <!-- Top Cities -->
		<center>
        <a href="#Colombo"><button class="location-button" onclick="loadData('btn1')">Colombo</button></a>
        <a href="#Dehiwala"><button class="location-button" onclick="loadData('btn2')">Dehiwala</button></a>
        <!-- <a href="#Negombo"><button class="location-button" onclick="loadData('btn3')">Negombo</button></a> -->
        <!-- <a href="#Nugegoda"><button class="location-button" onclick="loadData('btn4')">Nugegoda</button></a>
        <a href="#Wattala"><button class="location-button" onclick="loadData('btn5')">Wattala</button></a> -->
        </center>
		<br>


        <section id="Trending">
            <h2 class="listh2">TRENDING</h2>
            <div class="image-container">
                <ul>
                    <li>
                        <img src="images/APT1.jpg" alt="Trending image1">
                        <p><strong>COLOMBO</strong><br>Waterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT8.jpg" alt="Trending image3">
                        <p><strong>Dehiwala</strong><br>Oceana Beach Resort Apartments for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT3.jpg" alt="Trending image3">
                        <p><strong>Negombo</strong><br>Oceana Beach Resort Apartments for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT4.jpg" alt="Trending image4">
                        <p><strong>Nugegoda</strong><br>Waterdale Residencies for Sale</p>
                    </li>                    
                </ul>
            </div>
        </section>


        <section id="Colombo">
            <h2 class="listh2">Colombo</h2>
            <div class="image-container">
                <ul>
                    <li>
                        <img src="images/APT1.jpg" alt="Trending image1">
                        <p><strong>COLOMBO</strong><br>Waterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT3.jpg" alt="Trending image3">
                        <p><strong>Dehiwala</strong><br>OWaterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT6.webp" alt="Trending image3">
                        <p><strong>Negombo</strong><br>Oceana Beach Resort Apartments for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT4.jpg" alt="Trending image4">
                        <p><strong>Nugegoda</strong><br>Waterdale Residencies for Sale</p>
                    </li>                    
                </ul>
            </div>
        </section>


        <section id="Dehiwala">
            <h2 class="listh2">Dehiwala</h2>
            <div class="image-container">
                <ul>
                    <li>
                        <img src="images/APT1.jpg" alt="Trending image1">
                        <p><strong>COLOMBO</strong><br>Waterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT3.jpg" alt="Trending image3">
                        <p><strong>Dehiwala</strong><br>OWaterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT6.webp" alt="Trending image3">
                        <p><strong>Negombo</strong><br>Oceana Beach Resort Apartments for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT4.jpg" alt="Trending image4">
                        <p><strong>Nugegoda</strong><br>Waterdale Residencies for Sale</p>
                    </li>                    
                </ul>
            </div>
        </section>

        <!-- <section id="Negombo"></section>
            <h2 class="listh2">Negombo</h2>
            <div class="image-container">
                <ul>
                    <li>
                        <img src="images/APT1.jpg" alt="Trending image1">
                        <p><strong>COLOMBO</strong><br>Waterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT3.jpg" alt="Trending image3">
                        <p><strong>Dehiwala</strong><br>OWaterdale Residencies for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT6.webp" alt="Trending image3">
                        <p><strong>Negombo</strong><br>Oceana Beach Resort Apartments for Sale</p>
                    </li>
                    <li>
                        <img src="images/APT4.jpg" alt="Trending image4">
                        <p><strong>Nugegoda</strong><br>Waterdale Residencies for Sale</p>
                    </li>                    
                </ul>
            </div>
        </section> -->

        

        <!------------------- FOOTER ------------------->        
        <div id="footer-placeholder"></div>

        <script>
            // to include the header   
            fetch('footer.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('footer-placeholder').innerHTML = data;
            });   
        </script>
        
        
    </body>

    
</html>