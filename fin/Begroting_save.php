<?php
include "../conn.php";
$prijs = $_POST["prijs"];
$Taak = $_POST["Taak"];
$bedrijfnaam = $_POST["Bedrijf"];
$date = $_POST["datum"];
// $kwitantie = $_POST["kwitantie"];

// $naam=mysqli_real_escape_string($conn,$naam);
$Bedrijfnummer=mysqli_real_escape_string($conn,$bedrijfnaam);
$prijs=mysqli_real_escape_string($conn,$prijs);
$date=mysqli_real_escape_string($conn,$date);
// $kwitantie=mysqli_real_escape_string($conn,$kwitantie);
$Taak=mysqli_real_escape_string($conn,$Taak);


if (getimagesize($_FILES['kwitantie']['tmp_name']) == true)
 {
    $image = addslashes($_FILES['kwitantie']['tmp_name']);
    $name  = addslashes($_FILES['kwitantie']['tmp_name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);
}


$query = "INSERT INTO `exacte` (`bedrijf_id`,`taak_id`, `kwitantie`,`prijs`, `datum`) VALUES('$bedrijfnaam','$Taak','$image','$prijs','$date')";


 $conn->query($query);

header('Location: Begrotingen.php');






?>

<?php
session_start();
$id = $_SESSION['id'];
//$date = date("Y-m-d");
include "../conn.php";
$prijs = $_POST["prijs"];
$Taak = $_POST["Taak"];
$bedrijfnaam = $_POST["Bedrijf"];
$datum = $_POST["datum"];
//$kwitantie = $_POST["naam"];


$naam=mysqli_real_escape_string($conn,$naam);
$Bedrijfnummer=mysqli_real_escape_string($conn,$Bedrijf);
$prijs=mysqli_real_escape_string($conn,$prijs);
$date=mysqli_real_escape_string($conn,$date);
$kwitantie=mysqli_real_escape_string($conn,$kwitantie);
$Taak=mysqli_real_escape_string($conn,$Taak);


$kwitantie = $_FILES['kwitantie']['name'];
$tmpName  = $_FILES['kwitantie']['tmp_name'];
//$fileSize = $_FILES['kwitantie']['size'];
//$fileType = $_FILES['kwitantie']['type'];


$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);


$query = "INSERT INTO `exacte` (`bedrijf_id`,`taak_id`, `kwitantie`,`prijs`, `Begin_datum`) VALUES('$bedrijfnaam','$Taak','$content','$prijs','$datum','$content')";


 $conn->query($query);

header('Location: Begrotingen.php');