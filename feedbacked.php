<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Redirecting to the customer login page if the user is not logged in
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
    <title>Feedbacked</title>
    <link rel="stylesheet" href="css/feedbacked.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header>
    <img src="images/img5.png" id="logo">
    <h1>Wellness First Health Insurance</h1>
    <a href="customerFeedbacks.php"><i class="fa-solid fa-circle-left icon"></i></a>
</header>
<div class="container">
    <img src="images/feedbacked.png" id="feedbackbg">
    <p>
        We appreciate your valuable Feedback ! <br> Your feedback is highly valued and important to us. <br>
        <b><span id="thankyoutxt">Thank You!</span></b>
    </p>
    <a href="customerHome.php"><i class="fa-solid fa-house icon1" id="homeicon"></i></a>
</div>
</body>
</html>
