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
					<a class="dropdown-item" href="request.php">Request</a>
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
                          Overview
                      </a>
                      <a href="#" class="nav-link text-white active">
                          New Project
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
                        Overview
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
                        Overview
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
            <div class="col-10">
                <form action="../php/new_project.php" method="post" >
                    <div class="new_proj">
                        <div class="head">
                            <h2>Create new project</h2>  
                        </div>
                        <hr style="width: 100%;">
                        <div class="proj_name">
                            <h6 class="text-secondary text-xs">Project Name</h6>
                            <input type="text" name="project_name" id="" class="form-control">
                        </div>
                        <div class="proj_lead">
                            <h6 class="text-secondary text-xs">Project leader</h6>
                            <input list="lead" name="project_lead" type="text" class="form-control">
                            
                            <datalist id="lead">
                              
                            </datalist>
                        </div>
                        <div class="proj_budget">
                            <h6 class="text-secondary text-xs">Project budget</h6>
                            <input type="number" name="project_budget" id="" class="form-control">
                        </div>
                        <div class="start_date">
                                <h6 class="text-secondary text-xs text-uppercase">Start date</h6>
                                <input type="date" name="project_start" id="" class="form-control">
                        </div>
                        <div class="end_date">
                            <div class="col-12">
                                <h6 class="text-secondary text-xs text-uppercase">end date</h6>
                                <input type="date" name="project_end" id="" class="form-control">
                            </div>
                        </div>
                        <div class="proj_besch">
                            <h6 class="text-secondary text-xs">Project description </h6>
                           <textarea name="project_desc" id="" cols="20" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="proj_submit">
                            <input type="submit" name="submit" value="submit" class="btn btn-success">
                        </div>
                        <div class="proj_cancel">
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
	</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="../js/main.js"></script>
<script src="../js/warning.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>
