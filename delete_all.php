<?php
 include("db/config.php"); 
 
//deleting the row from table
$sql = "DELETE FROM profile_info";
$result = mysqli_query($conn, $sql);

$total = mysqli_fetch_assoc($result);
 
//redirecting to the display page (index.php in our case)
header("Location: index.php");
?>