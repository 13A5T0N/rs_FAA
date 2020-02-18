<?php include('register.php');
include "conn.php";

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Registratie</title>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

	

<!-- Sidebar -->
<div class="w3-sidebar w3-black w3-bar-block text-center" style="width:25%">
     <div class="text-center">
	<img src="logo.png" style="width:75%">
	<div class="nav"><a href="">Home</a></div>
	<div class="nav"><a href="newprojectform.php">Add project</a></div>
	<div class="nav"><a href="taakform.php">Add taak</a></div>
</div>
</div>

<div class="container contact">
<form method="post" action="register.php">
<?php include('errors.php'); ?>
<div class="text-center"><h1>Registratie</h1></div>
		<div class="col-md-9">
			<div class="contact-form">
				
				  <div class="col-sm-10">          
					<input type="text" class="form-control" placeholder="Naam" name="naam">
					<br>
				  </div>

				</div>
				<div class="form-group">
		
				  <div class="col-sm-10">          
					<input type="text" class="form-control"  placeholder="Voornaam" name="voornaam">
					
				  </div>

				</div>
				<div class="form-group">
				 
				  <div class="col-sm-10">
					<input type="number" class="form-control"  placeholder="Telefoon" name="telefoon">
					
				  </div>
				</div>
				<div class="form-group">
			
					<div class="col-sm-10">          
					  <input type="text" class="form-control" placeholder="Email" name="email">
					  <br>
					</div>
					<div class="form-group">
					
						<div class="col-sm-10">          
						  <input type="text" class="form-control" placeholder="Adres" name="adres">
						  <br>
						  <select name="rol" class="browser-default custom-select  col-sm-12">
  <option value="">rol</option>
  <option value="1">student</option>
  <option value="2">docent</option>
 
</select>
</select>
						</div>


						
				
					   
			
  

						
							</div>
							<div class="form-group">
					
								<div class="col-sm-10">          
								 
								  <select name="richting" class="browser-default custom-select  col-sm-12">
<option value="">richting</option>
  <option value="1">ICT</option>
  <option value="2">AV</option>
  <option value="3">PT</option>
  <option value="4">infrastructuur</option>
  <option value="5">bouw</option>
  <option value="6">mijnbouw</option>
  <option value="7">analisten</option>
  <option value="9">apothekers assistent</option>
  <option value="9">electro</option>
  <option value="10">WTB</option>
 
</select>
</select>
								</div>
			
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">

				  <button type="submit" class="btn btn-success" name="verzend">Verzend</button>

				  </div>

				</div>
			</div>
		</div>
	</div>
</form>
</div>



</body>

</html>