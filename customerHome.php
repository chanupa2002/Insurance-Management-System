<?php
session_start();

require_once('connection.php');

// checking if a customer is logged in
if (!isset($_SESSION['name'])) {
    header('Location: customerLog.php');
}

    $userName = $_SESSION['name'];


    $query = "SELECT * FROM advertisements ORDER BY adId DESC LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            // advertisement found
            $result = mysqli_fetch_assoc($result_set);   

        } else {
            // advertisement not found
            header('Location: customerHome.php');	
        }
    } else {
        // query unsuccessful
        header('Location: customerHome.php?err=query_failed');
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home</title>
    <link rel="stylesheet" href="   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/customerhome.css">
</head>
<body>
    <!-- <img src="images/cushome12.jpeg" id="bgimg"> -->
    <img src="images/cushome6.jpeg" id="bgimg">
    <header>
        <img src="images/img5.png" id="logo">
        <h1>Wellness First Health Insurance</h1>
        <div class="hpanel">
        
            <div class="userpanel">
            <p id="hellotxt">Hello <?php echo $userName?>!</p>
            <i class="fa-regular fa-user icon1" id="usericon"></i>
            </div>
            <div class="logoutpanel">
            <a href="#"><i class="fa-solid fa-house icon1" id="homeicon"></i></a>
            <a href="customerLogOut.php"><button id="logoutbtn">Log out</button></a>
        
            </div>
        </div>
        
  

    </header>
    <button id="nextbtn">&#10095</button>
    <button id="backbtn">&#10094</button>
    <div class="cuspanel">
        <h2 id="welcometxt">WELCOME</h2>
        <div class="panel">
           
            <div class="column1">
                <div class="box1">
                   <a href="customerMyProfile.php" class="boxcontainer" >
                    <div class="container">
                        <div class="iconcontainer">
                            <i class="fa-solid fa-user icon" ></i>
                        </div>
                        
                        <div class="box">
                           <p> My Profile</p>
                        </div></div>
                    
                    
                    
                   </a>
                </div>
                <div class="box1">
                    <a href="customerPayment_view.php" class="boxcontainer" >
                     <div class="container">
                         <div class="iconcontainer">
                         <i class="fa-regular fa-credit-card  icon"></i>
                         </div>
                         
                         <div class="box">
                            <p> Payments</p>
                         </div></div>
                     
                     
                     
                    </a>
                 </div>
                 <div class="box1">
                    <a href="cusMyPlans.php" class="boxcontainer" >
                     <div class="container">
                         <div class="iconcontainer">
                         <i class="fa-solid fa-newspaper icon" ></i>
                         </div>
                         
                         <div class="box">
                            <p> My Plan</p>
                         </div></div>
                     
                     
                     
                    </a>
                 </div>
            </div>
            <div class="column2">
                <div class="box1">
                    <a href="customerClaimReq.php" class="boxcontainer" >
                     <div class="container">
                         <div class="iconcontainer">
                         <i class="fa-solid fa-pen icon"></i> 
                   </div>
                         
                         <div class="box">
                            <p> Request</p>
                         </div></div>
                     
                     
                     
                    </a>
                 </div>
                 <div class="box1">
                    <a href="customerNotice.php" class="boxcontainer" >
                     <div class="container">
                         <div class="iconcontainer">
                         <i class="fa-solid fa-bell icon"></i> 
                         <!-- <script src="https://cdn.lordicon.com/lordicon.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/lznlxwtc.json"
    trigger="hover"
    style="width:250px;height:250px">
</lord-icon> -->
                         </div>
                         
                         <div class="box">
                            <p> Notices</p>
                         </div></div>
                     
                     
                     
                    </a>
                 </div>
                 <div class="box1">
                    <a href="customerFeedbacks.php" class="boxcontainer" >
                     <div class="container">
                         <div class="iconcontainer">
                         <i class="fa-solid fa-comment icon"></i>
                         </div>
                         
                         <div class="box">
                            <p> Feedbacks</p>
                         </div></div>
                     
                     
                     
                    </a>
                 </div>
               
            </div>
        </div>
    </div>

    <div class="adcontainer">
        <!-- <h2>Advertisements</h2> -->
        <p>
            <?php
             
                
                $items = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($items)) {
        
                        foreach (json_decode($row["adImg"]) as $imageAd) {
                            $imageAd = "<img src='uploads/{$imageAd}' width='200' id='adimg'>";
                        }
                    }
                echo $imageAd;
              
            ?>
        </p>
    </div>



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

<script src="js/customerhome.js"></script>
</body>
</html>