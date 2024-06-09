<?php 

// Starting the session
session_start();

// Including the connection file
require_once('connection.php');

// Checking if an Insurance Manager is logged in
if (!isset($_SESSION['name'])) {
    // Redirecting to the insurance manager login page if not logged in
    header('Location: insMngrLog.php');
}

// Getting the username from the session
$userName = $_SESSION['name'];

// Initializing variables for user list and search term
$user_list = '';
$search = '';

// Checking if search term is provided
if(isset($_GET['search'])){
    // Sanitizing the search term
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    // Constructing query to fetch users based on search term
    $query = "SELECT * FROM customer WHERE (cusName LIKE '%{$search}%' OR cusId LIKE '%{$search}%') AND approval IS NOT NULL ORDER BY cusId";
} else {
    // If search term is not provided, fetch all users
    $query = "SELECT * FROM customer WHERE approval IS NOT NULL ORDER BY cusId";
}

// Executing the query
$users = mysqli_query($connection, $query);

// Looping through the fetched users and preparing the user list
while ($user = mysqli_fetch_assoc($users)) {
    // Checking if the user's approval status is 1
    if($user['approval']==1){
        // Building the user list row
        $user_list .= "<tr>";
        $user_list .= "<td>{$user['cusId']}</td>";
        $user_list .= "<td>{$user['cusName']}</td>";
        $user_list .= "<td>{$user['cusEmail']}</td>";
        $user_list .= "<td>{$user['cusMobile']}</td>";
        $user_list .= "<td>{$user['cusDob']}</td>";
        $user_list .= "<td>{$user['cusAddress']}</td>";
        $user_list .= "<td>{$user['cusGender']}</td>";
        $user_list .= "<td>{$user['package']}</td>";
        // Adding a button to delete each user
        $user_list .= "<td><a href=\"deleteCustomer.php?user_id={$user['cusId']}\" onclick=\"return confirm('Are you sure?');\"><button class='delete'>Delete</button></a></td>";
        $user_list .= "</tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
    <link rel="stylesheet" href="css/insurancemanagercustomerdetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header>
        <!-- Header section -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <a href="insMngrHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        
</header>
<!-- Customer Details section -->
<h2>Customer Details</h2>

<div class="search">
    <!-- Search form -->
    <form action="customerDetailsWithDelete.php" method="get">
        <p><input type="text" name="search" id="searchBox" placeholder="Type Name or Id & Press Enter" value="<?php echo $search; ?>" required autofocus></p>
    </form>
</div>

<main>
    <!-- User table -->
    <table class="masterlist">
        <tr>
            <th id="firstcell">Customer Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Package</th>
            <th id="lastcell">DELETE</th>
        </tr>
        <?php echo $user_list; ?>
    </table>
</main>

</body>
</html>
