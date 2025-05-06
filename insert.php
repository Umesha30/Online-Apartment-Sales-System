<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/insert.css">
        <script src="/js/terms.js"></script>
        <title>SignUp</title>

        <style>

            body {
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            body::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url(./images/APT10.jpg);
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                background-repeat: no-repeat;
                opacity: 0.5;
                z-index: -1;
            }

            h1 {
                text-shadow: -4px -4px 10px rgba(255, 255, 255, 1); /* Shadow with horizontal offset, vertical offset, blur, and color */

            }
            
            #form-container {
                background-color: #f9f9f9; /* Light background color for better visibility */
                padding: 20px;
                border-radius: 5px;
                border: 5px solid green;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for better visibility */
                width: 100%;
                max-width: 500px; /* Make the form responsive */
                text-align: left;
                padding-top: 30px;
                padding-bottom: 30px;
            }
            
            .checkb {
                width: auto;
            }

            select, textarea {
                border: 1px solid green;
            }

            .terms-container {
                margin-top: 10px;
            }

            .terms-link {
                color: blue;
                text-decoration: none; /* Removes the underline */
            }

            .terms-link:hover {
                text-decoration: underline; /* Adds underline on hover */
            }
            
            /* Modal styles */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; 
                z-index: 1; 
                left: 0;
                top: 0;
                width: 100%; 
                height: 100%; 
                background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
            }

            .modal-content {
                background-color: #fefefe;
                margin: 15% auto; /* 15% from the top and centered */
                padding: 20px;
                border: 1px solid #888;
                width: 50%; /* Modal width */
                border-radius: 5px;
            }

            /* Close button */
            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            /* Terms and Conditions link style */
            .terms-link {
                color: blue;
                cursor: pointer;
                text-decoration: underline;
            }

     
        </style>
        
    </head>
    <body>
        <h1>Insert User Details</h1>

        <div>
            <form id="form-container" action="./insert.inc.php" method="post" onsubmit="return validateForm()">

                <label for="accType">Select Account Type</label><br>
                <select id="accType" name="acctype">
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                </select><br>

                <label for="Fname">First Name</label><br>
                <input type="text" id="Fname" name="Fname" required><br>

                <label for="Lname">Last Name</label><br>
                <input type="text" id="Lname" name="Lname" required><br>

                <label for="email">E-mail</label><br>
                <input type="text" id="email" name="email" required><br>

                <label for="password">Enter Password</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="repassword">Re-enter Password</label><br>
                <input type="password" id="repassword" name="repassword" required><br>

                <label for="DOB">Enter Date of Birth</label><br>
                <input type="date" id="DOB" name="DOB" required><br>

                <label for="phone">Enter Phone Number</label><br>
                <input type="text" id="phone" name="phone" required><br>

                <label for="address">Enter Address</label><br>
                <textarea cols="60" rows="4" id="address" name="address" required></textarea><br><br>

                <label for="postalcode">Enter Postal Code</label><br>
                <input type="text" id="pcode" name="pcode" required><br>

                <!-- <label for="photo">Upload a Profile Photo</label><br>
                <input type="file" id="photo" name="photo" accept="image/*"><br> -->


                <!-- Terms & Conditions -->
                <div class="terms-container">
                    <input class="checkb" type="checkbox" id="terms" name="terms">
                    <label for="terms">I agree to the <span class="terms-link" onclick="showModal()">Terms & Conditions</span></label><br><br>
                </div>
                
                <button type="submit">Submit</button>
            </form>
        </div> 
        
        <script>
            //check T&C agree or not
            function validateForm() {
                var termsCheckbox = document.getElementById("terms");
                if (!termsCheckbox.checked) {
                    alert("You must agree to the terms and conditions.");
                    return false; // Prevent form submission
                }
                return true; // Allow form submission
            }

            // Show the modal
            function showModal() {
                document.getElementById("myModal").style.display = "block";
            }

            // Close the modal
            function closeModal() {
                document.getElementById("myModal").style.display = "none";
            }

            // Close the modal if clicked outside of the content
            window.onclick = function(event) {
                var modal = document.getElementById("myModal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // psw
            function validateForm() {
            var termsCheckbox = document.getElementById("terms");
            var password = document.getElementById("password").value;
            var rePassword = document.getElementById("repassword").value;

            if (!termsCheckbox.checked) {
                alert("You must agree to the terms and conditions.");
                return false; // Prevent form submission
            }

            if (password !== rePassword) {
                alert("Passwords do not match. Please try again.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
            }

            function openTerms() {
                // Implement open terms modal logic here
            }

            function closeTerms() {
                // Implement close terms modal logic here
            }

            // Close modal if the user clicks outside of the modal
            window.onclick = function(event) {
                var modal = document.getElementById('termsModal');//CLOSE X BUTTON
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        </script>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span><!--CLOSE X BUTTON-->
                <h2>Terms and Conditions</h2>
                <p>
                    
                    Welcome to our website. By accessing or using our site, you agree to be bound by the following terms and conditions. 
                    These terms govern your use of the services provided by us. Please read them carefully. If you do not agree, you 
                    should not continue to use our site.
                </p>
                <ul>
                    <li>Respectful and lawful behavior is expected at all times.</li>
                    <li>Your data privacy is important, and we handle it with care.</li>
                    <li>Any breach of these terms may lead to account suspension or legal action.</li>
                    <li>We reserve the right to modify these terms at any time without notice.</li>
                </ul>
            </div>
        </div>

        
    
    </body>
</html>