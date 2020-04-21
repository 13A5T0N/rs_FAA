<?php
include_once "conn.php";

$project = mysqli_real_escape_string($conn,$_POST["project"]);
$lead = mysqli_real_escape_string($conn,$_POST["project_lead"]);
$end = mysqli_real_escape_string($conn,$_POST['end']);
$desc = mysqli_real_escape_string($conn,$_POST['desc']);
$taak = mysqli_real_escape_string($conn,$_POST['task_name']);

$name = explode(' ',$lead);


$select_project = " select project_id from project where project_naam = '$project'";
$result = mysqli_query($conn,$select_project);
if (mysqli_num_rows($result) > 0) {
    while ($row =mysqli_fetch_assoc($result)) {
        $project = $row['project_id'] ;
    }
 }

$select_person = "select persoon_id from persoon where persoon_naam = '$name[0]' and persoon_voornaam = '$name[2]'";
$result = mysqli_query($conn,$select_person);
if (mysqli_num_rows($result) > 0) {
    while ($row =mysqli_fetch_assoc($result)) {
        $persoon = $row['persoon_id'] ;
    }
}


if(isset($_POST['submit'])){
    $task = "insert into taak(project_id,persoon_id,taak_naam,taak_beschrijving,taak_einde)
    value
    ($project,$persoon,'$taak','$desc','$end') ";

    if ($conn->query($task) === TRUE) {
        header("location:../administratie/task_overview.php");
    } else {
        echo "Error: " . $task . "<br>" . $conn->error;
    }
    
    
    $conn->close();

}else{
    header("location:../administratie/task_overview.php");
}


?>