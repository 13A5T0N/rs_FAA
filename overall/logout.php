<?php
include "../conn.php";

if (isset($_POST['logout_btn'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../");
}


?>
