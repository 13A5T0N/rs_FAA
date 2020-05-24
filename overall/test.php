<?php
session_start();
include "../conn.php";
$id = $_SESSION['id'];
include "../task.php";

// $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'not started'";
//         $result = $conn->query($sql);
//         if($result->num_rows >0 ){
//             while($row = $result->fetch_assoc()){
//                 echo $row["total"];
//             }
//         }
//         else{
//             echo "error";
//         }

$taak -> unopend($conn,$id); 
?>