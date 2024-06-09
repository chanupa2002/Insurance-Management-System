<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Checking if an Insurance Manager is logged in
if (!isset($_SESSION['name'])) {
    header('Location: insMngrLog.php'); // Redirecting to the login page if not logged in
}

$user_list = ''; // Initializing the variable to store the list of users
$search = ''; // Initializing the search term variable

// Checking if search term is available
if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']); // Sanitizing the search term
    $query = "SELECT * FROM feedback WHERE (cusName LIKE '%{$search}%' OR cusId LIKE '%{$search}%') AND feedback IS NOT NULL ORDER BY cusId";
} else {
    // Query to get the list of feedbacks if no search term is provided
    $query = "SELECT * FROM feedback WHERE feedback IS NOT NULL ORDER BY cusId";
}

// Executing the query to retrieve feedbacks
$users = mysqli_query($connection, $query);

// Looping through each feedback and generating HTML to display them in a table
while ($user = mysqli_fetch_assoc($users)) {
    $user_list .= "<tr>";
    $user_list .= "<td>{$user['feedbackId']}</td>";
    $user_list .= "<td>{$user['cusId']}</td>";
    $user_list .= "<td>{$user['cusName']}</td>";
    $user_list .= "<td>{$user['feedback']}</td>";
    $user_list .= "<td><a href=\"deleteFeedbacks.php?feedback_id={$user['feedbackId']}\" onclick=\"return confirm('Are you sure?');\"><button class='delete'>Delete</button></a></td>";
    $user_list .= "</tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Feedbacks</title>
    <link rel="stylesheet" href="css/insMngrViewFeedbacks.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <a href="insMngrHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <h2>Customer Feedbacks</h2>

    <!-- Search form -->
    <div class="search">
        <form action="insMngrViewFeedbacks.php" method="get">
            <p><input type="text" name="search" id="searchBox" placeholder="Type Name or Id & Press Enter" value="<?php echo $search; ?>" required autofocus></p>
        </form>
    </div>

    <!-- Main content displaying feedbacks in a table -->
    <main>
        <table class="masterlist">
            <tr>
                <th class="idcell">Feedback Id</th>
                <th class="idcell">Customer Id</th>
                <th id="cusnamecell">Customer Name</th>
                <th id="idcell">Feedback</th>
                <th id="lastcell">Delete</th>
            </tr>

            <?php echo $user_list; ?> <!-- Displaying the list of feedbacks -->
        </table>
    </main>

</body>
</html>
