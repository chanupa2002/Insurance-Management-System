<?php
require_once('connection.php'); // Including the database connection file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Complete</title>
    <link rel="stylesheet" href="css/regcomplete.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="js/regComplete.js"></script> <!-- Including JavaScript file -->
</head>
<body>
    <!-- Success panel displaying registration completion message -->
    <div id="successpanel">
        <i class="fa-solid fa-circle-check" id="exclaimicon"></i>
        <h1>Registration Complete !</h1>
        <p>Congratulations on successfully registering with Wellness First Health Insurance. Thank you!</p>
        <div id="lpanel">
            <!-- Home icon link -->
            <a href="Website/Home Page.html"><i class="fa-solid fa-house icon1" id="homeicon"></i></a>
            <!-- Exit button to redirect to customer login page -->
            <a href="customerLog.php"><button>Exit</button></a>
        </div>
    </div>
</body>
</html>
