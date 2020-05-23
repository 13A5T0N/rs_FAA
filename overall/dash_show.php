<?php session_start();
include "security.php";
include "conn.php";

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</head>
	<body>
		<div class="header">
			<div class="logo1">
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small">
							<?php echo $_SESSION['username']; ?>

						</span>
						<img class="img-profile rounded-circle" src="photos/user.png">
					</a>
					<!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
				</li>


			</div>

			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Brand</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
        <img src="photos/logo.png">
				<span>NATIN</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="index.php">
							<span><i class="fa fa-home"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-product-hunt"></i></span>
							<span>Projects</span>
						</a>
					</li>
					<li>
						<a href="taakform.php">
							<span><i class="fa fa-tasks"></i></span>
							<span>Taken</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-book"></i></span>
							<span>Rapporten</span>
						</a>
					</li>
					<li>
						<a href="listing.php">
							<span><i class="fa fa-users"></i></span>
							<span>Users</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
        Dashboard
      </div>
      <br>


          <div class="table-responsive">
          <?php

          if (isset($_POST['edit_btn'])) {
          $id = $_POST['edit_id'];
          $query = "SELECT project_id, project_naam, project_budget, project_start, project_eind, project_beschrijving, persoon.persoon_naam as naam FROM project, persoon WHERE project.persoon_id = persoon.persoon_id AND project_id='$id'";
          $query_run = mysqli_query($conn, $query);
           ?>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
              <th>project_id</th>
              <th>project_naam</th>
              <th>persoon_id</th>
              <th>project_budget</th>
              <th>project_start</th>
              <th>project_eind</th>
              <th>project_beschrijving</th>
                </tr>
             </thead>
                <tbody>
              <?php
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {

                  ?>

              <tr>
                <td> <?php echo $row['project_id']; ?> </td>
                <td> <?php echo $row['project_naam']; ?> </td>
                <td> <?php echo $row['naam']; ?> </td>
                <td> <?php echo $row['project_budget']; ?> </td>
                <td> <?php echo $row['project_start']; ?> </td>
                <td> <?php echo $row['project_eind']; ?> </td>
                <td> <?php echo $row['project_beschrijving']; ?> </td>
              </tr>


              <?php
            }
          }else {
            echo "No records found";
          }
        }

           ?>

            </tbody>
          </table>
          <a href="index.php" class="btn btn-danger">BACK</a>


        </div>



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


        </div>

		</div>


		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

						<form action="logout.php" method="POST">

							<button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

						</form>


					</div>
				</div>
			</div>
		</div>

	</body>
</html>