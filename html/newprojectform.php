<?php include('newproject.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="./autocomplete/style.css" />
 <script type="text/javascript" src="./autocomplete/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="./autocomplete/jquery.autocomplete.js"></script>

<title>Nieuw Project</title>

</head>

<body>



<div class="w3-sidebar w3-black w3-bar-block text-center" style="width:25%">

	<img src="logo.png" style="width:75%">
	<div class="nav"><a href="">Home</a></div>
	<div class="nav"><a href="registratieform.php">Add user</a></div>
	<div class="nav"><a href="taakform.php">Add taak</a></div>
</div>

<div class="container contact">
	<form method="post" action="newproject.php">
		<?php include('errors.php'); ?>
	
	<div class="text-center"><h1>Nieuw project</h1></div>
			<div class="col-md-9">
				<div class="contact-form">
					
					 
					<div class="form-group">
			
					  <div class="col-sm-10">          
						<input type="text" class="form-control"  placeholder="Projectnaam" name="projectnaam">
						<br>
					  </div>
					  <div class="col-sm-10">          
						<input type="text" class="form-control" name="omschrijving"  placeholder="Project omschrijving">
						<br>
					  </div>
	
					
					  <div class="col-sm-10">     
						  <input list="leider" type="text" class="form-control" name="leider" placeholder="Project leider">
					 <datalist id="leider">
					 <?php
					include ('conn.php');
					 $selectpersoon="select * from projecten.persoon " ;
					 $result = mysqli_query($conn,$selectpersoon);
					 if (mysqli_num_rows($result) >0){
						 while($row =mysqli_fetch_assoc($result)){
							//  echo "<option value='".$row['persoon_id']." ".$row['persoon_voornaam'] ." ". "$row[persoon_naam])'>".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
							echo "<option value=".$row['persoon_id'].">".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
						 }
					 }
					 
					  ?>    
					 </datalist>
						<br>
					  </div>
					  
					  <div class="col-sm-10">          
						  <span>Startdatum</span><br>
						<input type="date" class="form-control"  placeholder="Startdatum" name="start">
						<br>
					  </div>

					  
					  <div class="col-sm-10">          
					  <span>Einddatum</span><br>
						<input type="date" class="form-control"  placeholder="eind" name="eind">
						<br>
					  </div>
					  
					 



					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-0 col-sm-10">
	
					  <button type="submit" class="btn btn-success" name="verzend">toevoegen</button>
					  <a href="materialenform.php" class="btn btn-success" role="button">Materialen bijvoegen</a>
	
					  </div>
	
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</body>




</html>