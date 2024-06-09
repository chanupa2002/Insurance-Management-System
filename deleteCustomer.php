<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Checking if the user ID is set in the URL
if (isset($_GET['user_id'])) {
    // Sanitizing the user ID to prevent SQL injection
    $cus_id = mysqli_real_escape_string($connection, $_GET['user_id']);

    // SQL queries to delete the customer and associated payment records
    $query1 = "DELETE FROM customer WHERE cusId = $cus_id";
    $query2 = "DELETE FROM payments WHERE cusId = $cus_id";

    // Executing the deletion queries
    $result1 = mysqli_query($connection, $query1);
    $result2 = mysqli_query($connection, $query2);

    // Checking if the deletions were successful
    if ($result1 || $result2) {
        // Redirecting to the customer details page after successful deletion
        header("Location: customerDetailsWithDelete.php");
        exit();
    } 
    else {
        // Displaying an error message if deletion fails
        echo "Error deleting Customer: " . mysqli_error($connection);
    }

} else {
    // Displaying an error message if the customer ID is not provided in the URL
    echo "Invalid request. Customer ID not provided.";
}
?>
