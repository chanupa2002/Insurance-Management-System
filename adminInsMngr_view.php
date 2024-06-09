<?php session_start(); ?>
<?php require_once('connection.php'); ?>

<?php 

$user_list = '';

$search = '';


// checking search term available or not
if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query = "SELECT * FROM insurance_manager WHERE (name LIKE '%{$search}%' OR managerId LIKE '%{$search}%') AND password IS NOT NULL ORDER BY managerId";
} else {
    // getting the list of users
    $query = "SELECT * FROM insurance_manager WHERE password IS NOT NULL ORDER BY managerId";
}

    $users = mysqli_query($connection, $query);

    while ($user = mysqli_fetch_assoc($users)) {
            $user_list .= "<tr>";
            $user_list .= "<td>{$user['managerId']}</td>";
            $user_list .= "<td>{$user['name']}</td>";
            $user_list .= "<td>{$user['email']}</td>";
            $user_list .= "<td>{$user['mobile']}</td>";
            $user_list .= "<td>{$user['address']}</td>";
            $user_list .= "<td>{$user['startDate']}</td>";
            $user_list .= "<td><a href=\"deleteInsMngr.php?user_id={$user['managerId']}\" onclick=\"return confirm('Are you sure?');\"><button class='delete'>Delete</button></a></td>";
            $user_list .= "</tr>";
    }
 ?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ins Manager Details</title>
    <link rel="stylesheet" href="css/adminInsMngr_view.css">
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>
<header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>

        <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        
</header>

<h2>Insurance Manager Details</h2>
    <div class="search">
        <form action="adminInsMngr_view.php" method="get">
            <p><input type="text" name="search" id="searchBox" placeholder="Type Name or Id & Press Enter" value="<?php echo $search; ?>" required autofocus></p>
        </form>
    </div>

    <main>
        <table class="masterlist">
            <tr>
                <th>Insurance Manager Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Start Date</th>
                <th id="lastcell">Delete</th>
            </tr>

            <?php echo $user_list; ?>
        </table>
    </main>

</body>
</html> 
