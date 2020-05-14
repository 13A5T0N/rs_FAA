<?php
include "../conn.php";
$naam = $_POST["naam"];
$Bedrijfnummer = $_POST["Bdnummer"];
$bedrijfemail = $_POST["bedr_email"];
$bedrijfadres = $_POST["adres"];


$naam=mysqli_real_escape_string($conn,$naam);
$Bedrijfnummer=mysqli_real_escape_string($conn,$Bedrijfnummer);
$bedrijfemail=mysqli_real_escape_string($conn,$bedrijfemail);
$bedrijfadres=mysqli_real_escape_string($conn,$bedrijfadres);




 
$query ="INSERT INTO `bedrijf` (`bedrijf_naam`, `bedrijf_tel`, `bedrijf_email`, `bedrijf_adres`) VALUES ('$naam','$Bedrijfnummer','$bedrijfemail','$bedrijfadres')"; 


 $conn->query($query);

header('Location: bedrijf.php');
?>

