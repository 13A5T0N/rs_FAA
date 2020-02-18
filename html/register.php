<?php
session_start();

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
if (isset($_POST['verzend']))
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
            VALUES ('$naam','$voornaam','$telefoon','$email','$adres','$rol','$richting')";
 
$db->query($insertquery);

 

header('Location: registratieform.php');
}
mysqli_close($db);



?>



