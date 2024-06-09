<?php

    $serverName = "localhost";          //assigning server name
    $dbUsername = "chanupa";            //assigning database user Name
    $dbPassword = ")UqM-TKokxXNksUi";   //assigning database password
    $dbName = "insurance";              //assigning database name

    $connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);   //creating connection

    if(!$connection){
       die("Connection failed : " . mysqli_connect_error());        //display connection failed if connection faliure happens
    }

?>