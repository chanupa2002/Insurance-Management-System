<?php

// PHP code for handling form submission and database insertion

require_once('connection.php'); // Including the database connection file

session_start(); // Starting the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Starting the session named 'submit'
    $_SESSION['submit'] = true;
      
    // Retrieving form data
    
    $name = $_POST['name'];
    $password = $_POST['password'];
    $startDate = $_POST['startDate'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $totalFilesPhoto = count($_FILES['fileImg']['name']);
    $filesArrayPhoto = array();

    // Loop for processing uploaded images
    for($i=0; $i<$totalFilesPhoto; $i++){
        $imageName = $_FILES['fileImg']['name'][$i];
        $tmpName2 = $_FILES["fileImg"]["tmp_name"][$i];

        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));

        $newImageName = uniqid() . '.' . $imageExtension;

        move_uploaded_file($tmpName2, 'uploads/'. $newImageName);
        $filesArrayPhoto[] = $newImageName;
    }

    $filesArrayPhoto = json_encode($filesArrayPhoto);

    // Creating and executing the SQL query for inserting data into the database
    $query  = "INSERT INTO insurance_manager (";
    $query .= "name, email, mobile, address, startDate, password, profilePicture";
    $query .= ") VALUES (";
    $query .= "'$name', '$email', '$mobile', '$address', '$startDate', '$password', '$filesArrayPhoto'";
    $query .= ")";

    $result = mysqli_query($connection, $query);

    // Redirecting after form submission
    header("Location: regCompleteInsMngr.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>

<title>Add Ins Manager</title>
<link rel="stylesheet" href="css/admininsMngr_add.css">
<link rel="stylesheet" href="style/fa/css/font-awesome.min.css">
<link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>


<body>
  
<header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>

        <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        
  

    </header>

  <form  method="post" enctype="multipart/form-data" >
    <div class="formcontainer">
      <div class="left-input">
        <b>Full Name:</b><br>
        <input type="text" id="name" name="name"placeholder="Enter First Name"required> <br><br>

        <b>Email:</b><br>
        <input type="email" id="email" name="email"  placeholder="Enter Email" required><br><br>
        
        <b>Address:</b><br>
        <textarea id="address" name="address" rows="4" cols="30"  placeholder="Enter Address"required></textarea><br><br>
      </div>

    <div class="right-input">
        <b>Start Date:</b><br>
        <input type="date" id="dob" name="startDate"   required><br><br>
        <b>Mobile:</b><br>
        <input type="tel" id="mobile" name="mobile" placeholder="Enter number"required><br><br>
        <b>Password:</b><br>
        <input type="password" id="password" name="password" placeholder="Enter Password"required> <br><br>
		
	
    </div>
	
	</div>
    <small><b>Upload Profile Photo:</b></small><br>
    <input type="file" id="photo" name="fileImg[]" accept=".jpg,.png" multiple required><br><br>
    <input type="submit" value="Submit" name="submit">
  </form>
  
  <script src="js/validateCusDetails."js></script> 

</body>
</html>
