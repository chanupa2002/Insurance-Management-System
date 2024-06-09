<?php

session_start();

require_once('connection.php');                 // Including Connection file

if (!isset($_SESSION['name'])) {            //checking if customer logged in
    header('Location: customerLog.php');           //if customer not logged, redirect to the Customer Login page
    exit();
}


$customer_name = $_SESSION['name'];    //assigning customer Name from Session to a new variable

// SQL query to select the package column from the customer table
$sql = "SELECT package FROM customer WHERE cusName = ?";
// Preparing the SQL statement
$stmt = $connection->prepare($sql);

// Bind the parameter 'customer_name' to the SQL statement
$stmt->bind_param("s", $customer_name);

// Execute the prepared statement
$stmt->execute();

// Get the result set from the executed statement
$result = $stmt->get_result();

// Fetch the first row from the result set as an associative array
$row = $result->fetch_assoc();

// Extract the 'package' value from the fetched row
$package = $row['package'];

// Output the 'package' value
// echo $package;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plan</title>
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/cusMyPlans.css">

</head>
<body>
<header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>

        <a href="customerHome.php"><i class="fa-solid fa-circle-left icon"></i></a>
        
</header> 
<div class="plancontainer">
    <h3>My Plan</h3>
    <p id="selectedpack"><strong>Your Package:</strong> <?php echo $package; ?></p>
    
    <?php

        if($package=="gold"){                       //displaying package details if current logged cutomer package is gold
            echo "  <p class='Packagename'>Gold Health Series – Child Plan, a global health insurance plan designed specifically to cover your child’s medical needs</p>
                    <div class='benefitscontainer'>
                        <h4>Benifits</h4>
                        <ul class='benefitsdesc'>
                            <li>5 to 40 year Poilcy period</li>
                            <li> Variety of policy covers</li>
                            <li> Highly flexible premium payement options</li>
                            <li>Both within and outside srilanka hospitalization benefits</li>
                            <li>No claim Bonus</li>
                            <li>Expandable with additional covers apart from insurance options</li> 
                        </ul>
                    </div> ";
        }

        elseif($package=="platinum"){           //displaying package details if current logged cutomer package is platinum
            echo "  <p class='Packagename'>Provides Group Life Product with Life Cover and Hospitalization Benefit Bill CoverThis Product is for inpatients and outdoor patients at all hospitals of ASIRI and customers who have used/using and registered at ASIRI’s channeling, wellness centers, laboratories, pharmacies</p>
                    <div class='benefitscontainer'>
                        <h4>Benifits</h4>
                        <ul  class='benefitsdesc'>
                            <li>Policy term is for 5 years</li>
                            <li>Cover will be issued on a monthly basis</li>
                            <li>COver activation</li>
                            <li>Cashless card method is avaiable</li>
                            <li>Additional covers</li> 

                        </ul>
                    </div> ";
        }
        
        elseif($package=="silver"){             //displaying package details if current logged cutomer package is silver
            echo "  <p class='Packagename'>This is silver Health Plus package.This provides retirement options in the policyholders where they can choose to receive accumulated fund balance as a limp  sum or as an annually payments upon -reaching retirement age.</p>
                    <div class='benefitscontainer'>
                        <h4>Benifits</h4>
                        <ul class='benefitsdesc'>
                            <li>100 years plus life cover</li>
                            <li>Family Health care super benefit</li>
                            <li>No claim Bonus</li>
                            <li>Additional COvers</li>
                        </ul>
                    </div> ";
        }

        else{
            echo "Invalid Package";         //displaying the error if package not found
        }


    ?>  
    </div>
 
    <footer>
        <div class="footer">
        <img src="images/img5.png" id="logo">
        <ul id="hotline">
            <li class="hotlineh" id="hotlinetxt">Do you need any support</li>
            <li class="hotlineh">011 255 7441</li>
            <li class="hotlineh">011 255 7442</li></ul>
        
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

