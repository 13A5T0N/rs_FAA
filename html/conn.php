<?php
$server = "localhost";
$password = "";
$user = "root";
$db = "projecten";
$conn = mysqli_connect($server,$user,$password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>