<?php session_start();
include "../security.php";
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
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


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
				<a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small">
						<?php echo $_SESSION['username']; ?>
					</span>
					<img class="img-profile rounded-circle" src="../photos/user.png">
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
			<img src="../photos/logo.png">
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
					<a href="projects.php">
						<span><i class="fa fa-product-hunt"></i></span>
						<span>Projects</span>
					</a>
				</li>
				<li>
					<a href="Begrotingen.php">
						<span><i class="fa fa-usd"></i></span>
						<span>Begrotingen</span>
					</a>
				</li>
				<li>
					<a href="bedrijf.php">
						<span><i class="fa fa-building-o"></i></span>
						<span>Bedrijf</span>
					</a>
				</li>

				<li>
					<a href="taakform.php">
						<span><i class="fa fa-tasks"></i></span>
						<span>Taken</span>
					</a>
				</li>
				<li>
					<a href="projecten_uitgaven.php">
						<span><i class="fa fa-book"></i></span>
						<span>Rapporten</span>
					</a>
				</li>
			</ul>

		</nav>
	</div>
	<div class="main-content">
		<div class="title">
			<nav>
				<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Taken Registreren</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Taken Overzicht</a>
				</div>
			</nav>
		</div>
		<br>



		<section id="tabs" class="project-tab">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

								<?php include('taken.php'); ?>



								<div class="container contact">
									<form method="post" action="taken.php">
										<?php include('../errors.php'); ?>

										<div class="form-group">

											<div class="col-sm-10">
												<input required list="project" type="text" class="form-control" placeholder="Projectnaam" name="project">
												<datalist id="project">
													<?php include('../conn.php');
													$selectproject = "select * from projecten.project ";
													$result = mysqli_query($conn, $selectproject);
													if (mysqli_num_rows($result) > 0) {
														while ($row = mysqli_fetch_assoc($result)) {
															//  echo "<option value='".$row['persoon_id']." ".$row['persoon_voornaam'] ." ". "$row[persoon_naam])'>".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
															echo "<option value=" . $row['project_id'] . ">" . $row['project_naam'] . "</option>";
														}
													}
													?>
												</datalist>
												<br>
											</div>




											<table id="myTable" class=" table order-list">
												<thead>
													<tr>
														<td>verantwoordelijke</td>
														<td>Taak</td>
														<td>beschrijving</td>
														<td>Eind datum</td>


													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="col-sm-4">
															<input required list="persoon" type="text" name="persoon" class="form-control" />
															<datalist id="persoon">
																<?php
																include('conn.php');
																$selectpersoon = "select * from projecten.persoon ";
																$result = mysqli_query($conn, $selectpersoon);
																if (mysqli_num_rows($result) > 0) {
																	while ($row = mysqli_fetch_assoc($result)) {

																		echo "<option value=" . $row['persoon_id'] . ">" . $row['persoon_voornaam'] . " " . "$row[persoon_naam]</option>";
																	}
																}

																?>
															</datalist>
														</td>
														<td class="col-sm-4">
															<input required type="text" name="taak" class="form-control" />

														</td>
														<td class="col-sm-4">
															<input type="text" name="beschrijving" class="form-control" />
														</td>
														<td class="col-sm-4">
															<input required type="date" name="eind" class="form-control" />
														</td>


														<td class="col-sm-2"><a class="deleteRow"></a>

														</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>

														<td colspan="0" style="text-align: left;">
															<input type="button" class="btn btn-success" id="addrow" value="+" />
														</td>



													</tr>
													<tr>
													</tr>
												</tfoot>
											</table>
										</div>




								</div>
								<div class="form-group">
									<div class="col-sm-offset-10 col-sm-10">
										<button type="submit" class="btn btn-success" name="verzend">toevoegen</button>
									</div>
								</div>
								</form>
							</div>


							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

								<div>
									<input type="text" name="search" id="search" class="form-control" placeholder="Zoeken..." />
								</div>
								<br><br>

								<div class="table-responsive">
									<?php

									$query = "SELECT taak_id, taak_naam, taak_beschrijving, taak_einde, project.project_naam as pnaam, persoon.persoon_naam as naam FROM taak, project, persoon WHERE taak.project_id = project.project_id AND taak.persoon_id = persoon.persoon_id";
									$query_run = mysqli_query($conn, $query);

									?>

									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
											<tr>
												<th>taak</th>
												<th>project</th>
												<th>persoon naam</th>
												<th>taak naam</th>
												<th>beschrijving</th>
												<th>eind datum</th>
											</tr>
											</tr>
										</thead>
										<tbody id="myTable">
											<?php
											if (mysqli_num_rows($query_run) > 0) {
												while ($row = mysqli_fetch_assoc($query_run)) {

											?>

													<tr>
														<td> <?php echo $row['taak_id']; ?> </td>
														<td> <?php echo $row['pnaam']; ?> </td>
														<td> <?php echo $row['naam']; ?> </td>
														<td> <?php echo $row['taak_naam']; ?> </td>
														<td> <?php echo $row['taak_beschrijving']; ?> </td>
														<td> <?php echo $row['taak_einde']; ?> </td>
													</tr>
											<?php
												}
											} else {
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
			</div>
		</section>
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
<script src="../search.js"></script>

</html>