<?php
include_once "../php/admin.php";
$number = $_GET['num'];
$admin -> number();
$task_id = $admin -> number();
        $task = "select persoon_naam ,persoon_voornaam,project_naam,taak_status,
        taak_beschrijving,taak_naam
        from taak,persoon,project 
        where
        project.project_id = taak.project_id
        and 
        persoon.persoon_id = taak.persoon_id  
        and
        taak_id = $task_id";
        $result = mysqli_query($conn , $task);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
               $project = $row['project_naam'] ;
               $persoon = $row['persoon_naam']."  ".$row['persoon_voornaam'];
               $status = $row['taak_status'];
               $taak = $row['taak_naam'];
               $bes = $row ['taak_beschrijving'];
            }
        }
        else{
            // echo "no projects within the given parameters";
            echo "Error: " . $task. "<br>" . $conn->error;
        }
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
                      <a href="new_project.php" class="nav-link text-white">
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
                <div class="col-4 mt-5 mx-auto">
                    <button class="btn btn-success" data-toggle="modal" data-target="#updateModal">update</button>
                    
                 </div>
                <div class="task_info">
                    <div class="task_name">
                        <div class="col-12">
                            <h3 class="text-sm text-secondary font-weight-normal">Task Name</h3>
                            <input type="text" disabled class="form-control text-dark text-uppercase font-weight-bolder text-center" placeholder="<?php echo $taak ;?>">
                        </div>
                        <div class=" col-12 mt-3">
                            <h3 class="text-sm text-secondary font-weight-normal">Responsible</h3>
                            <input type="text" disabled class="form-control text-dark text-center text-uppercase font-weight-bolder" placeholder="<?php echo $persoon ;?>">
                        </div>
                        <div class="col-12 mt-3">
                            <h3 class="text-sm text-secondary font-weight-normal"> Project</h3>
                            <input type="text" disabled class="form-control text-dark text-center text-font-weight-bolder text-uppercase" placeholder="<?php echo $project ;?>"> 
                        </div>
                        <div class="col-12 mt-3">
                            <h3 class="text-sm text-secondary font-weight-normal">Status</h3>
                            <input type="text" disabled class="form-control text-center text-dark text-font-weight-bolder text-uppercase" placeholder="<?php echo $status ;?>">
                        </div>
                        <div class="col-12 mt-3">
                            <h3 class="text-sm text-secondary font-weight-normal" >description</h3>
                            <textarea disabled class="form-control text-dark font-weight-bolder text-center" cols="20" rows="3"><?php echo $bes ;?></textarea>
                        </div>
                    </div>

                   
                    
                    <div class="modal fade" id="updateModal" tabindex="1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <h4 class="modal-title text-secondary" id="exampleModalLabel">Update Info</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="maodal-body">
                                    <form action=".." method="post">
                                        <div class="col-12">
                                            <h6 class="text-secondary text-xs">Change title</h6>
                                            <select class="custom-select">
                                                <option selected></option>
                                                <option value="2">finished</option>
                                                <option value="3">canceled</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
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
