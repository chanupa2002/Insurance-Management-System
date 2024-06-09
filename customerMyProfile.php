<?php
session_start();

require_once('connection.php');

// checking if a customer is logged in
if (!isset($_SESSION['name'])) {
    header('Location: customerLog.php');
}



if (isset($_SESSION['name'])) {
    $uName = $_SESSION['name'];


    // Using prepared statement to prevent SQL injection
    $query = "SELECT * FROM customer WHERE cusName = ?";
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

    // Fetch and display all rows
    while ($row = mysqli_fetch_assoc($result_set)) {
        $id = $row['cusId'];
		$name = $row['cusName'];
        $email = $row['cusEmail'];
        $mobile = $row['cusMobile'];
        $dob = $row['cusDob'];
        $address = $row['cusAddress'];
        $gender = $row['cusGender'];
        $package = $row['package'];


        foreach (json_decode($row["profilePicture"]) as $image) {
            $image = "<img src='uploads/{$image}' id='profimg'>";
        }

    }
    

    // Free the result set
    mysqli_free_result($result_set);
    
    // Close the statement
    mysqli_stmt_close($stmt);

}

   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/customermyprofile.css">
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>

<header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <a href="customerhome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        </div>
    </header>

	<main>
            <h2>My Profile</h2>
			<p>
				<?php
					echo $image;
				?>
			</p>


		<table>

			<tr>
				<th>Custometr ID</th>
				<th><?php echo $id; ?></th>
			</tr>
			<tr>
				<th>customer Name</th>
				<th><?php echo $name; ?></th>
			</tr>
            <tr>
				<th>Email</th>
				<th><?php echo $email; ?></th>
			</tr>
			<tr>
				<th>Mobile</th>
				<th><?php echo $mobile; ?></th>
			</tr>
            <tr>
				<th>Date of Birth</th>
				<th><?php echo $dob; ?></th>
			</tr>
			<tr>
				<th>Address</th>
				<th><?php echo $address; ?></th>
			</tr>
            <tr>
				<th>Gender</th>
				<th><?php echo $gender; ?></th>
			</tr>
			<tr>
				<th>Package</th>
				<th><?php echo $package; ?></th>
			</tr>
			
		
		</table>

    
	
<a href="customerchangeDetails.php" id="changebtn">Change Details</a>
</main>
<footer>
        <div class="footer">
        <img src="images/img5.png" id="logo">
        <ul id="hotline">
            <li id="hotlineh">Do you need any support</li>
            <li>011 255 7441</li>
            <li>011 255 7442</li></ul>
        
        <div class="contact">
            <h4>Get Social with us on</h4>
            <div class="logopanel">

                <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa-brands fa-facebook-f ficon"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram ficon"></i></a>
                <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin ficon"></i></a>
               <a href="https://twitter.com/x"> <i class="fa-brands fa-square-twitter ficon"></i></a>

            </div>
        </div>
        </div>
</footer>

</body>
</html>
