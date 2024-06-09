<?php
// Including the database connection file
require_once('connection.php');

// Starting the session
session_start();

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Start the session named 'submit'
    $_SESSION['submit'] = true;
    
    // Getting form data
    $name = $_POST['name'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $package = $_POST['package'];
    
    // Handling profile photo uploads
    $totalFilesPhoto = count($_FILES['fileImg']['name']);
    $filesArrayPhoto = array();
    
    // Check if the 'fileImg' array is set and not empty
    if (isset($_FILES['fileImg']) && !empty($_FILES['fileImg']['name'])) {
        $totalFilesPhoto = count($_FILES['fileImg']['name']);
        $filesArrayPhoto = array();

        // Loop through each uploaded photo
        for ($i = 0; $i < $totalFilesPhoto; $i++) {
            $imageName = $_FILES['fileImg']['name'][$i];
            $tmpName2 = $_FILES["fileImg"]["tmp_name"][$i];

            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION); // Use pathinfo() to get file extension
            $newImageName = uniqid() . '.' . $imageExtension;

            // Move uploaded photo to the 'uploads' directory
            move_uploaded_file($tmpName2, 'uploads/' . $newImageName);
            $filesArrayPhoto[] = $newImageName;
        }

        // Encode uploaded photo filenames into JSON format
        $filesArrayPhoto = json_encode($filesArrayPhoto);
    } else {
        // Handle case where 'fileImg' array is not set or empty
        $filesArrayPhoto = "[]"; // Set to an empty array if no files uploaded
    }
    
    // Handling agreement document uploads
    $totalFilesAgreement = count($_FILES['filePdf']['name']);
    $filesArrayAgreement = array();
    
    // Loop through each uploaded agreement document
    for($i = 0; $i < $totalFilesAgreement; $i++){
        $pdfName = $_FILES['filePdf']['name'][$i];
        $tmpName1 = $_FILES["filePdf"]["tmp_name"][$i];

        $pdfExtension = explode('.', $pdfName);
        $pdfExtension = strtolower(end($pdfExtension));

        $newPdfName = uniqid() . '.' . $pdfExtension;

        // Move uploaded agreement document to the 'uploads' directory
        move_uploaded_file($tmpName1, 'uploads/'. $newPdfName);
        $filesArrayAgreement[] = $newPdfName;
    }

    // Encode uploaded agreement document filenames into JSON format
    $filesArrayAgreement = json_encode($filesArrayAgreement);

    // SQL query to insert customer details into the database
    $query  = "INSERT INTO customer (";
    $query .= "cusName, password, cusEmail, cusMobile, cusDob, cusAddress, cusGender, package, profilePicture, agreementPdf,approval";
    $query .= ") VALUES (";
    $query .= "'$name', '$password', '$email', '$mobile', '$dob', '$address', '$gender','$package', '$filesArrayPhoto', '$filesArrayAgreement', 0";
    $query .= ")";

    // SQL query to insert payment details into the database
    $queryP  = "INSERT INTO payments (";
    $queryP .= "cusName, package, approval";
    $queryP .= ") VALUES (";
    $queryP .= "'$name','$package', 0";
    $queryP .= ")";

    // Execute the queries
    $result = mysqli_query($connection, $query);
    $resultP = mysqli_query($connection, $queryP);

    // Redirect after successful submission
    header("Location: regComplete.php");
    exit();
}
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <!-- Link to CSS files -->
    <link rel="stylesheet" href="css/RegistrationCSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<!-- Background image -->
<img src="images/reg1.jpeg" id="bgimg">
<header>
    <!-- Header section -->
    <img src="images/img5.png" id="logo">
    <h1>Wellness First Health Insurance</h1>
    <a href="Website/Home page.html"><i class="fa-solid fa-house icon1" id="homeicon"></i></a>
</header>
<!-- Registration form -->
<h2 id="topic">Registration Form </h2>
<br><br><br>
<form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
   
    <div class="input-row">
        <div class="left-input">
            <!-- Left section of the form -->
            <b>Full Name:</b><br>
            <input type="text" id="name" name="name"placeholder="Enter First Name"required> <br><br>

            <b>Email:</b><br>
            <input type="email" id="email" name="email"  placeholder="Enter Email" required><br><br>
            
            <!-- Address field -->
            <div id="address">
                <b>Address:</b><br>
                <textarea id="address" name="address" rows="4" cols="30"  placeholder="Enter Address"required></textarea><br><br>
            </div>

            <!-- Gender selection -->
            <div id="genderpanel">
                <b>Gender:</b><br>
                <div id="genderradio"> 
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label>Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label>Female</label>
                    <input type="radio" id="Other" name="gender" value="other">
                    <label>Prefer not to say</label><br><br>
                </div>
            </div>
        </div>

        <div class="right-input">
            <!-- Right section of the form -->
            <b>Mobile:</b><br>
            <input type="tel" id="mobile" name="mobile" placeholder="Enter number" maxlength="10" required ><br><br>
		
            <b>Date of Birth:</b><br>
            <input type="date" id="dob" name="dob" value="" required><br><br>
		
            <b>Select your package:</b><br>
            <select id="package" name="package" required>
                <option value="Select">Select</option>
                <option value="gold">Gold</option>
                <option value="silver">Silver</option>
                <option value="platinum">Platinum</option>
            </select><br><br>
            
            <!-- Password fields -->
            <b>Password:</b><br>
            <input type="password" id="password" name="password" placeholder="Enter Password"required> <br><br>
            <b>Confirm Password:</b><br>
            <input type="password" id="confirmpassword" name="password" placeholder="Enter Password" required> <br><br>
            <span id="passtxt"></span>
        </div>
    </div> 

    <!-- File upload section -->
    <div id="filesection">
        <p id="notice"><b>Please Note:</b></p>
        <ul>
            <li>To ensure compatibility with our system, please upload only .jpg and .png file formats for your profile photo.</li>
            <li>Additionally, kindly download the provided PDF document. Please attach scanned copies of your birth certificate, National Identity Card (NIC), and medical reports to this form.</li>
            <li>Before submission, carefully review the agreement provided. Once you have thoroughly reviewed it, please sign the document. Afterward, combine all the documents into a single PDF file.</li>
            <li>Finally, proceed to upload the compiled PDF document containing the signed agreement and the required attachments.</li>
        </ul>
        <h5>Download the agreement and the structure here from here:</h5>
        <!-- Download link for PDF agreement -->
        <i class="fa-solid fa-download"></i>
        <a href="https://drive.google.com/file/d/1Pfct06nBNzhw1Tu6pLiQ43xGR1KJm_F1/view?usp=drive_link" download id="download">Download PDF</a>
    </div>
    <br><br>
	 
    <!-- Upload section for profile photo and agreement documents -->
    <div id="uploadsection">
        <div>
            <h5>Upload Your Photo:</h5><br>
            <input type="file" id="photo" name="fileImg[]" accept=".jpg,.png" multiple required><br><br>
        </div>
        <div id="agreementupload">
            <h5>Signed Agreement & Documents:</h5><br>
            <input type="file" id="agreement" name="filePdf[]" accept=".pdf,.doc,.docx" multiple required><br><br>
        </div>
    </div>
    
    <!-- Submit button -->
    <input type="submit" value="Submit" name="submit" id="submit">
</form>
<!-- JavaScript file inclusion for form validation -->
<script src="js/validateCusDetails.js"></script>
</body>
</html>
