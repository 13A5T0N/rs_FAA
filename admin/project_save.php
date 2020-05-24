<?php
include "../conn.php";
$naam = $_POST["naam"];
$beschrijving = $_POST["beschrijving"];
$budget = $_POST["budget"];
$start = $_POST["start"];
$eind = $_POST["eind"];
$leider = $_POST["leider"];

$naam=mysqli_real_escape_string($conn,$naam);
$beschrijving=mysqli_real_escape_string($conn,$beschrijving);
$budget=mysqli_real_escape_string($conn,$budget);
$leider=mysqli_real_escape_string($conn,$leider);
$start=mysqli_real_escape_string($conn,$start);
$eind=mysqli_real_escape_string($conn,$eind);
$leider=mysqli_real_escape_string($conn,$leider);



$query = "INSERT INTO `project`( `project_naam`, `persoon_id`, `project_budget`, `project_start`, `project_eind`, `project_beschrijving`)
 VALUES ('$naam',$leider,'$budget','$start','$eind','$beschrijving')";
$conn->query($query);
header('Location: projects.php');
?>