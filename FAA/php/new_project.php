<?php
include_once 'conn.php';

$name = mysqli_real_escape_string($conn,$_POST['project_name']);
$lead = mysqli_real_escape_string($conn,$_POST['project_lead']);
$budget =  mysqli_real_escape_string($conn,$_POST['project_budget']);
$start  =  mysqli_real_escape_string($conn,$_POST['project_start']);
$end  =  mysqli_real_escape_string($conn,$_POST['project_end']);
$desc =  mysqli_real_escape_string($conn,$_POST['project_desc']);

$lead_name = explode(" ",$lead);
// print_r($lead_name);


$select_person = "select persoon_id from persoon where persoon_naam = '$lead_name[0]' and persoon_voornaam = '$lead_name[2]'";
$result = mysqli_query($conn,$select_person);
if (mysqli_num_rows($result) > 0) {
    while ($row =mysqli_fetch_assoc($result)) {
        $person = $row['persoon_id'] ;
       
    }
}else {
            echo "Error: " . $select_person . "<br>" . $conn->error;
        }

if(isset($_POST['submit'])){
    if ($end < $start) {
        header('location:../administratie/new_project.php#1');
    }
    else{
        $sql = "INSERT INTO project( project_naam, persoon_id, prject_budget, project_start, project_eind, project_beschrijving)
        VALUES ('$name',$person,$budget,'$start','$end','$desc')";
    }

    if ($conn->query($sql) === TRUE) {
        header('location:../administratie/project_overview.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    


}else{
    header("location:../administratie/task_overview.php");
}

$conn->close();
?>