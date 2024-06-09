<?php

session_start();        // starting session

require_once('connection.php');         // Including Connection file

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Not Approved</title>
    <link rel="stylesheet" href="css/cusNotApproved.css">
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="customerLog.php"><i class="fa-solid fa-circle-left icon"></i></a>
        </div>
    </header>
    <div class="container">
    Sorry ! Your Registration Request is not approved yet !
    Please contact our customer care.<br>
    <a href="CustomerLog.php"><i class="fa-solid fa-house icon1" id="homeicon"></i></a>

    </div>
   
    


</body>
</html>

