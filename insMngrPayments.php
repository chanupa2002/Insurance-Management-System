<?php session_start(); ?>
<?php require_once('connection.php'); ?>

<?php 
    // Initialize variables
    $user_list = '';
    $search = '';

    // Checking if search term is provided
    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($connection, $_GET['search']); // Sanitize search term
        // Query to retrieve payments based on search term
        $query = "SELECT * FROM payments WHERE (cusName LIKE '%{$search}%' OR cusId LIKE '%{$search}%') AND approval = 1 ORDER BY cusId";
    } else {
        // Query to retrieve all payments if no search term is provided
        $query = "SELECT * FROM payments WHERE approval IS NOT NULL ORDER BY cusId";
    }

    // Execute the query
    $users = mysqli_query($connection, $query);

    // Loop through payment records and generate HTML for displaying in table
    while ($user = mysqli_fetch_assoc($users)) {
        if($user['approval']==1){
            $user_list .= "<tr>";
            $user_list .= "<td>{$user['cusId']}</td>";
            $user_list .= "<td>{$user['cusName']}</td>";
            $user_list .= "<td>{$user['package']}</td>";
            $user_list .= "<td>{$user['jan']}</td>";
            $user_list .= "<td>{$user['feb']}</td>";
            $user_list .= "<td>{$user['march']}</td>";
            $user_list .= "<td>{$user['april']}</td>";
            $user_list .= "<td>{$user['may']}</td>";
            $user_list .= "<td>{$user['june']}</td>";
            $user_list .= "<td>{$user['july']}</td>";
            $user_list .= "<td>{$user['aug']}</td>";
            $user_list .= "<td>{$user['sep']}</td>";
            $user_list .= "<td>{$user['oct']}</td>";
            $user_list .= "<td>{$user['nov']}</td>";
            $user_list .= "<td>{$user['december']}</td>";
            $user_list .= "</tr>";
        }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Payments</title>
    <link rel="stylesheet" href="css/insMngrPayments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header>
    <!-- Header section -->
    <img src="images/img5.png" id="logo">
    <h1>Wellness First Health Insurance Management System</h1>
    <a href="insMngrHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
</header>

<h2>Customer Payments</h2>

<!-- Search form -->
<div class="search">
    <form action="insMngrPayments.php" method="get">
        <p><input type="text" name="search" id="searchBox" placeholder="Type Name or Id & Press Enter" value="<?php echo $search; ?>" required autofocus></p>
    </form>
</div>

<main>
    <!-- Table to display payments -->
    <table class="masterlist">
        <tr>
            <th id="firstcell">Customer Id</th>
            <th id="namecell">Name</th>
            <th>Package</th>
            <th class="rotatecell"><div>January</div></th>
            <th class="rotatecell"><div>February</div></th>
            <th class="rotatecell"><div>March</div></th>
            <th class="rotatecell"><div>April</div></th>
            <th class="rotatecell"><div>May</div></th>
            <th class="rotatecell"><div>June</div></th>
            <th class="rotatecell"><div>July</div></th>
            <th class="rotatecell"><div>August</div></th>
            <th class="rotatecell"><div>September</div></th>
            <th class="rotatecell"><div>October</div></th>
            <th class="rotatecell"><div>November</div></th>
            <th class="rotatecell" id="lastcell"><div>December</div></th>
        </tr>
        <!-- Display payment records -->
        <?php echo $user_list; ?>
    </table>
</main>
</body>
</html>

  