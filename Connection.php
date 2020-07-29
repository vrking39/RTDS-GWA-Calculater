<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gwa_calculator";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if($conn->connect_errno >0){
    die("Unable to connect to database[".$conn->connect_error."]");
}

?>