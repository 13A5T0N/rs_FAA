<?php
session_start();
include "../security.php";


// initializing variables

$naam="";
$voornaam="";
$telefoon="";
$email="";
$adres="";
$rol="";
$richting="";
$errors = array();

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'projecten');

// REGISTER USER
if (isset($_POST['registerbtn']))
 {
  // receive all input values from the form

  $naam=mysqli_real_escape_string($db,$_POST['naam']);
  $voornaam=mysqli_real_escape_string($db,$_POST['voornaam']);
  $telefoon=mysqli_real_escape_string($db,$_POST['telefoon']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $adres=mysqli_real_escape_string($db,$_POST['adres']);
  $rol=mysqli_real_escape_string($db,$_POST['rol']);
  $richting=mysqli_real_escape_string($db,$_POST['richting']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($naam)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  if (empty($voornaam)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  if (empty($telefoon)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  if (empty($rol)) { array_push($errors,"u heeft niet alle velden ingevuld"); }
  if (empty($richting)) { array_push($errors, "u heeft niet alle velden ingevuld"); }



//insert into database
$insertquery = "INSERT INTO persoon (persoon_naam,persoon_voornaam,persoon_tel,persoon_email,persoon_adres,rol_id,richting_id)
            VALUES ('{$naam}','{$voornaam}','{$telefoon}','{$email}','{$adres}','{$rol}','{$richting}')";

$db->query($insertquery);

echo $db ->error;

// header('Location: listing.php');
}




if (isset($_POST['updatebtn'])) {
  $id = $_POST['edit_id'];
  $naam = $_POST['edit_naam'];
  $voornaam = $_POST['edit_voornaam'];
  $telefoon = $_POST['edit_telefoon'];
  $email = $_POST['edit_email'];
  $adres = $_POST['edit_adres'];
  $rol = $_POST['edit_rol'];
  $richting = $_POST['edit_richting'];


  $query1 = " SELECT richting_id FROM richting WHERE naam ='$richting'";
  $query1_run = mysqli_query($db, $query1);
  if (mysqli_num_rows($query1_run) > 0) {
    while ($row = mysqli_fetch_assoc($query1_run)) {
      $richting = $row['richting_id'];
}
  }

  $query2 = " SELECT rol_id FROM rol WHERE naam ='$rol'";
  $query2_run = mysqli_query($db, $query2);
  if (mysqli_num_rows($query2_run) > 0) {
    while ($row = mysqli_fetch_assoc($query2_run)) {
      $rol = $row['rol_id'];
}
  }



  $query = "UPDATE persoon SET persoon_naam ='$naam', persoon_voornaam='$voornaam', persoon_tel='$telefoon', persoon_email='$email', persoon_adres='$adres', rol_id= '$rol', richting_id= '$richting' WHERE persoon_id='$id' ";
  $query_run = mysqli_query($db, $query);
  if ($query_run) {
    // $_SESSION['success'] = 'Your Data is Updated';
    header('Location:listing.php');
    exit();
  } else {
    // $_SESSION['status'] = 'Your Data is NOT Updated';
    //header('Location:listing.php');
    echo $db->error;

  }


}

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}


if (isset($_POST['login_btn'])){

  $username = e($_POST['username']);
	$password = e($_POST['password']);

  $query = "SELECT * FROM persoon WHERE persoon_naam='$username' AND password='$password' LIMIT 1";
  $results = mysqli_query($db, $query);

  if (mysqli_fetch_array($results)) {
    $_SESSION['username'] = $username;
    header('location: index.php');

  }else {
    $_SESSION['status'] = 'Username or Password is Invalid!!';
    header('location: login.php');


  }


}



mysqli_close($db);

?>
