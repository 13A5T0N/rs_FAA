<?php
include_once "conn.php";


$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$query = "SELECT * FROM persoon WHERE persoon_naam='$username' AND password='$password' LIMIT 1";
$results = mysqli_query($conn, $query);
$usertypes = mysqli_fetch_array($results);

//5=allaround 3=admin 4=financiele

if ($usertypes['rol_id'] == "5") {
  $_SESSION['username'] = $username;
  header('location: overall/');
}
elseif ($usertypes['rol_id'] == "3") {
  $_SESSION['username'] = $username;
  header('location: admin/');
} 
// elseif ($usertypes['rol_id'] == "4") {
//   $_SESSION['username'] = $username;
//   header('location: ');
//   }
else{
  $_SESSION['status'] = 'Username or Password is Invalid!!';
  header('location: index.php');
  }
