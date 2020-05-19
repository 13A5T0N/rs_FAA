<?php
include "../conn.php";
$prijs = $_POST["prijs"];
$Taak = $_POST["Taak"];
$bedrijfnaam = $_POST["Bedrijf"];
$date = $_POST["datum"];
$kwitantie = $_POST["kwitantie"];

$naam=mysqli_real_escape_string($conn,$naam);
$Bedrijfnummer=mysqli_real_escape_string($conn,$Bedrijf);
$prijs=mysqli_real_escape_string($conn,$prijs);
$date=mysqli_real_escape_string($conn,$date);
$kwitantie=mysqli_real_escape_string($conn,$kwitantie);
$Taak=mysqli_real_escape_string($conn,$Taak);

 
$fp = fopen($_FILES['kwitantie']['tmp_name'], 'r');
$content = fread($fp, filesize($_FILES['kwitantie']['tmp_name']));
$content = addslashes($content);
fclose($fp);

// if (getimagesize($_FILES['kwitantie']['tmp_name']) == true)
//  {
//     $image = addslashes($_FILES['kwitantie']['tmp_name']);
//     $image = file_get_contents($image);
    
// }

//$sql = "INSERT INTO exacte (kwitantie) VALUES ('$image')";





//     if(!empty($_FILES["kwitantie"])) { 
//         // Get file info 
//         $fileName = basename($_FILES["kwitantie"]); 
//         $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
//         // Allow certain file formats 
        
//         if(in_array($fileType)){ 
//             $image = $_FILES['kwitantie']['tmp_name']; 
//             $imgContent = addslashes(file_get_contents($image)); 
         
//             // Insert image content into database 
//             $insert = $conn->query("INSERT into exacte (kwitantie) VALUES ('$imgContent'NOW())"); 
             
           
// }
// 	}
// }
 
   //  $file = addslashes(file_get_contents($_FILES["$kwitantie"]["tmp_name"]));  
    // $query1 = "INSERT INTO exacte (kwitantie) VALUES ('$file')";  
 





//$kwitantie = addslashes(file_get_contents($_FILES['kwitantie']['tmp_name']));


$query = "INSERT INTO `exacte` (`bedrijf_id`,`taak_id`, `kwitantie`,`prijs`, `Begin_datum`) VALUES('$bedrijfnaam','$Taak','$content','$prijs','$date')";


 $conn->query($query);

header('Location: Begrotingen.php');
?>

