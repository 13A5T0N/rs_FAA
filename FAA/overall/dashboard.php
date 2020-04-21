<?
include "../php/admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
	<div class="header">
		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a href="" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline ">user</span>
					<i class="fa fa-user "></i>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Request</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="../logout.php">Logout</a>
				  </div>
			</li>
		</ul>
	</div>
	
	<div class="side-nav">
		<div class="text-center brand">
			<span class="text-uppercase font-weight-bold text-white">Company</span>
		</div>
		<nav class="nav flex-column text-center ">
			<a href="#" class="nav-link text-white font-weight-bolder">
				<span><i class="fa fa-home"></i></span>
				Home
            </a>
            <a class="nav-link text-white" data-toggle="collapse" href="#project" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span><i class="fa fa-product-hunt"></i></span>
				<span>Projects</span>
              </a>
              <div class="collapse" id="project">
                  <nav class="nav flex-column text-center">
                      <a href="project_overview.php" class="nav-link text-white">
                          overview
                      </a>
                      <a href="new_project.php" class="nav-link text-white">
                          new project
                      </a>
                  </nav>
              </div>
			<a class="nav-link text-white" data-toggle="collapse" href="#task" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span><i class="fa fa-tasks"></i></span>
                Task
            </a>
            <div class="collapse" id="task">
                <nav class="nav flex-column text-center">
                    <a href="task_overview.php" class="nav-link text-white">
                        overview
                    </a>
                    <a href="new_task.php" class="nav-link text-white">
                        New Task
                    </a>
                </nav>
			</div>
			<a class="nav-link text-white" data-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="collapseExample">
				<span><i class="fa fa-users"></i></span>
				Users
			</a>
			<div class="collapse" id="users">
                <nav class="nav flex-column text-center">
                    <a href="user_overview.php" class="nav-link text-white">
                        overview
                    </a>
                    <a href="new_user.php" class="nav-link text-white">
                        New User
                    </a>
                </nav>
			</div>
			

		</nav>
	</div>

	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<!-- task notifacation  -->
				<div class="notifaction">
					<div class="card-deck">
						 <!-- task Unopend -->
						<!-- <div class="card" >
							<div class="card-body">
								<h5 class="card-title text-xs font-weight-bold text-dark text-uppercase mb-1">Unopened</h5>
								<span class="card-body h5 mb-0 font-weight-bold text-gray-800"><?php $admin -> unopend($user,$conn); ?></span>
								<i class="fa fa-times fa-2x text-gray-300"></i>
							</div>
						</div> -->
						<!-- task in progress -->
						<div class="card" >
							<div class="card-body">
								<h5 class="card-title text-xs font-weight-bold text-primary text-uppercase mb-1">in progress</h5>
								<span class="card-body h5 mb-0 font-weight-bold text-gray-800"><? $admin->progress($user,$conn)?></span>
								<i class="fa fa-spinner fa-2x text-gray-300"></i>
							</div>
						</div>
						<!-- task finished -->
						<div class="card" >
							<div class="card-body">
								<h5 class="card-title text-xs font-weight-bold text-success text-uppercase mb-1">finished</h5>
								<span class="card-body h5 mb-0 font-weight-bold text-gray-800"><?php $admin->finished($user,$conn)?></span>
								<i class="fa fa-check-circle-o fa-2x text-gray-300"></i>
							</div>
						</div>
						<!-- task overdue-->
						<div class="card" >
							<div class="card-body">
								<h5 class="card-title text-xs font-weight-bold text-danger text-uppercase mb-1">overdue</h5>
								<span class="card-body h5 mb-0 font-weight-bold text-gray-800"><?php $admin->overdue($user,$conn)?></span>
								<i class="fa fa-exclamation-circle fa-2x text-gray-300"></i>
							</div>
						</div>

					</div>
				</div>
			</div>
			
			<div class="col-12">
				<div class="project-view">
					<table class="table text-center text-uppercase table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">project</th>
								<th scope="col"> start</th>
								<th scope="col"> end</th>
								<th scope="col">lead</th>
								<th scope="col">more</th>
							</tr>
						</thead>
						<tbody>
							<? $admin->quick_overview($conn)?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>



<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="../js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>
