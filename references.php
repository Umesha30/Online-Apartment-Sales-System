<!DOCTYPE html>
<html>
    <head>
        <title>References</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/aboutus.css">
        <!-- <link rel="stylesheet" href="styles/styles.css"> -->

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <style>
            .privacy h1 {
                margin-left: 120px;
                text-align: left;
            }

            .privacy h2 {
                margin-left: 120px;
                text-align: left;
            }

            .privacy h3 {
                margin-top: 30px;
                margin-bottom: 10px;
                margin-left: 120px;
                text-align: left;
            }

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
        <div class="privacy">
            <br>
            <h1>References</h1>
            <br>
            <p>CRUD implimentation codes are mostly refered and implemented using the help of a youtube channel named : <a href="https://www.youtube.com/@mrdila4353"> Mr. Dila</a></p>
            <p>Playlist : <a href="https://www.youtube.com/watch?v=D5X-BGD3z3Y&list=PLyprkB9NXq2ISuj7sBw4w7KbHcJUpOEsq"> Video Playlist </a></p>

            <h3>Extentions, apps used to create the project </h3>
            <p>Visual studio (Main coding environment)</p>
            <p>Visual studio code extensions: fontawesome, live server</p>
            <p>xampp server</p>
            <br><br>

            
            <p>Contents, testimonial reviews for sections in pages like <b>Home</b> are generated using AI</p>

            <br><br>

        </div>

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