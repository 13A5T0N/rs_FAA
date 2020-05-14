<?php

// initializing variables


$errors = array();

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'projecten');

// REGISTER USER
if (isset($_POST['verzend']))
 {
  // receive all input values from the form

 $projectnaam=mysqli_real_escape_string($db,$_POST['project']);
 $eind=mysqli_real_escape_string($db,$_POST['eind']);
 $verantwoordelijk=mysqli_real_escape_string($db,$_POST['persoon']);
 $taak=mysqli_real_escape_string($db,$_POST['taak']);
 $beschrijving=mysqli_real_escape_string($db,$_POST['beschrijving']);


//   form validation: ensure that the form is correctly filled ...
//   by adding (array_push()) corresponding error unto $errors array

  if (empty($projectnaam)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  // if (empty($eind)) { array_push($errors,"u heeft niet alle velden ingevuld"); }
  // if (empty($verantwoordelijk)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  // if (empty($taak)) { array_push($errors, "u heeft niet alle velden ingevuld"); }


$insertquery = "INSERT INTO taak (project_id , persoon_id, taak_naam, taak_beschrijving, taak_einde)
  VALUES ('$projectnaam','$verantwoordelijk','$taak','$beschrijving','$eind')";



$db->query($insertquery);

header('Location: taakform.php');

}
mysqli_close($db);



?>
