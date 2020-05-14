<?php
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
              $query = "SELECT * FROM persoon WHERE persoon_id='$id'";
              $query_run = mysqli_query($conn, $query);

              foreach ($query_run as $row) {
                ?>

                <form action="register.php" method="POST">
                  <input type="hidden" name="edit_id" value="<?php echo $row['persoon_id'] ?>">
                  <div class="form-group">
                  <label> Naam </label>
                  <input type="text" name="edit_naam" value="<?php echo $row['persoon_naam'] ?>" class="form-control" placeholder="Naam">
                  </div>
                  <div class="form-group">
                  <label> Voornaam </label>
                  <input type="text" name="edit_voornaam" value="<?php echo $row['persoon_voornaam'] ?>" class="form-control" placeholder="Voornaam">
                  </div>
                  <div class="form-group">
                  <label> Telefoon </label>
                  <input type="number" name="edit_telefoon" value="<?php echo $row['persoon_tel'] ?>" class="form-control" placeholder="Telefoon">
                  </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="edit_email" value="<?php echo $row['persoon_email'] ?>" class="form-control" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                  <label>Adres</label>
                  <input type="text" name="edit_adres" value="<?php echo $row['persoon_adres'] ?>" class="form-control" placeholder="Adres">
                  <br>
                  <select name="edit_rol" value="<?php echo $row['rol_id'] ?>" class="browser-default custom-select  col-sm-12">
                  <option value="">rol</option>
					        <option value="1">student</option>
								  <option value="2">docent</option>
								  <option value="3">Administratie</option>
								  <option value="4">Financien</option>
								  <option value="5">Overall User</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <select name="edit_richting" value="<?php echo $row['richting_id'] ?>" class="browser-default custom-select  col-sm-12">
                  <option value="">richting</option>
                  <option value="1">ICT</option>
                  <option value="2">AV</option>
                  <option value="3">PT</option>
                  <option value="4">infrastructuur</option>
                  <option value="5">bouw</option>
                  <option value="6">mijnbouw</option>
                  <option value="7">analisten</option>
                  <option value="8">apothekers assistent</option>
                  <option value="9">electro</option>
                  <option value="10">WTB</option>
                  </select>
                  </div>

                 <a href="listing.php" class="btn btn-danger">CANCEL</a>
                 <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
          </form>



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
