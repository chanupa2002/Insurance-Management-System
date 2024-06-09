<?php
// Starting the session
session_start();

// Including the database connection file
require_once('connection.php');

// Redirecting to the insurance manager login page if the user is not logged in
if (!isset($_SESSION['name'])) {
    header('Location: insMngrLog.php');
}

// Initializing variables
$user_list = '';
$search = '';

// Checking if a search term is provided
if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    // Constructing the query with the search term
    $query = "SELECT * FROM request WHERE (cusName LIKE '%{$search}%' OR cusId LIKE '%{$search}%') AND requestDes IS NOT NULL ORDER BY reqId";
} else {
    // If no search term is provided, fetching all users
    $query = "SELECT * FROM request WHERE requestDes IS NOT NULL ORDER BY reqId";
}

// Executing the query
$users = mysqli_query($connection, $query);

// Generating HTML for displaying users
while ($user = mysqli_fetch_assoc($users)) {
    $user_list .= "<tr>";
    $user_list .= "<td>{$user['reqId']}</td>";
    $user_list .= "<td>{$user['cusId']}</td>";
    $user_list .= "<td>{$user['cusName']}</td>";
    $user_list .= "<td>{$user['requestType']}</td>";
    $user_list .= "<td>{$user['requestDes']}</td>";
    $user_list .= "<td><a href=\"deleteClaimReqs.php?claimReq_id={$user['reqId']}\" onclick=\"return confirm('Are you sure?');\"><button class='delete'>Delete</button></a></td>";
    $user_list .= "</tr>";
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Claim Requests</title>
    <link rel="stylesheet" href="css/insMngrClaimRequests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <a href="insMngrHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <h2>Customer Claim Requests</h2>
    <div class="search">
        <form action="insMngrClaimReqs.php" method="get">
            <p><input type="text" name="search" id="searchBox" placeholder="Type Name or Id & Press Enter" value="<?php echo $search; ?>" required autofocus></p>
        </form>
    </div>

    <main>
        <table class="masterlist">
            <tr>
                <th>Request Id</th>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>Request Type</th>
                <th>Request Description</th>
                <th>Delete</th>
            </tr>

            <?php echo $user_list; ?>
        </table>
    </main>

</body>
</html>

