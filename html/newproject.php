<?php
session_start();

// initializing variables

$projectnaam="";
$leider="";
$start="";
$eind="";
$materialen="";
$betrokken="";
$prijs="";
$totaal="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'projecten');

// REGISTER USER
if (isset($_POST['verzend']))
 {
  // receive all input values from the form

  $projectnaam=mysqli_real_escape_string($db,$_POST['projectnaam']);
  $leider=mysqli_real_escape_string($db,$_POST['leider']);
  $start=mysqli_real_escape_string($db,$_POST['start']);
  $eind=mysqli_real_escape_string($db,$_POST['eind']);
  $omschrijving=mysqli_real_escape_string($db,$_POST['omschrijving']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($projectnaam)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  if (empty($leider)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  if (empty($start)) { array_push($errors, "u heeft niet alle velden ingevuld"); }
  if (empty($eind)) { array_push($errors,"u heeft niet alle velden ingevuld"); }



//insert into database



$insertquery = "INSERT INTO project (project_naam,persoon_id,project_start,project_eind,project_omschrijving)
            VALUES ('$projectnaam','$leider','$start}','{$eind}','{$omschrijving}')";
 
 
echo $db->error; 

$db->query($insertquery);





// header('Location: newprojectform.php');
}
if (isset($_POST['submit']))
 {
  // receive all input values from the form

  $projectnaam=mysqli_real_escape_string($db,$_POST['projectnaam']);
  $materiaal=mysqli_real_escape_string($db,$_POST['materiaal']);
  $prijs=mysqli_real_escape_string($db,$_POST['prijs']);




  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($projectnaam)) { array_push($errors, "u heeft niet alle velden ingevuld"); }




//insert into database



$insertquery = "INSERT INTO materialen (project_id,materiaal_naam,materiaal_prijs)
            VALUES ('$projectnaam','$materiaal,'$prijs')";
 


$db->query($insertquery);


header('Location: materiaalform.php');


}
mysqli_close($db);



?>



