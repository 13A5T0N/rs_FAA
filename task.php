<?php
$id = $_SESSION['id'];
$taak =  new taak;
class taak{
    
    public function unopend($conn,$id){
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'not started'";
        $result = $conn->query($sql);
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                echo $row["total"];
            }
        }
        else{
            echo "error";
        }
    }

    public function finished($conn,$id){
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'finished'";
        $result = $conn->query($sql);
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                echo $row["total"];
            }
        }
        else{
            echo "error";
        }
    }

    public function bezig($conn,$id){
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'started'";
        $result = $conn->query($sql);
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                echo $row["total"];
            }
        }
        else{
            echo "error";
        }
    }
}

?>