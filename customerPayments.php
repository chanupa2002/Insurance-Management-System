<?php
session_start();
require_once('connection.php');

// Check if the user is logged in
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
    <title>Select Payment Method</title>
    <!-- Link to CSS files -->
    <link rel="stylesheet" href="css/customerPayementsmethod.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header>
    <!-- Header section -->
    <img src="images/img5.png" id="logo">
    <h1>Wellness First Health Insurance</h1>
    <a href="customerPayment_view.php"><i class="fa-solid fa-circle-left icon"></i></a>
</header>
<!-- Payment method selection -->
<h3>Select Payment Method</h3>
<div class="maincontainer">
        
    <div class="box1">
        <!-- Link to pay online page -->
        <a href="customerPayment_online.php" class="boxcontainer" >
            <div class="container">
                <div class="iconcontainer">
                    <!-- Icon for online payment -->
                    <i class="fa-solid fa-credit-card icon1"></i>
                </div>
                        
                <div class="box">
                    <!-- Text for online payment -->
                    <p> Pay Online</p>
                </div>
            </div> 
        </a>
    </div>

     
    <div class="box1">
        <!-- Link to bank deposit page -->
        <a href="bankdeposite.php" class="boxcontainer" >
            <div class="container">
                <div class="iconcontainer">
                    <!-- Icon for bank deposit -->
                    <i class="fa-solid fa-receipt icon1"></i>
                </div>
                        
                <div class="box">
                    <!-- Text for bank deposit -->
                    <p> Bank Deposit</p>
                </div>
            </div> 
        </a>
    </div>
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
        
        <div class="contact">
            <h4>Get Social with us on</h4>
            <div class="logopanel">
                <!-- Social media icons -->
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
