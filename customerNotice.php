<?php
    session_start();
    require_once('connection.php');

    // Checking if a customer is logged in
    if (!isset($_SESSION['name'])) {
        header('Location: customerHome.php');
        exit(); // Exit to prevent further execution
    }

    $errors = array();

    $rowCount = "";

    $queryForCount = "SELECT COUNT(*) FROM notices;"; // Added semicolon

    $rowCountResult = mysqli_query($connection, $queryForCount);

    if ($rowCountResult) {
        $row = mysqli_fetch_row($rowCountResult);
        $rowCount = $row[0]; // Fetching the count value
        mysqli_free_result($rowCountResult);
    } else {
        // Query unsuccessful
        echo "Query for counting failed.";
    }

    // Getting the PDF information
    $query = "SELECT * FROM notices ORDER BY noticeId DESC LIMIT 1"; // Adjust table name accordingly

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) >= 1) {
            // PDF found
            $result = mysqli_fetch_assoc($result_set);
            $pdf_name = $result['noticePdf']; // Assuming 'pdf' is the column storing the file name of the PDF
            $string =  $pdf_name;
            $string = trim($string, '[]"');
            $pdf_path = "uploads/" . $string; // Form the full path to the PDF
        } else {
            // PDF not found
            header("Location: noNotices.php");
            exit();
        }
    } else {
        // Query unsuccessful
        echo "Query for fetching PDF failed.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link rel="stylesheet" href="css/style_marks.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<?php
    // Check if the PDF file exists
    if (file_exists($pdf_path)) {
        // Use an <iframe> to display the PDF viewer
        echo "<iframe src='$pdf_path' width='100%' height='900px' class='iFrame'></iframe>"; // Added closing tag
    } else {
        // PDF file not found
        header("Location: noNotices.php");
        exit();
    }
?>

</body>
</html>
