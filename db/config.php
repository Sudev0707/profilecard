<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile_card";

$conn = mysqli_connect($servername,$username,$password,$dbname)
    or die("Connection Failed") . mysqli_connect_error();

    // if($conn)
    // {
    //     echo "Connection Successful";
    // }
    // else
    // {
    //     echo "Connection FAiled";
    // }
?>
 