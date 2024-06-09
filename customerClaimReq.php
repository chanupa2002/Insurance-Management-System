<?php
// Starting the session and including the connection file
session_start();
require_once('connection.php');

// Redirecting to customer login page if session name is not set
if (!isset($_SESSION['name'])) {
    header("Location: customerLogin.php");
    exit(); 
}
$customername = $_SESSION['name'];

// Query to fetch customer ID based on name
$query1 = "SELECT cusId FROM customer WHERE cusName='{$customername}'";
$result1 = mysqli_query($connection, $query1);
if($result1){
    $row = mysqli_fetch_assoc($result1);
    $customerId = $row['cusId'];
}
else{
    echo "Error: " . mysqli_error($connection);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Start the session named 'submit'
    $_SESSION['submit'] = true;
    
    $reqType=$_POST['reqType'];
    $description=$_POST['description'];
    $query="INSERT INTO request(";
    $query.= "cusId,cusName,requestType,requestDes";
    $query.=") VALUES (";
    $query.="'$customerId','$customername','$reqType','$description'"                          ;
    $query.=")";

    $result = mysqli_query($connection, $query);

    header("Location: requested.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Claim Requests</title>
    <link rel="stylesheet" href="css/customerClaimReq.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <!-- Header section -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="customerhome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        </div>
    </header>
    <!-- Claim Request Form -->
    <form  method="POST" enctype="multipart/form-data">
        <h3>Claim Request Form</h3>
        <label >Select the Request Type</label><span id="selectcolon">:</span>

        <select name="reqType">
            <option value="Preventive Care">Preventive Care</option>
            <option value="Medical Treatment">Medical Treatment</option>
            <option value="Emergency Care">Emergency Care</option>
            <option value="Dental and Vision Care">Dental and Vision Care</option>
            <option value="Other">Other</option>
        </select><br>
        <!-- Description input field -->
        <p><label for="description">Description<span id="desccolon">:</span></p></label>
        <textarea id="description" name="description" required></textarea>
        <!-- Submit button -->
        <input type="submit" value="submit" name="submit">
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
</body>
</html>
