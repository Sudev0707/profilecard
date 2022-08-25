<?php
 include("db/config.php"); 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM profile_info WHERE id=$id";
$result = mysqli_query($conn, $sql);
 
//redirecting to the display page (index.php in our case)
header("Location: index.php");
?>