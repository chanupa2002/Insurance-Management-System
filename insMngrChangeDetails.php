<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Redirecting to the insurance manager login page if the user is not logged in
if (!isset($_SESSION['name'])) {
    header("Location: insMngrLog.php");
    exit(); 
}

// Getting the manager's name from the session
$mngrName = $_SESSION['name'];

// Querying the database to fetch manager details
$query1 = "SELECT * FROM insurance_manager WHERE name='{$mngrName}'";
$result1 = mysqli_query($connection, $query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Details</title>
    <link rel="stylesheet" href="css/insMngrchangeDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="insMngrMyProfile.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
   
    <form method="POST" action="" onsubmit="return validateForm()">
        <h3>Change Details</h3><br>
        <label id="fulltxt">Full Name</label><span id="fullcolon">:</span><span id="fullname">
        <?php 
        echo $mngrName;
        ?>
    </span><br>
        <label for="currpassword">Current Password<span class="colon" id="currcolon">:</span></label>
        <input type="text" id="currpassword" name="currpassword" required><br>
        <label for="newpassword">New Password<span class="colon" id="newcolon">:</span></label>
        <input type="password" id="newpassword" name="newpassword" required><br>
        <label for="confirmpassword">Confirm Password<span class="colon" id="confirmcolon">:</span></label>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>
        <p id="txt">
        <?php
        // Handling form submission
        if (isset($_POST['submit'])) {
            $currpassword = $_POST['currpassword'];
            $query = "SELECT * FROM insurance_manager WHERE name='{$mngrName}'";
            $result = mysqli_query($connection, $query);
           if ($result) {
                // Check if a row is returned
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result); 
                    if ($row['password'] == $currpassword) { 
                        $password = $_POST['newpassword'];
                        $query2 = "UPDATE insurance_manager SET password='{$password}' WHERE name='{$mngrName}'"; 
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
                    echo "<p class='error'>No Manager found with the provided ID</p>";
                }
            } else {
                echo "<p class='error'>Error: </p>" . mysqli_error($connection);
            }
        }
        ?></p>
        <input type="submit" name="submit">
    </form>    


<script src="js/validateCusPasswordChange.js"></script>
                                                            
</body>
</html>
