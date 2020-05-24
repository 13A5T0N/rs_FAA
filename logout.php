<?php


if (isset($_POST['logout_btn'])) {
  session_destroy();
  session_unset(); 
  header("location: ../index.php");

}
