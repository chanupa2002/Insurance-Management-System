<?php
// Starting the session
session_start();

// Including the connection file
require_once('connection.php');

// Redirecting to customer login page if not logged in
if (!isset($_SESSION['name'])) {
    header("Location: customerLogin.php");
    exit(); 
}

// Getting the customer's name from the session
$customerName = $_SESSION['name'];

// Retrieving the customer's ID from the database
$query1 = "SELECT cusId FROM customer WHERE cusName='{$customerName}'";
$result1 = mysqli_query($connection, $query1);
if($result1){
    $row = mysqli_fetch_assoc($result1);
    $customerId = $row['cusId'];
} else {
    // Error handling if query fails
    echo "Error: " . mysqli_error($connection);
}

// Handling form submission for feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Setting a session variable
    $_SESSION['submit'] = true;
    
    // Getting the feedback from the form
    $feedback = $_POST['feedback'];

    // Constructing the SQL query to insert feedback into the database
    $query = "INSERT INTO feedback (cusId, cusName, feedback) VALUES ('$customerId', '$customerName', '$feedback')";
    
    // Executing the query
    $result = mysqli_query($connection, $query);

    // Redirecting to feedbacked.php page
    header("Location: feedbacked.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <link rel="stylesheet" href="css/customerFeedbacks.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <!-- Header section -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="customerHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <form  method="POST" enctype="multipart/form-data">
        <!-- Feedback form -->
        <img src="images/feedback.jpg" id="formbg">
        <h3>Give Customer Feedback</h3>
        <p><label for="description">Leave your Feedback here<span id="desccolon">:</span></p></label>
        <textarea id="description" name="feedback" required></textarea>
        <input type="submit" value="submit" name="submit">
    </form>
    <footer>
        <!-- Footer section -->
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
                    <a href="https://twitter.com/x"><i class="fa-brands fa-square-twitter ficon"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
