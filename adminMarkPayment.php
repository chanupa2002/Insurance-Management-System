<?php 

session_start(); 

require_once('connection.php');   			// Including Connection file

	$errors = array();				// creating errors array

	$user_id = '';
	$name = '';

	$jan = '';
	$feb = '';
	$march = '';
	$april = '';
	$may = '';
	$june = '';
	$july = '';
	$aug = '';
	$sep = '';
	$oct = '';
	$nov = '';
	$december = '';


	if (isset($_GET['user_id'])) {
		// getting customer information
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$query = "SELECT * FROM payments WHERE cusId = {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// customer found
				$result = mysqli_fetch_assoc($result_set);
				$user_id = $result['cusId'];
				$name = $result['cusName'];

				$jan = $result['jan'];     // Assigning payment month details to the variables
				$feb = $result['feb'];
				$march = $result['march'];
				$april = $result['april'];
				$may = $result['may'];
				$june = $result['june'];
				$july = $result['july'];
				$aug = $result['aug'];
				$sep = $result['sep'];
				$oct = $result['oct'];
				$nov = $result['nov'];
				$december = $result['december'];


			} else {
				// customer account not found
				header('Location: adminPayments.php?err=customer_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: adminPayments.php?err=query_failed');
		}

	}
    
	if (isset($_POST['submit'])) {
		$query="";
		$payment = $_POST['payment'];

		$std = $_POST['std'];

        echo $std;

		if (empty($errors)) {

			// no errors found .... updating new payment
			$payment = mysqli_real_escape_string($connection, $_POST['payment']);

            

			if ($payment == "Jan_paid") {
				$query = "UPDATE payments SET jan = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "Feb_paid") {
				$query = "UPDATE payments SET feb = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "March_paid") {
				$query = "UPDATE payments SET march = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "April_paid") {
				$query = "UPDATE payments SET april = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "May_paid") {
				$query = "UPDATE payments SET may = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "June_paid") {
				$query = "UPDATE payments SET june = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "July_paid") {
				$query = "UPDATE payments SET july = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "Aug_paid") {
				$query = "UPDATE payments SET aug = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "Sep_paid") {
				$query = "UPDATE payments SET sep = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "Oct_paid") {
				$query = "UPDATE payments SET oct = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "Nov_paid") {
				$query = "UPDATE payments SET nov = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}

			else if ($payment == "December_paid") {
				$query = "UPDATE payments SET december = 'PAID' WHERE cusId = {$std} LIMIT 1";
			}
			

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to Admin Payments page
				header('Location: adminPayments.php?customer_payment=done');
			} else {
				$errors[] = 'Failed to modify the payment.';
			}

		}
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Payments</title>
	<link rel="stylesheet" href="css/adminMarkPayment.css">
	<link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>

        <a href="adminPayments.php"><i class="fa-solid fa-circle-left icon"></i></a>
        
</header>

		<?php 

			if (!empty($errors)) {
				display_errors($errors);     //Displaying errors
			}

		?>

		
	<div class="container">

	<form action="adminMarkPayment.php" method="post" class="add-product-form">
			
			<h3>New Payment</h3>
				<p class="desc">
				<label for="cusid">Customer ID<span id="idcolon">:</span> </label>
				<span id="cusid"><?php echo $user_id; ?></span><br>
		</p>
		<p class="desc">
				<label for="cusname">Customer Name<span id="namecolon">:</span>  </label>
				<span id="cusname"><?php echo $name; ?></span><br>
				</p>	

			<p class="desc"><label>Select Month</label><span id="selectcolon">:</span> 
                <select name = "payment" class="" required>
                    <option value = "payment">Month</option>
                    <option value = "Jan_paid">January</option>
                    <option value = "Feb_paid">February</option>
                    <option value = "March_paid">March</option>
                    <option value = "April_paid">April</option>
                    <option value = "May_paid">May</option>
                    <option value = "June_paid">June</option>
                    <option value = "July_paid">July</option>
                    <option value = "Aug_paid">August</option>
					<option value = "Sep_paid">September</option>
                    <option value = "Oct_paid">October</option>
                    <option value = "Nov_paid">November</option>
                    <option value = "December_paid">December</option>
                </select>
            </p>

			<p>
				<input type="hidden" name="std" value="<?php echo $user_id; ?>">
			</p>

			<p class="desc">
				<label for="">&nbsp;</label>
				<button type="submit" name="submit" class="btn">Pay</button>
			</p>

		</form>

	</div>

</body>
</html> 
