<?php
session_start(); // Starting the session
require_once('connection.php'); // Including the connection file
$customername = $_GET['user_id']; // Getting user ID from URL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Details</title>
    <link rel="stylesheet" href="css/adminchangeDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
   
    <form method="POST" action="">
        <h3>Change Details</h3><br>
        <label id="fulltxt">Full Name</label><span id="fullcolon">:</span><span id="fullname">
        <?php 
        echo $customername; // Displaying customer name
        ?>
        </span><br>
        <label for="cusEmail">Customer Email<span class="colon" id="cusemail">:</span></label>
        <input type="text" id="cusEmail" name="cusEmail"><br>
        <label for="cusMobile">Customer Mobile<span class="colon" id="cusmobitel">:</span></label>
        <input type="text" id="cusMobile" name="cusMobile"><br>
        <p id="txt">
        <?php
        if (isset($_POST['submit'])) { // Checking if form submitted
            $cusEmail = $_POST['cusEmail']; // Assuming customer email
			$cusMobile = $_POST['cusMobile']; // Assuming customer mobile number
            $query = "SELECT * FROM customer WHERE cusName='{$customername}'"; // Getting the customer related to the customer name
            $result = mysqli_query($connection, $query); // Executing the query
            if ($result) {
                if (mysqli_num_rows($result) == 1) { // Checking if rows set

                    if(!empty($cusEmail)){
                        $row = mysqli_fetch_assoc($result);
                        $query2 = "UPDATE customer SET cusEmail='{$cusEmail}' WHERE cusName='{$customername}'"; // Updating customer email
                        $result2 = mysqli_query($connection, $query2); // Executing the query
                        if ($result2) {
                            echo "<p class='success'>Email updated successfully</p>";
                        } else {
                            echo "<p class='error'>Error updating Email ! </p>" . mysqli_error($connection);
                        }
                    }
                    
                    if(!empty($cusMobile)){
                        $query3 = "UPDATE customer SET cusMobile='{$cusMobile}' WHERE cusName='{$customername}'"; // Updating customer mobile
                        $result3 = mysqli_query($connection, $query3);
                        if ($result3) {
                            echo "<p class='success'>Mobile Number updated successfully</p>";
                        } else {
                            echo "<p class='error'>Error updating Mobile Number ! </p>" . mysqli_error($connection);
                        }
                    }
                    
                } else {
                    echo "<p class='error'>No user found with the provided ID</p>";
                }
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
        ?></p>
        <input type="submit" name="submit" id="submitbtn">
    </form>    

    <script src="js/validateCusPassword.js"></script>
</body>
</html>
