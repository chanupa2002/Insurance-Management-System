<?php session_start(); 

require_once('connection.php');         // Including Connection file


    $user_list = '';

    $search = '';


    // checking search term available or not
    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($connection, $_GET['search']);
        $query = "SELECT * FROM customer WHERE (cusName LIKE '%{$search}%' OR cusId LIKE '%{$search}%') AND approval IS NOT NULL ORDER BY cusId";
    } else {
        // getting the list of customer registration requests
        $query = "SELECT * FROM customer WHERE approval IS NOT NULL ORDER BY cusId";
    }

    $users = mysqli_query($connection, $query);

    // preparing customer registration requests as a table
    while ($user = mysqli_fetch_assoc($users)) {
        if($user['approval']==0){
            $user_list .= "<tr>";
            $user_list .= "<td>{$user['cusId']}</td>";
            $user_list .= "<td>{$user['cusName']}</td>";
            $user_list .= "<td>{$user['cusEmail']}</td>";
            $user_list .= "<td>{$user['cusMobile']}</td>";
            $user_list .= "<td>{$user['cusDob']}</td>";
            $user_list .= "<td>{$user['cusAddress']}</td>";
            $user_list .= "<td>{$user['cusGender']}</td>";
            $user_list .= "<td>{$user['package']}</td>";
            $user_list .= "<td><a href=\"approval.php?user_id={$user['cusId']}\"><button class='approve'>Approve</button></a></td>";
            $user_list .= "</tr>";
        }
        
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Requests</title>
    <link rel="stylesheet" href="css/adminRegRequests.css">
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>

    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>

        <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <h2>Customer Registration Requests</h2>
    <div class="search">
        <form action="adminRegRequests.php" method="get">
            <p><input type="text" name="search" id="searchBox" placeholder="Type Name or Id & Press Enter" value="<?php echo $search; ?>" required autofocus></p>
        </form>

    </div>

    <main>
        <table class="masterlist">
            <tr>
                <th>Customer Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Package</th>
                <th>APPROVE</th>
            </tr>

            <?php echo $user_list;         // printing customer registration requests in the table ?>
        </table>
    </main>

    <div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>

</body>
</html>
