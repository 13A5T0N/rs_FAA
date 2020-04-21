<?php
session_start();
include_once "./php/conn.php";
$date = date("Y-m-d");
$time = date("H:i");
$username = mysqli_real_escape_string($conn,$_POST['username']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);


function log_acces($number,$date,$time,$conn){
    $sql= "insert into log (persoon_id, acces, log_date, log_time) 
    value ($number,'acces','$date','$time')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
function role( $number,$date,$time,$conn){
    if ( $number == 1) {
           header("location:administratie/dashboard.php");
           log_acces($number,$date,$time,$conn);
       }
       elseif($number == 2) {
            header("location:overall/dashboard.php");
            log_acces($number,$date,$time,$conn);
       } else {
  
          header("location:fin");
          log_acces($number,$date,$time,$conn);
       }
}


$sql= "select * from persoon where persoon_naam ='$username'";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
     while($row= $result->fetch_assoc()){
         $number =$row['rol_id'];
         $user = $row['persoon_id'];
         if(password_verify($pwd,$row['password'])){
            if(isset($_POST['remember'])){
                setcookie('user',password_hash($row['persoon_naam'],CRYPT_BLOWFISH),time() + (86400 * 30),'/RS_login','127.0.0.1',NULL,TRUE);
                $_SESSION["username"] = $username;
                log_acces($number,$date,$time,$conn);
                role( $number,$date,$time,$conn);
                
             }
            else{
                role( $number,$date,$time,$conn);
                $_SESSION["user"] = $user;
                
             }
         }
         else {
             echo'not valid';
         }
         

     }
 }

?>