<?php
// Starting the session and including the connection file
session_start();
require_once('connection.php');

// Redirecting to customer login page if session name is not set
if (!isset($_SESSION['name'])) {
    header("Location: customerLogin.php");
    exit(); 
}

// Getting the customer's name from the session
$customername = $_SESSION['name'];

// Querying the database to fetch customer details
$query1 = "SELECT * FROM customer WHERE cusName='{$customername }'";
$result1 = mysqli_query($connection, $query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Details</title>
    <link rel="stylesheet" href="css/customerchangeDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <!-- Header section -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="customerMyProfile.php"><i class="fa-solid fa-circle-left icon"></i></a>
        </div>
    </header>
   
    <!-- Form for changing customer details -->
    <form method="POST" action="" onsubmit="return validateForm()">
        <h3>Change Details</h3><br>
        <!-- Displaying customer name -->
        <label id="fulltxt">Full Name</label><span id="fullcolon">:</span><span id="fullname">
        <?php 
        echo $customername;
        ?>
    </span><br>
        <!-- Input fields for entering current and new passwords -->
        <label for="currpassword">Current Password<span class="colon" id="currcolon">:</span></label>
        <input type="text" id="currpassword" name="currpassword" required><br>
        <label for="newpassword">New Password<span class="colon" id="newcolon">:</span></label>
        <input type="password" id="newpassword" name="newpassword" required><br>
        <label for="confirmpassword">Confirm Password<span class="colon" id="confirmcolon">:</span></label>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>
        <!-- Displaying success or error messages -->
        <p id="txt">
        <?php
        if (isset($_POST['submit'])) {
            $currpassword = $_POST['currpassword'];
            $query = "SELECT * FROM customer WHERE cusName='{$customername}'";
            $result = mysqli_query($connection, $query);
           if ($result) {
                // Check if a row is returned
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result); 
                    if ($row['password'] == $currpassword) { 
                        $password = $_POST['newpassword'];
                        $query2 = "UPDATE customer SET password='{$password}' WHERE cusName='{$customername}'"; 
                        $result2 = mysqli_query($connection, $query2);
                        if ($result2) {
                            echo "<p class='success'>Password updated successfully</p>";
                        } 
                        else {
                            echo "<p class='error'>Error updating password: </p>" . mysqli_error($connection);
                        }
                    }
                     else {
                        echo "<p class='error'>Incorrect password</p>";
                    }
                } else {
                    echo "<p class='error'>No user found with the provided ID</p>";
                }
            } else {
                echo "<p class='error'>Error: </p>" . mysqli_error($connection);
            }
        }
        ?></p>
        <!-- Submit button -->
        <input type="submit" name="submit">
    </form>    

    <!-- Footer section -->
    <footer>
        <div class="footer">
        <img src="images/img5.png" id="logo">
        <ul id="hotline">
            <li id="hotlineh">Do you need any support</li>
            <li>011 255 7441</li>
            <li>011 255 7442</li></ul>
        
        <div class="contact">
            <h4>Get Social with us on</h4>
            <div class="logopanel">
                <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa-brands fa-facebook-f ficon"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram ficon"></i></a>
                <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin ficon"></i></a>
               <a href="https://twitter.com/x"> <i class="fa-brands fa-square-twitter ficon"></i></a>

            </div>
        </div>
        </div>
    </footer>

    <!-- JavaScript file for form validation -->
    <script src="js/validateCusPasswordChange.js"></script>
</body>
</html>
