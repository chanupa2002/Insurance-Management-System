<?php session_start(); ?> <!-- Start the session -->
<?php require_once('connection.php'); ?> <!-- Include the database connection file -->

<?php 

	// Check for form submission
	if (isset($_POST['submit'])) {

		$errors = array(); // Array to store errors

		// Check if there are any errors in the form
		if (empty($errors)) {
			// Save username and password into variables
			$userName = mysqli_real_escape_string($connection, $_POST['userName']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);

			// Prepare database query
			$query = "SELECT * FROM customer 
						WHERE cusEmail = '{$userName}' 
						AND password = '{$password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			// Check if a valid user is found
			if (mysqli_num_rows($result_set) == 1) {
				// Valid user found
				$row = $result_set->fetch_assoc(); // Fetch the row from the result set
				$_SESSION['name'] = $row['cusName']; // Set the session variable for user's name

				if($row['approval'] == 0){
					header('Location: cusNotApproved.php'); // Redirect to the page for unapproved users
					exit();
				}

				// Redirect to customer home page
				header('Location: customerHome.php?name=' . $_SESSION['name']);

			} else {
				// Username and password invalid
				$errors[] = 'Invalid Username / Password'; // Add error message to the errors array
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Login</title>
	<link rel="stylesheet" href="css/customerLogin.css">
</head>

<body>
	<img src="images/cuslogin3.jpeg" id="bgimg"> <!-- Background image -->
	<div class="formcontainer">
	<form action="#" method="post">
		<h2>Log In</h2>	<br>
		<div class="field-holder">
			<input type="email" name="userName" required>
			<label> Email</label>
		</div><br>
		
		<div class="field-holder">
			<input type="password" name="password" required>
			<label> Password</label>
			
			<?php 
				// Display error message if errors array is not empty
				if (isset($errors) && !empty($errors)) {
					echo '<p class="error">Invalid Username or Password</p>';
				}
			?>

		</div>
		
		<button type="submit" class="btn-login" name="submit">LOGIN</button>
		<br>
	
		<br>
		<div class="signupcontainer">
			<p> Don't have an account? <a href = "customerRegistration.php">Sign Up</a></p>
		</div>
		
	
		<a href="adminLogin.php" class="admin-login">Admin Login</a>
	</form>
	<a href="Website/Home page.html" id="backtohometxt"> <- Back to Home</a> 
	</div>
	
</body>
</html> 
