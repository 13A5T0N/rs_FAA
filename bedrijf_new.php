<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../conn.php"; ?>
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
						<a href="#">
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
        <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">nieuw bedrijf</h6>
          </div>
          <div class="card-body">
          <form action="bedrijf_save.php" method="POST">
                  <input type="hidden" name="edit_id" value="">
                  <div class="form-group">
                  <label> Bedrijf Naam </label>
                  <input type="text" name="naam" value="" class="form-control" placeholder="Bedrijf naam">
                  </div>
                  <div class="form-group">
                  <label> Bedrijf nummer </label>
                  <input type="number" name="Bdnummer" value="" class="form-control" placeholder="Bedrijf telefoon nummer">
                  </div>
                  <div class="form-group">
                  <label> Bedrijf email </label>
                  <input type="email" name="bedr_email" value="" class="form-control" placeholder="Bedrijf email">
                  </div>
                  <div class="form-group">
                  <label> Bedrijf adres</label>
                  <input type="text" name="adres" value="" class="form-control" placeholder="Bedrijf adres">
                  </div>
                  <div class="form-group">
                  
                  
				  
                 <a href="bedrijf.php" class="btn btn-danger">CANCEL</a>
                 <button type="submit" name="updatebtn" class="btn btn-primary">SAVE</button>
          </form>



        </div>
          </div>
        </div>
      </div>
      </div>
    
</body>
</html>