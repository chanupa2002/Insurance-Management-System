<?php
session_start();

require_once('connection.php');

// checking if a customer is logged in
if (!isset($_SESSION['name'])) {
    header('Location: customerLog.php');
}

if (isset($_SESSION['name'])) {
    $uName = $_SESSION['name'];

    $user_list = "";

    // Using prepared statement to prevent SQL injection
    $query = "SELECT * FROM payments WHERE cusName = ?";
    $stmt = mysqli_prepare($connection, $query);

    if (!$stmt) {
        die("Prepared statement failed. Error: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, "s", $uName);
    mysqli_stmt_execute($stmt);
    

    $result_set = mysqli_stmt_get_result($stmt);

    if (!$result_set) {
        die("Database query failed. Error: " . mysqli_error($connection));
    }

    while ($user = mysqli_fetch_assoc($result_set)) {
        if($user['approval']==1){
            $user_list .= "<tr>";
            $user_list .= "<td>January</td><td>{$user['jan']}</td>";
            $user_list .= "</tr>";
            $user_list .= "<tr><td>February</td><td>{$user['feb']}</td></tr>";
            $user_list .= "<tr><td>March</td><td>{$user['march']}</td></tr>";
            $user_list .= "<tr><td>April</td><td>{$user['april']}</td></tr>";
            $user_list .= "<tr><td>May</td><td>{$user['may']}</td></tr>";
            $user_list .= "<tr><td>June</td><td>{$user['june']}</td></tr>";
            $user_list .= "<tr><td>July</td><td>{$user['july']}</td></tr>";
            $user_list .= "<tr><td>August</td><td>{$user['aug']}</td></tr>";
            $user_list .= "<tr><td>September</td><td>{$user['sep']}</td></tr>";
            $user_list .= "<tr><td>October</td><td>{$user['oct']}</td></tr>";
            $user_list .= "<tr><td>November</td><td>{$user['nov']}</td></tr>";
            $user_list .= "<tr><td>December</td><td>{$user['december']}</td></tr>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Payments</title>
    <!-- Including CSS files -->
    <link rel="stylesheet" href="css/customerPayments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<header>
    <img src="images/img5.png" id="logo">
    <h1>Wellness First Health Insurance</h1>
    <a href="customerhome.php"><i class="fa-solid fa-circle-left icon"></i></a>
</header>

<table>
    <!-- Table to display payment details -->
    <tr>
        <th id="firstcell">Month</th>
        <th id="lastcell">Payment Status</th>
    </tr>
    <?php  echo $user_list; ?>
</table>

<div id="paybtn">
    <!-- Payment button -->
    <a href="customerPayments.php"><i class="fa-regular fa-credit-card  payicon" id="pay"></i>
        <p id="paytxt">Proceed To Pay</p>
    </a>
</div> 

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
               <a href="https://twitter.com/x"> <i class="fa-brands fa-square-twitter ficon"></i></a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
