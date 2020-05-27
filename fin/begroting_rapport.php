<head>
<style>
.image{
 margin-top:7%;
margin-left:15%;
/* margin-right:22%; */
}

</style></head>



<?php 
include "../conn.php";
$exacte_id = $_POST["exacte"];
$sql = "SELECT bedrijf_naam, bedrijf_tel, bedrijf_email, bedrijf_adres, exacte_id, taak_id, prijs , kwitantie
FROM bedrijf, exacte
WHERE   exacte.bedrijf_id = bedrijf.bedrijf_id
AND			exacte_id = $exacte_id ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $exacteid = $row["exacte_id"];
        $bedrijf = $row["bedrijf_naam"];
        // $bedrijftel= $row["bedrijf_tel"]; 
        $prijs = $row["prijs"];
        $kwitantie = $row["kwitantie"];
        $bedrijfadres = $row["bedrijf_adres"];
    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rapport.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
  <div class="container-fluid">
  <img src="logo.png" alt="" class=" rounded mx-auto d-block float-left">
  <div class="sum">
  <h1 class ="text-center bg-dark text-white">Begroting Summary</h1>
  <div class="project_info  col-s4">
    <table class="table " >
      <tr>
         <td>#:</td>
         <td><?php echo $exacteid; ?></td>
      </tr>
      <tr>
        <td>bedrijf</td>
        <td><?php echo $bedrijf; ?></td>
      </tr>
    
      <tr>
        <td>prijs</td>
        <td><?php echo $prijs; ?></td>
      </tr>
      <tr>
        <td>kwitantie</td>
        <td><?php ?></td>
      </tr>
    </table>  
 
  </div>
  </div>
  </div>
  </div>

  <div class="Bedrijven">
    <h1 class="text-center bg-dark text-white">Bedrijf</h1>
    <table class="table">
      <thead>
        <th>#</th>
        <th>bedrijf</th>
        <th>adres</th>
        <th>email</th>
        <th>telefoon</th>
        <th>prijs</th>
        <th>kwitantie</th>
        <th>Begin datum </th>
        
        
      </thead>
      <tbody>
        <?php
        $nr = 1;
$sql = "select  bedrijf_naam,bedrijf_adres, taak_naam, taak_beschrijving, taak_einde,prijs,kwitantie,bedrijf_tel, bedrijf_email, datum
from taak, bedrijf, exacte
where 
exacte.taak_id = taak.taak_id
and 
exacte.bedrijf_id = bedrijf.bedrijf_id
and 
exacte.exacte_id = $exacte_id
";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      echo"
      <tr>
      <td>".$nr."</td>
      <td>".$row["bedrijf_naam"]. "</td>
      <td>".$row["bedrijf_adres"]. "</td>
      <td>".$row["bedrijf_email"]. "</td>
      <td>".$row["bedrijf_tel"]. "</td>
      <td>".$row["prijs"]."</td>
      <td>";    
      $sql1   = "SELECT * from exacte where exacte_id= $exacteid";
          $query1 = mysqli_query($conn, $sql1);
          while ($line = mysqli_fetch_assoc($query1)) {?><?php
              echo '  <a href="data:application/pdf;base64,' . base64_encode($line['kwitantie']) . '"> Show Kwitantie </a>'; } ?><?php echo "</td>
      <td>".$row["datum"]."</td>
     
      </tr>
      ";
      $nr++;
  }
}


    

mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>
  </body>
</html>
