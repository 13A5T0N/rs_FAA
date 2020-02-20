<?php include('register.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
						<a href="projects.php">
							<span><i class="fa fa-product-hunt"></i></span>
							<span>Projects</span>
						</a>
					</li>
					<li>
						<a href="#">
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
				Register user
			</div>
      <br>
      <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="register.php" method="POST">
							<?php include('errors.php'); ?>


              <div class="modal-body">

                  <div class="form-group">
                      <label> Naam </label>
                      <input type="text" name="naam" class="form-control" placeholder="Naam">
                  </div>
									<div class="form-group">
											<label> Voornaam </label>
											<input type="text" name="voornaam" class="form-control" placeholder="Voornaam">
									</div>
									<div class="form-group">
											<label> Telefoon </label>
											<input type="number" name="telefoon" class="form-control" placeholder="Telefoon">
									</div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                      <label>Adres</label>
                      <input type="text" name="adres" class="form-control" placeholder="Adres">
											<br>
											<select name="rol" class="browser-default custom-select  col-sm-12">
					            <option value="">rol</option>
					            <option value="1">student</option>
				            	<option value="2">docent</option>
				              </select>
                  </div>
									<div class="form-group">
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
									</div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
              </div>
            </form>

          </div>
        </div>
      </div>


      <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add Admin Profile
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

						$query = "SELECT persoon_id, persoon_email, persoon_naam, persoon_voornaam, persoon_tel, persoon_adres,richting.naam as richting ,rol.naam as rol
                      FROM persoon, rol, richting where persoon.richting_id = richting.richting_id and persoon.rol_id  = rol.rol_id";
						$query_run = mysqli_query($conn, $query);

						 ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>persoon_id</th>
                  <th>persoon_naam</th>
                  <th>persoon_voornaam</th>
                  <th>persoon_tel</th>
									<th>persoon_email</th>
									<th>persoon_adres</th>
									<th>rol</th>
									<th>richting</th>
                  <th>EDIT </th>
                </tr>
              </thead>
              <tbody>
								<?php
								if (mysqli_num_rows($query_run) > 0) {
									while ($row = mysqli_fetch_assoc($query_run)) {

										?>

                <tr>
                  <td> <?php echo $row['persoon_id']; ?> </td>
                  <td> <?php echo $row['persoon_naam']; ?> </td>
                  <td> <?php echo $row['persoon_voornaam']; ?> </td>
                  <td> <?php echo $row['persoon_tel']; ?> </td>
									<td> <?php echo $row['persoon_email']; ?> </td>
									<td> <?php echo $row['persoon_adres']; ?> </td>
									<td> <?php echo $row['rol']; ?> </td>
									<td> <?php echo $row['richting']; ?> </td>
                  <td>
                      <form action="register_edit.php" method="post">
                          <input type="hidden" name="edit_id" value="<?php echo $row['persoon_id']; ?>">
                          <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                      </form>
                  </td>
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
	</body>
</html>
