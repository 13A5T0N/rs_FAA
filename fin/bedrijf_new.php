<?php
session_start();
include "../security.php";
include "../conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

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