<?php
session_start(); 
require_once('connection.php'); // Including Connection file

$user_id = '';

if (isset($_GET['user_id'])) {
    // getting the customer information
    $user_id =  $_GET['user_id'];
    $query1 = "UPDATE customer SET approval=1 WHERE cusId = {$user_id} LIMIT 1";   //updating approval column of Customer table
    $result1 = mysqli_query($connection, $query1);

    $query2 = "UPDATE payments SET approval=1 WHERE cusId = {$user_id} LIMIT 1";   //updating approval column of Payments table
    $result2 = mysqli_query($connection, $query2);
    
    // Redirect to adminHome.php after processing
    header("Location: customerDetails.php");
    exit(); // Ensure no further output is sent
}
?>
