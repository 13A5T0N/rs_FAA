<?php
session_start();
$id = $_SESSION['id'];
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



//edit form
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $prijs = $_POST['edit_prijs'];
    $date = $_POST['edit_datum'];
    $kwitantie = $_POST['edit_kwitantie'];
    $taak = $_POST['Taak_edit'];
    $bedrijf = $_POST['Bedrijf_edit'];
    
 
        
$query = "UPDATE exacte SET prijs ='$prijs', kwitantie='$kwitantie', bedrijf_id= '$bedrijf', taak_id= '$taak', Begin_datum= '$date' WHERE exacte_id= '$id' ";
$query_run = mysqli_query($conn, $query);



  }

if (isset($_POST['delete_btn'])) {

$id = $_POST['delete_id'];


$query2 = "DELETE FROM exacte where exacte_id = $id";
$query2_run = mysqli_query($conn, $query2);
echo $conn->error;

if ($query2_run) {

 
  header('Location:Begrotingen.php');
} else {

  header('Location:Begrotingen.php');
}
}

?>

