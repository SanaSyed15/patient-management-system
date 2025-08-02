<?php
$host="localhost";
$username="root";
$password="";
$database="patientmanagementsystem";

$conn=mysqli_connect($host, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
