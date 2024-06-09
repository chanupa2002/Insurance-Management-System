<?php
session_start();

require_once('connection.php');

// Checking if an insurance manager is logged in
if (!isset($_SESSION['name'])) {
    header('Location: insMngrLog.php');
}

// Retrieving user information if logged in
if (isset($_SESSION['name'])) {
    $uName = $_SESSION['name'];

    // Using prepared statement to prevent SQL injection
    $query = "SELECT * FROM insurance_manager WHERE name = ?";
    $stmt = mysqli_prepare($connection, $query);

    if (!$stmt) {
        die("Prepared statement failed. Error: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, "s", $uName);
    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);

    if (!$result_set) {
        die("Database query failed. Error: " . mysqli_error($connection));
    }

    // Fetching user profile information
    while ($row = mysqli_fetch_assoc($result_set)) {
        $id = $row['managerId'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        $startDate = $row['startDate'];

        // Displaying user profile picture
        foreach (json_decode($row["profilePicture"]) as $image) {
            $image = "<img src='uploads/{$image}' id='profimg'>";
        }
    }

    // Freeing the result set
    mysqli_free_result($result_set);

    // Closing the statement
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/insMngrMyprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="insMngrHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>

    <main>
        <h2>My Profile</h2>
        <p id="profileimg">
            <?php
                echo $image;
            ?>
        </p>

        <table>
            <tr>
                <th>Manager ID</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Manager Name</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><?php echo $mobile; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $address; ?></td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td><?php echo $startDate; ?></td>
            </tr>
        </table>
        
        <a href="insMngrChangeDetails.php" ><button id="changebtn">Change Details</button></a>
    </main>
</body>
</html>
