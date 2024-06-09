<?php
// Including the connection file
require_once('connection.php');

// If the form is submitted
if (isset($_POST['submit'])) {

    // Counting the total number of files uploaded
    $totalFiles = count($_FILES['pdfFile']['name']);
    $filesArray = array();

    // Looping through each uploaded file
    for($i = 0; $i < $totalFiles; $i++) {
        // Getting the name and temporary name of the file
        $pdfName = $_FILES['pdfFile']['name'][$i];
        $tmpName = $_FILES["pdfFile"]["tmp_name"][$i];

        // Getting the extension of the file
        $pdfExtension = pathinfo($pdfName, PATHINFO_EXTENSION);

        // Generating a unique name for the file
        $newPdfName = uniqid() . '.' . $pdfExtension;

        // Moving the uploaded file to the 'uploads' directory
        if (move_uploaded_file($tmpName, 'uploads/' . $newPdfName)) {
            $filesArray[] = $newPdfName;
        } else {
            // If failed to move the file, display an error and exit
            echo "Failed to move uploaded file: " . $_FILES['pdfFile']['error'][$i];
            exit;
        }
    }

    // Encoding the file names array to JSON format
    $filesArray = json_encode($filesArray);

    // Preparing the insert query
    $insertQuery = "INSERT INTO notices (noticePdf) VALUES (?)";
    $statement = mysqli_prepare($connection, $insertQuery);
    if (!$statement) {
        // If failed to prepare the statement, display an error and exit
        echo "Failed to prepare statement: " . mysqli_error($connection);
        exit;
    }
    
    // Binding the parameter and executing the statement
    mysqli_stmt_bind_param($statement, "s", $filesArray);
    $insertResult = mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    // Redirecting to admin home page if the insertion is successful
    if ($insertResult) {
        header('Location: adminHome.php?notice_added_successfully');
        exit;
    } else {
        // If failed to insert, display an error and exit
        echo "Failed to upload the Notice: " . mysqli_error($connection);
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notices</title>
    <link rel="stylesheet" href="css/adminupdateNotices.css">
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    
</head>
<body>
    <header>
            <img src="images/img5.png" id="logo">
            <h1>Wellness First Health Insurance Management System</h1>

            <a href="adminHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
            
    </header>
    <div class="container">
        <h2>Upload Notice</h2>
        <form action="" method="post" enctype="multipart/form-data">
        <label for="fileupload">Select File</label>
        <input type="file" id="fileupload" name="pdfFile[]" accept=".pdf" required multiple onchange="displayFileName()">
        <input id="filename" type="text" value="File Name">
            
            <input type="submit" value="Upload" name="submit">
            <a href="deleteAllNotices.php" onclick="return confirmAndRedirect('Are you sure?', 'adminUpdateNotices.php');"><button class='delete'>Clear All Notices</button></a>
        </form>
    </div>

   

    <script src="js/uploadad.js"></script>

</body>
</html>