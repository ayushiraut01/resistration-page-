<?php
$host = "localhost"; // Database host
$user = "root";      // Database username
$password = "";      // Database password
$dbname = "login_system"; 


$con = mysqli_connect($host, $user, $password);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$dbname = "login_system";
if (!mysqli_select_db($con, $dbname)) {
    die("Database selection failed: " . mysqli_error($con));
}
?>
