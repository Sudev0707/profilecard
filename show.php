<?php
include 'db/config.php';
error_reporting(0);

$sql = "SELECT * FROM profile_info";
$result = mysqli_query($conn, $sql);

// find total no. of rows/record in the database table
$total = mysqli_num_rows($result);
echo $total;

// find records
$record = mysqli_fetch_assoc($result);
echo "<pre>";
print_r($record['image']);
print_r($total);
echo "</pre>";

// $row = mysqli_fetch_array($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";


// record print 
if ($result != 0) {

    $i = 0;
    while ($record = mysqli_fetch_assoc($result)) {
        echo $record['name'] . "<br>";
        echo $record['profession'] . "<br>";
        echo $record['mobile'] . "<br>";
        echo $record['email'] . "<br>";
        echo "<img src= $record class='img' alt='img' width='110' height='151'>";
        echo $record['image'] . "<br>";
        echo $record['github'] . "<br>";
        echo "<br>";

        $i++;
    }
}
