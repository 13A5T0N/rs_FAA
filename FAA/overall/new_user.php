<?php
include_once "../php/admin.php";
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
				<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray">user</span>
					<i class="fa fa-user"></i>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Separated link</a>
				  </div>
			</li>
		</ul>
	</div>
	
	<div class="side-nav">
		<div class="text-center brand">
			<span class="text-uppercase font-weight-bold text-white">Company</span>
		</div>
		<nav class="nav flex-column text-center ">
			<a href="dashboard.php" class="nav-link text-white font-weight-bolder">
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
                    <a href="#" class="nav-link text-white">
                        New User
                    </a>
                </nav>
            </div>
           
		</nav>
	</div>

	<div class="container">
        <div class="row">
            <div class="col-10">
                <div class="new_proj">
                    <div class="head">
                        <h2>Create new user</h2>  
                    </div>
                    <hr style="width: 100%;">
                    <form action="../php/user.php" method="post" autocomplete="off">

                        <div class="mt-5 col-12">
                            <h6 class="text-secondary text-xs">Name</h6>
                            <input type="text" name="name" class = "form-control">
                        </div>
                        <div class="mt-2 col-12">
                            <h6 class="text-secondary text-xs">First name</h6>
                            <input type="text" name="first_name" class = "form-control">
                        </div>

                        <div class="mt-4 col-12">
                            <h3>Contact Info</h3>
                            <hr class= "text-dark">
                        </div>
                        
                        <div class=" mt-4 col-12">
                            <h6 class="text-secondary text-xs">Telephone number</h6>
                            <input type="tel" name="number" id="" class="form-control">
                        </div>
                        <div class="mt-4 col-12">
                            <h6 class="text-secondary text=xs">Email address</h6>
                            <input type="email" name="email" id="" class="form-control">
                        </div>

                        <div class="mt-4 col-12">
                             <h6 class="text-secondary text=xs">Address</h6>
                            <input type="text" name="address" id="" class="form-control">
                        </div>

                        <div class="mt-4 col-12">
                            <h3>Administrative Info</h3>
                            <hr class= "text-dark">
                        </div>

                        <div class="mt-4 col-12">
                            <h6 class="text-secondary text-xs">field of Study</h6>
                            <input   list="lead" name="richting" type="text" class="form-control">
                            
                            <datalist id="lead">
                                <?php $admin->study($conn) ?>
                            </datalist>
                        </div>
                        
                        <div class="mt-4 col-12">
                                <h6 class="text-secondary text-xs text-uppercase">Role</h6>
                                <select class="custom-select" name="role">
                                    <option value="1">Administrator</option>
                                    <option value="5">Fin</option>
                                    <option value="2">overall user</option>
                                    <option value="3">Student</option>
                                    <option value="4">Teacher</option>                         
                                </select>
                        </div>
                        <br>
                       
                        <div class="proj_submit">
                            <input type="submit" name="admin_submit" value="Submit" class="btn btn-success">
                        </div>
                        <div class="proj_cancel">
                            <input type="submit" value="Cancel" class="btn btn-danger">
                        </div>
                    </form>
                    
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
