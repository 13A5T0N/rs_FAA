<?php
include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>FAA</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAA</title>
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
				<img src="../photos/logo.png">
				<span>NATIN</span>
			</div>
			<nav>
				<ul>
          <li>
						<a href="">
							<span><i class="fa fa-home"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li>
						<a href="">
							<span><i class="fa fa-product-hunt"></i></span>
							<span></span>
						</a>
					</li>
					<li>
						<a href="">
							<span><i class="fa fa-tasks"></i></span>
							<span></span>
						</a>
					</li>
					<li>
						<a href="alle_uitgaven.php">
							<span><i class="fa fa-book"></i></span>
							<span>Rapporten</span>
						</a>
					</li>
					<li>
						<a href="">
							<span><i class="fa fa-users"></i></span>
							<span></span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
        <div class ="main-content">
        <div class="title">
      Financiele afdeling: Uitgaven overzicht. Alle uitgaven
        </div>
        <div class ="container-fluid">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"> 
          <button type="button" class="btn btn-primary" onclick="new_all()" >
                    Alle uitgaven
                  </button>
          <button type="button" class="btn btn-primary" onclick="new_project()" >
                    Uitgaven per project 
                  </button>
                  <button type="button" class="btn btn-primary" onclick="new_maand()" >
                    Uitgaven per maand
                  </button> 
                  <button type="button" class="btn btn-primary" onclick="new_jaar()" >
                    Uitgaven per jaar
                  </button> 
          </h6>
        </div>
        <div class="card-body">
					<?php
					if (isset($_SESSION['success']) && $_SESSION['success']!='') {
						echo '<p> '.$_SESSION['success'].' <p>';
							unset($_SESSION['success']);
					}

					if (isset($_SESSION['status']) && $_SESSION['status']!='') {
						echo '<p class="bg-info"> '.$_SESSION['status'].' <p>';
							unset($_SESSION['status']);
					}
					 ?>


          <div class="table-responsive">
						<?php

                        $query = "
                        select project.project_naam, taak.taak_naam, exacte.prijs, exacte.datum
from project, taak, exacte
where 
project.project_id=taak.project_id and taak.taak_id=exacte.taak_id
                        ";
						$query_run = mysqli_query($conn, $query);

						 ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
            
                  <th>project naam</th>
                  <th>taak</th>
                  <th>Uitgave</th>
				  <th>datum</th>
                 
                </tr>
              </thead>
              <tbody>
								<?php
								if (mysqli_num_rows($query_run) > 0) {
									while ($row = mysqli_fetch_assoc($query_run)) {

										?>

                <tr>
                  <td> <?php echo $row['project_naam']; ?> </td>
                  <td> <?php echo $row['taak_naam']; ?> </td>
                  <td> <?php echo "SRD ".$row['prijs']; ?> </td>
                  <td> <?php echo $row['datum']; ?> </td>
                 
                </tr>
								<?php
							}
						}else {
							echo "No records found";
						}

						 ?>

              </tbody>
            </table>

          </div>
        </div>
        </div>
        </div>
        </div>
       
</body>
<script>
  function new_all(){
    location.replace("alle_uitgaven.php")
}  
function new_project(){
    location.replace("projecten_uitgaven.php")
}
function new_maand(){
    location.replace("maandelijke_uitgaven.php")
}
function new_jaar(){
    location.replace("jaarlijkse_uitgave.php")
}
</script>
</html>