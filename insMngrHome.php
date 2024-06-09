<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Checking if an Insurance Manager is logged in
if (!isset($_SESSION['name'])) {
    // Redirecting to the Insurance Manager login page if not logged in
    header('Location: insMngrLog.php');
}

// Storing the Insurance Manager's name from the session
$userName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Manager Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/insuranceManagerhome.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <div class="hpanel">
            <div class="userpanel">
                <!-- Displaying a greeting message with the Insurance Manager's name -->
                <p id="hellotxt">Hello <?php echo $userName?>!</p>
                <i class="fa-regular fa-user icon1" id="usericon"></i>
            </div>
            <div class="logoutpanel">
                <!-- Link to log out -->
                <a href="insMngrLogOut.php"><button id="logoutbtn">Log out</button></a>
            </div>
        </div>
    </header>

    <div class="panel">
        <div class="firstrow" >
            <!-- Links to different sections -->
            <a href="customerDetailsWithDelete.php" class="linkbox">
                <div class="box">
                    <i class="fa-solid fa-circle-info  icon"></i>
                    <p id="regtext">Customer Details</p>
                </div>
            </a>
            <a href="insMngrPayments.php" class="linkbox">
                <div class="box">
                    <i class="fa-solid fa-money-check icon"></i>
                    <p id="custext">Payments</p>
                </div>
            </a>
            <a href="insMngrViewFeedbacks.php" class="linkbox">
                <div class="box">
                    <i class="fa-solid fa-comment icon"></i>
                    <p>Customer Reviews</p>
                </div>
            </a>
        </div>
       
        <div class="secondrow">
            <!-- Links to additional sections -->
            <a href="insMngrGenReports.php" class="linkbox secondbox" id="adbox">
                <div class="box">
                    <i class="fa-solid fa-file-invoice icon"></i>
                    <p>Monthly Reports</p>
                </div>
            </a>
            <a href="insMngrClaimReqs.php" class="linkbox secondbox" id="noticebox">
                <div class="box">
                    <i class="fa-solid fa-file-pen  icon"></i>
                    <p id="noticetxt">Claim Requests</p>
                </div>
            </a>
            <a href="insMngrMyProfile.php" class="linkbox secondbox" id="adbox">
                <div class="box">
                    <i class="fa-solid fa-user icon"></i>
                    <p>My Profile</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
