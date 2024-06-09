<?php session_start(); ?>
<?php require_once('connection.php'); ?>

<?php 

	// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$userName 		= mysqli_real_escape_string($connection, $_POST['userName']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);

			// prepare database query
			$query = "SELECT * FROM insurance_manager 
						WHERE email = '{$userName}' 
						AND password = '{$password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			// check if the query was successful
			if ($result_set) {
				if (mysqli_num_rows($result_set) == 1) {
					// valid user found
					$row = $result_set->fetch_assoc();
					$_SESSION['name'] = $row['name'];

					// redirect to the insurance manager home page
					header('Location: insMngrHome.php?name=' . $_SESSION['name']);
				} else {
					// user name and password invalid
					$errors[] = 'Invalid Username / Password';
				}
			} else {
				// database query failed
				$errors[] = 'Database query failed.';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insurance Manager Login</title>
    <link rel="stylesheet" href= "css/insMngrLog.css.">
</head>
<body>
    <div class="login">
        <div class="myform">
            <form action="" method="post">
                <h2>Insurance Manager Login</h2>
                <input type="text" placeholder="Name" name="userName">
                <input type="password" placeholder="Password " name="password">
                <?php 
                    // Display error message if login fails
                    if (isset($errors) && !empty($errors)) {
                        echo '<p class="error">Invalid Username / Password</p>';
                    }
                ?>
                <button type="submit" name="submit" class="btn">Log In</button><br><br>
                <!-- <input type="submit" name="submit"> -->
                <a href="Website/Home page.html" id="backtohometxt"> <- Back to Home</a>
            </form>
            <?php 
                // Display success message if logged out
                if (isset($_GET['logout'])) {
                    echo '<p class="info">You have successfully logged out !</p>';
                }
            ?>
        </div>
        <div class="image">
            <img src="images/Login2.jpeg" width="300px" height="300px">
        </div>
    </div>
</body>
</html>
