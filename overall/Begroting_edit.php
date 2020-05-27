<?php
session_start();

include "../conn.php";

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>FAA</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>
	</head>
	<body>



		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Brand</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Brand</span>
			</div>
			<nav>
			<ul>
				<li>
					<a href="index.php">
						<span><i class="fa fa-home"></i></span>
						<span>Startpagina</span>
					</a>
				</li>
				<li>
					<a href="projects.php">
						<span><i class="fa fa-product-hunt"></i></span>
						<span>Projecten</span>
					</a>
				</li>
				<li>
					<a href="taakform.php">
						<span><i class="fa fa-tasks"></i></span>
						<span>Taken</span>
					</a>
				</li>
				<li>
          <a href="Begrotingen.php">
            <span><i class="fa fa-users"></i></span>
            <span>Begrotingen</span>
          </a>
        </li>
				<li>
					<a href="allaround.php">
						<span><i class="fa fa-users"></i></span>
						<span>Gebruikers</span>
					</a>
				</li>
			</ul>
		</nav>
		</div>
		<div class="main-content">
			<div class="title">
        <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile</h6>
          </div>
          <div class="card-body">

            <?php
            if (isset($_POST['edit_btn'])) {
              $id = $_POST['edit_id'];
              $query = "SELECT * FROM exacte  WHERE exacte_id='$id'";
              $query_run = mysqli_query($conn, $query);

              foreach ($query_run as $row) {
                ?>


          <form action="begroting_save.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="edit_id" value="<?php echo $row['exacte_id'] ?>">
				  <div class="form-group">
				  
				  <label for=""> Naam </label>
                 <input required list="Bedrijf" type="text" value="<?php echo $row['bedrijf_id'] ?>" class="form-control" name="Bedrijf_edit" placeholder="Bedrijf" required>
					 <datalist id="Bedrijf">
					 <?php
					include ('../conn.php');
					$selectbedrijfid="select * from projecten.bedrijf " ;
					$result = mysqli_query($conn,$selectbedrijfid);
					if (mysqli_num_rows($result) >0){
						while($row =mysqli_fetch_assoc($result)){
						  
						   echo "<option value=".$row['bedrijf_id'].">".$row['bedrijf_naam'] ."</option>";
						} 
					}
				
					
					 ?>    
					</datalist>
                  </div>

					 
                  <div class="form-group">
                  <label>Prijs</label>
                  <input type="number" name="edit_prijs" value="<?php echo $row['prijs'] ?>" class="form-control" placeholder="Prijs" required>
                  </div>
				  <div>
				  <label>Start datum</label><br>
                  <input type="date" name="edit_datum" value="<?php echo $row['Begin_datum'] ?>" class="" placeholder="Start datum" required>
                  </div>
                  <div class="form-group">
                  <label>Kwitantie</label><br>
				  <input type="file" name="edit_kwitantie" value="<?php echo $row['kwitantie'] ?>" class="" placeholder="Kwitantie" accept="application/pdf" required>
                  </div>
				  
                  <div class="form-group">
                 <input required list="Taak" type="text" value="<?php echo $row['taak_id'] ?>" class="form-control" name="Taak_edit" placeholder="Taak" required>
					 <datalist id="Taak">
					 <?php
					include ('../conn.php');
					$selecttaakid="select * from projecten.taak " ;
					$result = mysqli_query($conn,$selecttaakid);
					if (mysqli_num_rows($result) >0){
						while($row =mysqli_fetch_assoc($result)){
						  
						   echo "<option value=".$row['taak_id'].">".$row['taak_naam'] ." ". $row['taak_beschrijving']."</option>";
						} 
					}



	
					 ?>    
                     
					</datalist>
					</div>
                    <a href="Begrotingen.php" class="btn btn-danger">CANCEL</a>
                 <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
                  

            <?php
          }

        }
        ?>



        </div>
          </div>
        </div>
      </div>
      </div>
	</body>
</html>
