<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// SQL query to delete all notices
$query = "DELETE FROM notices";

// Executing the query
$result = mysqli_query($connection, $query);

// Checking if the deletion was successful
if ($result) {
    // Redirecting to the admin update notices page after successful deletion
    header("Location: adminUpdateNotices.php");
    exit();
} 
else {
    // Displaying an error message if deletion fails
    echo "Error deleting All Notices ! " . mysqli_error($connection);
}
?>
