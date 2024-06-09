<?php
session_start();
require_once('connection.php');

// Checking if a customer is logged in
if (!isset($_SESSION['name'])) {
    header("Location: customerLogin.php"); // Redirecting to the login page if not logged in
    exit(); // Terminating script execution after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Notices</title>
    <link rel="stylesheet" href="css/noNotices.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="customerHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        </div>
    </header>
    <div class="container">
        <h3>No Notices!</h3>
        <p>Thank you for your dedication and commitment to our health insurance management system. Wishing you a productive day ahead!</p>
    </div>

    <!-- Footer section -->
    <footer>
        <div class="footer">
            <img src="images/img5.png" id="logo">
            <ul id="hotline">
                <li id="hotlineh">Do you need any support</li>
                <li>011 255 7441</li>
                <li>011 255 7442</li>
            </ul>
        
            <!-- Contact section -->
            <div class="contact">
                <h4>Get Social with us on</h4>
                <div class="logopanel">
                    <!-- Social media links -->
                    <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa-brands fa-facebook-f ficon"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram ficon"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin ficon"></i></a>
                    <a href="https://twitter.com/x"> <i class="fa-brands fa-square-twitter ficon"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
