<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Checking if the insurance manager ID is set in the URL
if (isset($_GET['user_id'])) {
    // Sanitizing the insurance manager ID to prevent SQL injection
    $insMngr_id = mysqli_real_escape_string($connection, $_GET['user_id']);

    // SQL query to delete the insurance manager entry
    $query = "DELETE FROM insurance_manager WHERE managerId = $insMngr_id";

    // Executing the deletion query
    $result = mysqli_query($connection, $query);

    // Checking if the deletion was successful
    if ($result) {
        // Redirecting to the insurance manager view page after successful deletion
        header("Location: adminInsMngr_view.php");
        exit();
    } 
    else {
        // Displaying an error message if deletion fails
        echo "Error deleting Insurance Manager ! " . mysqli_error($connection);
    }

} else {
    // Displaying an error message if the insurance manager ID is not provided in the URL
    echo "Invalid request. Insurance Manager ID not provided.";
}
?>
