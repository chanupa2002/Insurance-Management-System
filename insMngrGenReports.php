<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Redirecting to the insurance manager login page if the user is not logged in
if (!isset($_SESSION['name'])) {
    header('Location: insMngrLog.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="css/insMngrGenReports.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <a href="insMngrHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
     </header>

     <h2>Yearly Payment Report</h2>

     <?php  echo "<button onclick='printTable()' id='printbtn' >Print Table</button><br><br>"; ?>

</body>

    <script src="js/printReport.js"> </script>

</html>

<?php

// Query to select data from payments table
$query = "SELECT cusName, jan, feb, march, april, may, june, july, aug, sep, oct, nov, december, package FROM payments";

$result = mysqli_query($connection, $query);

if ($result->num_rows > 0) {
    // Array to store monthly incomes
    $monthly_incomes = array_fill(0, 12, 0); // Initialize with zeros for each month

    // Loop through each row of the result
    while($row = $result->fetch_assoc()) {
        $package = $row["package"];
        $months = array("jan", "feb", "march", "april", "may", "june", "july", "aug", "sep", "oct", "nov", "december");
        
        // Loop through each month
        for ($i = 0; $i < 12; $i++) {
            if ($row[$months[$i]] == "PAID") {
                // Calculate the amount based on package
                if ($package == "gold") {
                    $amount = 20000;
                } elseif ($package == "silver") {
                    $amount = 15000;
                } elseif ($package == "platinum") {
                    $amount = 10000;
                }

                // Add the amount to monthly income
                $monthly_incomes[$i] += $amount;
            }
        }
    }

    // HTML table to display monthly incomes
 
    echo "<table border='1' id='incomeTable'>
            <tr>
                <th>Month</th>
                <th>Total Income (Rs.)</th>
            </tr>";
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    for ($i = 0; $i < 12; $i++) {
        echo "<tr>
                <td>".$months[$i]."</td>
                <td>".$monthly_incomes[$i]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}
?>
