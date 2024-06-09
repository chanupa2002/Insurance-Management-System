<?php
require_once('connection.php'); // Including the database connection file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Complete</title>
    <link rel="stylesheet" href="css/registrationcomplete.css"> <!-- Linking to the CSS file for styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> <!-- Linking to the Font Awesome library for icons -->
</head>
<body>
    <header>
        <!-- Logo and title of the system -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <!-- Back button to navigate to the admin home page -->
        <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <div class="container">
        <!-- Message indicating registration completion -->
        <p><span>Registration Complete</span><br>You have finally registered an insurance Manager for the system !<p>
    </div>
</body>
</html>
