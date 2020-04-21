<?php
include_once 'conn.php';

$name = mysqli_real_escape_string($conn,$_POST['name']);
$first_name = mysqli_real_escape_string($conn,$_POST['first_name']); 
$tel= mysqli_real_escape_string($conn,$_POST['number'] ); 
$email =  mysqli_real_escape_string($conn,$_POST['email']);
$address =  mysqli_real_escape_string($conn,$_POST['address']);
$richting = mysqli_real_escape_string($conn,$_POST['richting']);
$role = mysqli_real_escape_string($conn,$_POST['role']);

$get_richting = "select richting_id  from richting  where  naam = '$richting'";
$result = mysqli_query($conn,$get_richting);
if (mysqli_num_rows($result) > 0) {
    while ($row =mysqli_fetch_assoc($result)) {
        $richting = $row['richting_id'];
    }
}

switch ($role){
    case 1:
        $pas = 'admin';
        $hash = password_hash($pas,PASSWORD_DEFAULT);
        $sql = "insert into persoon(persoon_naam,persoon_voornaam,persoon_tel,persoon_email,persoon_adres,rol_id,richting_id,password)
         value ('$name','$first_name','$tel','$email','$address',$role,$richting,'$hash');";
    
        if ($conn->query($sql) === TRUE) {
            header('location:../overall/user_overview.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    break;
    case 2:
        $pas = 'overall';
        $hash = password_hash($pas,PASSWORD_DEFAULT);
        $sql = "insert into persoon(persoon_naam,persoon_voornaam,persoon_tel,persoon_email,persoon_adres,rol_id,password)
         value ('$name','$first_name','$tel','$email','$address',$role,'$hash');";
    
        if ($conn->query($sql) === TRUE) {
            header('location:../overall/user_overview.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    break;
    case 3:
        $sql = "insert into persoon(persoon_naam,persoon_voornaam,persoon_tel,persoon_email,persoon_adres,rol_id,richting_id)
         value ('$name','$first_name','$tel','$email','$address',$role,$richting);";
    
        if ($conn->query($sql) === TRUE) {
            header('location:../overall/user_overview.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    break;
    case 4:
        $sql = "insert into persoon(persoon_naam,persoon_voornaam,persoon_tel,persoon_email,persoon_adres,rol_id,richting_id)
         value ('$name','$first_name','$tel','$email','$address',$role,$richting);";
    
        if ($conn->query($sql) === TRUE) {
            header('location:../overall/user_overview.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    break;
    case 5:
        $pas = 'fin';
        $hash = password_hash($pas,PASSWORD_DEFAULT);
        $sql = "insert into persoon(persoon_naam,persoon_voornaam,persoon_tel,persoon_email,persoon_adres,rol_id,password)
         value ('$name','$first_name','$tel','$email','$address',$role,'$hash');";
    
        if ($conn->query($sql) === TRUE) {
            header('location:../overall/user_overview.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    break;

}

?>