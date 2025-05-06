<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login</title>
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
            label {
                font-size: 20px;
                margin: 20px 0;
                /* display: inline-block; */
            }

            input {
                width: 97%;
                height: 20px;
                padding: 5px;
                margin: 10px 0;
                border: 1px solid green;
            }

            button {
                background-color: orange;
                border: none;
                border-radius: 5px;
                padding: 5px 10px;
                cursor: pointer;
                font-size: 16px;
                text-transform: uppercase;
                margin-left: 40%;
            }

            button:hover {
                background-color: darkorange;
                transform: scale(1);
            }
        </style>
        
    </head>
    <body>

        <h1>Login</h1>
        <form id="form-container" action="./login.inc.php" method="POST">
            <label>Email</label><br>
            <input type="text" name="userEmail"/><br>

            <label>Password</label><br>
            <input type="password" name="userPassword"/><br><br>

            <button type="submit" name="login">Login</button>
        </form>
        
    </body>
</html>