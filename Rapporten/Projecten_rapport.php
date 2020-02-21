<?php
include "conn.php";
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
<<<<<<< HEAD
  <div class="container-fluid">
  <img src="../Img/logo.png" alt="" class=" rounded mx-auto d-block float-left">
  <div class="sum">
  <h1 class ="text-center bg-dark text-white">Project Summary</h1>
  <div class="project_info  col-s4">
    <table class="table " >
      <tr>
         <td>Project naam:</td>
         <td>Test</td>
      </tr>
      <tr>
        <td>Project Leider</td>
        <td>Naam</td>
      </tr>
      <tr>
        <td>Budget:</td>
        <td> SRD 45000</td>
      </tr>
      <tr>
        <td>Start Datum</td>
        <td>00-00-0000</td>
      </tr>
      <tr>
        <td>Eind Datum</td>
        <td>00-00-0000</td>
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
";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      echo"
      <tr>
      <td>".$nr."</td>
      <td>".$row["taak_naam"]. "</td>
      <td>".$row["persoon_naam"]."".$row["persoon_voornaam"]."</td>
      <td>".$row["taak_beschrijving"]."</td>
      <td>".$row["taak_einde"]."</td>
      </tr>
      ";
      $nr++;
  }
} else {
  echo "0 results";
}
=======
<br><br>
<div class="mx-auto" style="width: 200px;">
<h2><img src="../img/logo.png" alt="" class="" width="90">Projecten Overzicht</h2>
</div>
<div class="col-md-7 col-xs-10 pull-left">
<table class="table table-bordered table-sm table-hover"  >
<thead class="thead-dark">
    <tr> 
      <th scope="col" >Project beschrijving</th>
      <th scope="col">Taken</th>
      <th scope="col">Naam</th>
      <th scope="col">Start datum</th>
      <th scope="col">Eind datum</th>
    </tr>
  </thead>

  
               
                


            

    <?php include_once "conn.php";
    error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);


       $res = mysqli_query($dbhandle,"SELECT persoon.persoon_id, persoon.persoon_naam, project.project_naam, project.prject_budget, project.project_start, project.project_eind,
       project.project_beschrijving, taak.taak_naam FROM persoon inner join project on persoon.persoon_id = project.persoon_id 
       inner join taak on project.persoon_id = taak.persoon_id");

       if(mysqli_num_rows($res)>0){
           while ($row =mysqli_fetch_assoc($res))
           {
               $naam= $row['persoon_naam'];
               $voor= $row['persoon_voornaam'];
               $Projectnaam= $row['project_naam'];
               $budget = $row['prject_budget'];
               $datumstart= $row['project_start'];
               $datumeind = $row['project_eind'];
               $beschrijving = $row['project_beschrijving'];
               $Taaknaam = $row['taak_naam'];
        

                  echo "<tr>
                    <td>$beschrijving</td>
                    <td>$Taaknaam</td>
                      <td>$naam</td>
                      <td>$datumstart</td>
                      <td>$datumeind</td>
                      
                      </tr>";
    }
    }
                  else {
                    //echo "Helaas niet gelukt";
                  }





    mysqli_close($conn);


  ?>

</div>


  
  </table>
>>>>>>> d57743de35e3d3bdca8283954db41396289690b5

mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>
</body>
</html>
