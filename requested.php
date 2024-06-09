<?php
session_start(); // Starting the session
require_once('connection.php'); // Including the database connection file

// Redirecting to customerLogin.php if user is not logged in
if (!isset($_SESSION['name'])) {
    header("Location: customerLogin.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested</title>
    <link rel="stylesheet" href="css/requested.css"> <!-- Linking to the CSS file for styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> <!-- Linking to the Font Awesome library for icons -->
</head>
<body>
    <header>
        <!-- Logo and title of the system -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <!-- Back button to navigate to the customerClaimReq.php page -->
        <a href="customerClaimReq.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <div class="container">
        <!-- Image indicating claim request received -->
        <img src="images/images.png">
        <!-- Message confirming claim request reception -->
        <h2>We have received your claim Request and We will get back you soon!</h2>
        <!-- Link to navigate back to the customer home page -->
        <a href="customerHome.php"><i class="fa-solid fa-house icon1" id="homeicon"></i></a>
    </div>
</body>
</html>
