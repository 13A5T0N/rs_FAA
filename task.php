<?php
include "conn.php";
$taak = new task;
class task{
    private function number_sanitize($id){
        $filter = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        return $filter;
    }
    
    public function unopend($id,$conn){
        // $id = $this-> number_sanitize($id);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'not started'";
        $result = $conn->query($sql);
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                echo $row["total"];
            }
        }
        else{
            // echo "Error: " . $sql . "<br>" . $conn->error;
            echo "error";
        }
    }
    public function progress($id,$conn){
        // $id = $this-> number_sanitize($id);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'progress'";
        $result = $conn->query($sql);
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                echo $row["total"];
            }
        }
        else{
            // echo "Error: " . $sql . "<br>" . $conn->error;
            echo "error";
        }
    }
    public function finished($id,$conn){
        // $id = $this-> number_sanitize($id);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak = 'finished'";
        $result = $conn->query($sql);
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                echo $row["total"];
            }
        }
        else{
            // echo "Error: " . $sql . "<br>" . $conn->error;
            echo "error";
        }
    }
}
