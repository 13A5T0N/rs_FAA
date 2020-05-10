<?php
include "../conn.php";
$project_id = $_POST["project"];
$sql = "select  project_naam,  project_budget, project_start, project_eind, persoon_naam, persoon_voornaam
from	project, persoon
where 
project.persoon_id = persoon.persoon_id
and 
project_id = $project_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $project = $row["project_naam"];
        $leider = $row["persoon_naam"];
        $voornaam= $row["persoon_voornaam"]; 
        $budget = $row["project_budget"];
        $start = $row["project_start"];
        $eind = $row["project_eind"];
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
    <link rel="stylesheet" href="../css/rapport.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
  <div class="container-fluid">
  <img src="../photos/logo.png" alt="" class=" rounded mx-auto d-block float-left">
  
  <div class="sum">
  <h1 class ="text-center bg-dark text-white">Project Summary</h1>
  <div class="project_info  col-s4">
    <table class="table " >
      <tr>
         <td>Project naam:</td>
         <td><?php echo $project; ?></td>
      </tr>
      <tr>
        <td>Project Leider</td>
        <td><?php echo $leider."  ".$voornaam; ?></td>
      </tr>
      <tr>
        <td>Budget:</td>
        <td><?php echo $budget; ?></td>
      </tr>
      <tr>
        <td>Start Datum</td>
        <td><?php echo $start; ?></td>
      </tr>
      <tr>
        <td>Eind Datum</td>
        <td><?php echo $eind; ?></td>
      </tr>
    </table>  
 
  </div>
  <div class="taken">
    <h1 class="text-center bg-dark text-white">Taken</h1>
    <table class="table">
      <thead>
        <th>#</th>
        <th>Naam</th>
        <th>verantwoordelijk</th>
        <th>beschrijving</th>
        <th>eind</th>
      </thead>
      <tbody>
        <?php
        $nr = 1;
$sql = "select  persoon_naam,persoon_voornaam, taak_naam, taak_beschrijving, taak_einde
from taak, persoon, project
where 
project.project_id = taak.project_id
and 
persoon.persoon_id = taak.persoon_id
and 
project.project_id = $project_id
";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      echo"
      <tr>
      <td>".$nr."</td>
      <td>".$row["taak_naam"]. "</td>
      <td>".$row["persoon_naam"]."   ".$row["persoon_voornaam"]."</td>
      <td>".$row["taak_beschrijving"]."</td>
      <td>".$row["taak_einde"]."</td>
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
