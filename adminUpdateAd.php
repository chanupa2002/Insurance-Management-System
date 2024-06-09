<?php
    // Include the database connection file
    require_once('connection.php');

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the total number of files uploaded
        $totalFiles = count($_FILES['fileImg']['name']);
        $filesArray = array(); // Array to store uploaded file names

        // Loop through each uploaded file
        for($i = 0; $i < $totalFiles; $i++){
            $imageName = $_FILES['fileImg']['name'][$i]; // Get the original name of the file
            $tmpName = $_FILES["fileImg"]["tmp_name"][$i]; // Get the temporary file path
        
            // Extract the file extension
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
        
            // Generate a unique name for the file
            $newImageName = uniqid() . '.' . $imageExtension;
        
            // Move the uploaded file to the 'uploads' directory
            move_uploaded_file($tmpName, 'uploads/' . $newImageName);
            $filesArray[] = $newImageName; // Add the file name to the array
        }

        // Convert the array of file names to a JSON string
        $filesArray = json_encode($filesArray);

        // Prepare the SQL statement to insert the file names into the database
        $insertQuery = "INSERT INTO advertisements (adImg) VALUES (?)";
        $statement = mysqli_prepare($connection, $insertQuery);
        if (!$statement) {
            echo "Failed to prepare statement: " . mysqli_error($connection);
            exit;
        }
        
        // Bind the parameter to the prepared statement
        mysqli_stmt_bind_param($statement, "s", $filesArray);
        
        // Execute the prepared statement
        $insertResult = mysqli_stmt_execute($statement);
        
        // Close the prepared statement
        mysqli_stmt_close($statement);

        // Check if the insertion was successful
        if ($insertResult) {
            // Redirect to admin home page with a success message
            header('Location: adminHome.php?ad_added_successfully');
        } else {
            // Display an error message if insertion fails
            echo "Failed to add the new advertisement: " . mysqli_error($connection);
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Advertisement</title>
    <link rel="stylesheet" href="css/adminupdateAd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <!-- Header section -->
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance Management System</h1>
        <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
    </header>
    <div class="container">
        <!-- Form to upload advertisement -->
        <h2>Upload Advertisement</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fileupload">Select File</label>
            <input type="file" id="fileupload" name="fileImg[]" accept=".png, .jpg, .jpeg" onchange="displayFileName()">
            <input id="filename" type="text" value="File Name">
            <input type="submit" value="Upload" name="submit">
        </form>
    </div>
    <script src="js/uploadad.js"></script> <!-- JavaScript file for displaying file name -->
</body>
</html>
