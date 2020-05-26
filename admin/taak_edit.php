<?php
$id = $_POST['edit_id'];
include '../conn.php';
$taak = "select project_naam,taak_naam,persoon_naam,persoon_voornaam,taak_naam,taak_beschrijving,taak_einde,taak
from taak,persoon,project
where
persoon.persoon_id = taak.persoon_id 
and
project.project_id = taak.project_id
and 
taak_id = $id";
$result = mysqli_query($conn, $taak);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $project = $row['project_naam'];
        $taak = $row['taak_naam'];
        $naam = $row['persoon_naam'];
        $voor_naam = $row['persoon_voornaam'];
        $persoon = $naam . "  " . $voor_naam;
        $besch = $row['taak_beschrijving'];
        $einde = $row['taak_einde'];
        $status = $row['taak'];
    }
}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="main.js"></script>
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
                        <form action="project_save.php" method="POST">
                            <input type="hidden" name="edit_id" value="">
                            <div class="form-group">
                                <label> Project </label>
                                <input type="text" name="naam" value="<?php echo $project ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label> Taak Naam </label>
                                <input type="text" name="beschrijving" value="<?php echo $taak ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label> Verantwoordelijk </label>
                                <input type="text" name="budget" value="<?php echo $persoon ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label> Taak beschrijving</label>
                                <input type="text" name="start" value="<?php echo $besch ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label> Eind Datum</label>
                                <input type="date" name="start" value="<?php echo $einde ?>" class="form-control" disabled>
                            </div>
                            <div class="fom-group mt-2 mb-4">
                                <select class="form-control form-control-sm">
                                    <option value="finished">Afgerond</option>
                                    <option value="">Niet geopend</option>
                                </select>
                            </div>
                            <a href="projects.php" class="btn btn-danger">CANCEL</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">SAVE</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>