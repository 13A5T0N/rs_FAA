<?php
include_once "conn.php";
session_start();
$date = date("Y-m-d");

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$query = "SELECT * FROM persoon WHERE persoon_naam='$username' AND password='$password' LIMIT 1";
$results = mysqli_query($conn, $query);
$usertypes = mysqli_fetch_array($results);

//5=allaround 3=admin 4=financiele

if ($usertypes['rol_id'] == "5") {
  $id = $usertypes['persoon_id'];
  $_SESSION['id'] = $id;

  $insertquery = "INSERT INTO `log`( `persoon_id`, `status`, `datum`) 
  VALUES ($id,'logged in','$date')";
  $conn->query($insertquery);

  $_SESSION['username'] = $username;
 
  header('location: overall/');
}
elseif ($usertypes['rol_id'] == "3") {
  $id = $usertypes['persoon_id'];
  $_SESSION['id'] = $id;

  $insertquery = "INSERT INTO `log`( `persoon_id`, `status`, `datum`) 
  VALUES ($id,'logged in','$date')";
  $conn->query($insertquery);

  $_SESSION['username'] = $username;
  header('location: admin/');
} 
elseif ($usertypes['rol_id'] == "4") {
    $id = $usertypes['persoon_id'];
    $_SESSION['id'] = $id;
    
    $insertquery = "INSERT INTO `log`( `persoon_id`, `status`, `datum`) 
    VALUES ($id,'logged in','$date')";
    $conn->query($insertquery);

    $_SESSION['username'] = $username;
    header('location: fin/');
  }
else{
  $_SESSION['status'] = 'Username or Password is Invalid!!';
  header('location: index.php');
  }
