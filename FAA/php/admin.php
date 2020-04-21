<?php
include "conn.php";
session_start();
$user = $_SESSION["user"]; 
$admin = new admin;

class admin
{
    private function number_sanitize($user){
        $filter = filter_var($user,FILTER_SANITIZE_NUMBER_INT);
        return $filter;
    }

    public function number(){
        if(isset($_GET['num'])){
            $number = $_GET['num'];
        }else{
            $number = $_POST['project'];
        }
        $num = filter_var($number,FILTER_SANITIZE_NUMBER_INT);
        return $num;
    }

    public function unopend($user,$conn){
        $id = $this-> number_sanitize($user);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak_status = 'unopened'";
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

    public function progress($user,$conn){
        $id = $this-> number_sanitize($user);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak_status = 'progress'";
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

    public function finished($user,$conn){
        $id = $this-> number_sanitize($user);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak_status = 'finished'";
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

    public function overdue($user,$conn){
        $id = $this-> number_sanitize($user);
        $sql = "select count(taak_id) as total from taak where persoon_id = $id and taak_status = 'overdue'";
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

    public function quick_overview($conn){
        $sql = "select project_id, project_naam, persoon_naam,persoon_voornaam, project_start, project_eind 
        from project,persoon
        where
        project.persoon_id = persoon.persoon_id
        order by project_id asc limit 5 ";
        $result = $conn->query($sql);
        if($result->num_rows >=0 ){
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
								<th scope='row'>".$row['project_id']."</th>
								<td>".$row['project_naam']."</td>
								<td>".$row['persoon_naam']." ".$row['persoon_voornaam']."</td>
								<td>".$row['project_start']."</td>
								<td>".$row['project_eind']."</td>
								<td><form action='project_details.php' method='post'>
                                <input type='hidden' name='project' value='".$row['project_id']."'>
                                <button  type='submit' name='edit_btn' class='btn btn-success'><span><i class='fa fa-eye'></i></span></button>
                            </form></td>
							</tr>
                ";
            }
        }
        else{
            echo "error";
        }
    }

    public function project_overview($conn){
        $sql = "select project_id, project_naam, persoon_naam,persoon_voornaam, project_start, project_eind 
        from project,persoon
        where
        project.persoon_id = persoon.persoon_id
        order by project_id asc ";
        $result = $conn->query($sql);
        if($result->num_rows >=0 ){
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
								<th scope='row'>".$row['project_id']."</th>
								<td>".$row['project_naam']."</td>
								<td>".$row['persoon_naam']." ".$row['persoon_voornaam']."</td>
								<td>".$row['project_start']."</td>
								<td>".$row['project_eind']."</td>
								<td><form action='project_details.php' method='post'>
                                <input type='hidden' name='project' value='".$row['project_id']."'>
                                <button  type='submit' name='edit_btn' class='btn btn-success'><span><i class='fa fa-eye'></i></span></button>
                            </form></td>
							</tr>
                ";
            }
        }
        else{
            echo "error";
        }
    }

    public function task_overview($conn){
        $sql = "select project_naam,persoon_naam,persoon_voornaam,taak_status,taak_id,taak_naam
        from project,persoon,taak
        where
        project.persoon_id = persoon.persoon_id
        group by taak_id
        order by taak_id asc ";
        $result = $conn->query($sql);
        if($result->num_rows >=0 ){
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                    <th scope='row'>".$row['taak_id']."</th>
                    <td>".$row['project_naam']."</td>
                    <td>".$row['taak_naam']."</td>
                    <td>".$row['persoon_naam']." ".$row['persoon_voornaam']."</td>
                    <td>".$row['taak_status']."</td>
                    <td><a href='task_info.php?num=".$row['taak_id']."' class='btn btn-success'><span><i class='fa fa-eye'></i></span></a></td>
                </tr>
                ";
            }
        }
        else{
            // echo "error";
            echo "Error: " . $sql. "<br>" . $conn->error;
        }
    }

    public function person_info($conn){
        $person = "select persoon_naam, persoon_voornaam from persoon";
        $result = mysqli_query($conn,$person);
        if (mysqli_num_rows($result) > 0) {
            while ($row =mysqli_fetch_assoc($result)) {
                // echo "<option value=".$row['persoon_voornaam']." ".$row['persoon_naam']." >".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
                echo "<option value='".$row['persoon_naam']."  ".$row['persoon_voornaam']."' >".$row['pesoon_naam']." ".$row['persoon_voornaam']." </option>";
            }
        }
    }

    public function project_info($conn){
        $project = "select project_naam from project";
        $result = mysqli_query($conn,$project);
        if (mysqli_num_rows($result) > 0) {
            while ($row =mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['project_naam']."' >".$row['project_naam']." </option>";
            }
        }
        
    }

    public function project_details($conn){
        $project_id = $this->number();
        $porject_info = "select project_id, project_naam,persoon_naam,prject_budget,project_start,project_eind,project_beschrijving,persoon_voornaam,persoon_naam
        from project, persoon 
        where 
        project.persoon_id = persoon.persoon_id 
        and 
        project_id = $project_id";
        $result = mysqli_query($conn , $porject_info);
        
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                           echo
                           "<tr>
                                <th>Project Name</th>
                               <td>".$row["project_naam"]."</td>
                            </tr>
                            <tr>
                                <th>Lead</th>
                                <td>".$row["persoon_voornaam"]." ".$row["persoon_naam"]."</td>
                            </tr>
                            <tr>
                                <th>Budget</th>
                                <td>SRD".$row["prject_budget"]."<td>
                            </tr>
                            <tr>
                                <th>Start Date</th>
                                <td>".$row["project_start"]."<td>
                            </tr>
                            <tr>
                                <th>End Date</th>
                                <td>".$row["project_eind"]."</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                            </tr>
                            </table>
                            <textarea  cols='80' rows='5' class='text-center'>
                                ".$row["project_beschrijving"]."
                            </textarea>
                            "
                           ; 
                        }
                    }
                    else{
                        // echo "no projects within the given parameters";
                        echo "Error: " . $porject_info. "<br>" . $conn->error;
                    }
    }

    public function task_details($conn){
        $task_id= $this -> number();
        $task_info = "select taak_id,taak_naam,taak_status,persoon_naam,persoon_voornaam 
        from taak, persoon
        where 
        persoon.persoon_id = taak.persoon_id ;";
        $result = mysqli_query($conn , $task_info);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo"
                <tr>
                        <th scope='row'>".$row['taak_id']."</th>
                        <td>".$row['taak_naam']."</td>
                        <td>".$row['persoon_naam']."  ".$row['persoon_voornaam']."</td>
                        <td class='text-primary'>".$row['taak_status']."</td>
                    </tr>
                ";
            }
        }else{

        }

    }

    public function study($conn){
        $richting = "select naam from richting;";
        $result = mysqli_query($conn,$richting);
        if (mysqli_num_rows($result) > 0) {
            while ($row =mysqli_fetch_assoc($result)) {
                // echo "<option value=".$row['persoon_voornaam']." ".$row['persoon_naam']." >".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
                echo "<option value='".$row['naam']."' >".$row['naam']."</option>";
            }
        }
    }

    public function user_overview($conn){
        $sql = "select persoon_id, persoon_naam, persoon_voornaam, 
        persoon_tel, persoon_email, persoon_adres, rol.naam as rol, richting.naam as richting
        from persoon,rol,richting
        where 
        persoon.rol_id = rol.rol_id
        and 
        persoon.richting_id = richting.richting_id 
        and 
        rol.naam IN ('docent','student');
        ";
        $result = $conn->query($sql);
        if($result->num_rows >=0 ){
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                    <th scope='row'>".$row['persoon_id']."</th>
                    <td>".$row['persoon_naam']." ".$row['persoon_voornaam']."</td>
                    <td>".$row['persoon_adres']."</td>
                    <td>".$row['persoon_email']."</td>
                    <td>".$row['persoon_tel']."</td>
                    <td>".$row['rol']."</td>
                    <td>".$row['richting']."</td>
                </tr>
                ";
            }
        }
        else{
            
            echo "Error: " . $sql. "<br>" . $conn->error;
        }
    }

    public function overall_user_overview($conn){
        $sql = "select persoon_id, persoon_naam, persoon_voornaam, 
        persoon_tel, persoon_email, persoon_adres, rol.naam as rol, richting.naam as richting
        from persoon,rol,richting
        where 
        persoon.rol_id = rol.rol_id
        
        ";
        $result = $conn->query($sql);
        if($result->num_rows >=0 ){
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                    <th scope='row'>".$row['persoon_id']."</th>
                    <td>".$row['persoon_naam']." ".$row['persoon_voornaam']."</td>
                    <td>".$row['persoon_adres']."</td>
                    <td>".$row['persoon_email']."</td>
                    <td>".$row['persoon_tel']."</td>
                    <td>".$row['rol']."</td>
                    <td>".$row['richting']."</td>
                </tr>
                ";
            }
        }
        else{
            
            echo "Error: " . $sql. "<br>" . $conn->error;
        }
    }
    
}


?>