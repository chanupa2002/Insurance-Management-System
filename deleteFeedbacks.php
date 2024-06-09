<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Checking if the feedback ID is set in the URL
if (isset($_GET['feedback_id'])) {
    // Sanitizing the feedback ID to prevent SQL injection
    $feedback_id = mysqli_real_escape_string($connection, $_GET['feedback_id']);

    // SQL query to delete the feedback entry
    $query = "DELETE FROM feedback WHERE feedbackId = $feedback_id";

    // Executing the deletion query
    $result = mysqli_query($connection, $query);

    // Checking if the deletion was successful
    if ($result) {
        // Redirecting to the feedback view page after successful deletion
        header("Location: insMngrViewFeedbacks.php");
        exit();
    } 
    else {
        // Displaying an error message if deletion fails
        echo "Error deleting Customer Feedback: " . mysqli_error($connection);
    }

} 
else {
    // Displaying an error message if the feedback ID is not provided in the URL
    echo "Invalid request. Feedback ID not provided.";
}
?>
