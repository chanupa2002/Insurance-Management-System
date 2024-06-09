<?php
    require_once('connection.php'); // Including the database connection file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> <!-- Linking to Font Awesome for icons -->
    <link rel="stylesheet" href="css/adminHome.css"> <!-- Linking to the CSS file for styling -->
</head>
<body>
    <header>
        <!-- Logo and title of the system -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <div class="logoutpanel">
            <!-- Log out button -->
            <a href="adminLogin.php"><button id="logoutbtn">Log out</button></a>
        </div>
    </header>
    <!-- Navigation buttons for carousel -->
    <button id="nextbtn">&#10095</button>
    <button id="backbtn">&#10094</button>
    <div class="panel">
        <!-- First row of options -->
        <div class="firstrow">
            <!-- Link to registration requests page -->
            <a href="adminRegRequests.php" class="linkbox">
                <div class="box">
                    <i class="fa-solid fa-bell icon" id="bell"></i>
                    <p id="regtext">Registration Requests</p>
                </div>
            </a>
            <!-- Link to customer details page -->
            <a href="customerDetails.php" class="linkbox">
                <div class="box">
                    <i class="fa-solid fa-circle-info icon"></i>
                    <p id="custext">Customer Details</p>
                </div>
            </a>
            <!-- Link to payments page -->
            <a href="adminPayments.php" class="linkbox">
                <div class="box">
                    <i class="fa-regular fa-credit-card icon"></i>
                    <p>Payments</p>
                </div>
            </a>
        </div>
        <!-- Second row of options -->
        <div class="secondrow">
            <!-- Link to update ads page -->
            <a href="adminupdateAd.php" class="linkbox secondbox" id="adbox">
                <div class="box">
                    <i class="fa-solid fa-rectangle-ad icon"></i>
                    <p>Update Ads</p>
                </div>
            </a>
            <!-- Link to update notices page -->
            <a href="adminupdateNotices.php" class="linkbox secondbox" id="noticebox">
                <div class="box">
                    <i class="fa-solid fa-file-pen icon"></i>
                    <p id="noticetxt">Update Notices</p>
                </div>
            </a>
        </div>
    </div>
    <!-- Third row of options -->
    <div class="thirdrow">
        <!-- Link to view insurance manager details page -->
        <a href="adminInsMngr_view.php" class="linkbox secondbox" id="adbox">
            <div class="box">
                <i class="fa-solid fa-users icon"></i>
                <p id="managerdetails">Insurance Manager Details</p>
            </div>
        </a>
        <!-- Link to add insurance manager page -->
        <a href="admininsMngr_add.php" class="linkbox secondbox" id="noticebox">
            <div class="box">
                <i class="fa-solid fa-user-plus icon"></i>
                <p id="noticetxt">Add Insurance Manager</p>
            </div>
        </a>
    </div>
    <!-- Including JavaScript file -->
    <script src="js/adminhome.js"></script>
</body>
</html>
