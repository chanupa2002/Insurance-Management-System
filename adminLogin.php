 <?php
    
    require_once('connection.php');         // Including Connection file

?> 


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href= "css/adminlogin.css">
        <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="js/adminValidate.js"></script>
    </head>
    <body>
        
        <div class = "login">
            <div class="myform">
                    <h2>Admin Login</h2>
                    <input type ="text" placeholder="Name" id="adminName">
                    <input type ="password" placeholder="Password" id="adminPassword">
                    <p id="desc"></p>
                    <br>
                    <input type="submit" value="LOG IN" onclick="validate()" class="btn" id="logIn">
                    <a href="Website/Home page.html" id="backtohometxt"> <- Back to Home</a>
            </div>

            <div class="image">
                <img src="images/adminlogin.jpeg" width ="300px" height="300px">
            </div>
            
        </div>

    </body>
</html> 
