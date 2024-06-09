<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Checking if the claim request ID is set in the URL
if (isset($_GET['claimReq_id'])) {
    // Sanitizing the claim request ID to prevent SQL injection
    $request_id = mysqli_real_escape_string($connection, $_GET['claimReq_id']);

    // SQL query to delete the claim request with the specified ID
    $query = "DELETE FROM request WHERE reqId = $request_id";

    // Executing the deletion query
    $result = mysqli_query($connection, $query);

    // Checking if the deletion was successful
    if ($result) {
        // Redirecting to the insurance manager claim requests page after successful deletion
        header("Location: insMngrClaimReqs.php");
        exit();
    } 
    else {
        // Displaying an error message if deletion fails
        echo "Error deleting Claim Request: " . mysqli_error($connection);
    }

} 
else {
    // Displaying an error message if the claim request ID is not provided in the URL
    echo "Invalid request. Request ID not provided.";
}
?>
