<!DOCTYPE html>
<html lang="en">
<head>
<style>
div {
   margin: auto;
   width: 50% !important; 
}

table th {
   text-align: center; 
}

   

</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
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


       $res = mysqli_query($conn,"SELECT persoon_naam, project_naam, prject_budget, project_start, project_eind,
       project_beschrijving, taak_naam FROM persoon t1 inner join project t2 on t1.persoon_id = t2.persoon_id 
       inner join taak t3 on t2.persoon_id=t3persoon_id");


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

  </body>
</html>
