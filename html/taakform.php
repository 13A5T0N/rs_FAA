<?php include('taken.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


<title>Taken</title>

</head>

<body>



<div class="w3-sidebar w3-black w3-bar-block text-center " style="width:25%">
	<img src="logo.png" style="width:75%">
	<div class="nav"><a href="">Home</a></div>
	<div class="nav"><a href="registratieform.php">Add user</a></div>
	<div class="nav"><a href="newprojectform.php">Add project</a></div>
</div>


<div class="container contact">
	<form method="post" action="taken.php">
		<?php include('errors.php'); ?>
	
	<div class="text-center"><h1>Takenverdeling</h1></div>
			<div class="col-md-9">
				<div class="contact-form">
					
					 
					<div class="form-group">
			
					  <div class="col-sm-10">          
						<input list="project" type="text" class="form-control"  placeholder="Projectnaam" id="search" name="project">
						<datalist id="project">
              <?php
					include ('conn.php');
					 $selectproject="select * from projecten.project " ;
					 $result = mysqli_query($conn,$selectproject);
					 if (mysqli_num_rows($result) >0){
						 while($row =mysqli_fetch_assoc($result)){
							//  echo "<option value='".$row['persoon_id']." ".$row['persoon_voornaam'] ." ". "$row[persoon_naam])'>".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
							echo "<option value=".$row['project_id'].">".$row['project_naam'] ."</option>";
						 }
                     }
                     ?>
              </datalist>
						<br>
					  </div>
					
					  
					  
					  
					  <table id="myTable" class=" table order-list">
					<thead>
							<tr>
								<td>verantwoordelijke</td>
								<td>Taak</td>
								<td>beschrijving</td>
								<td>Einddatum</td>
						
								
							</tr>
					</thead>
					<tbody>
							<tr>
								<td class="col-sm-4">
									<input list="persoon" type="text" name="persoon" class="form-control" />
									<datalist id="persoon">
					 <?php
					include ('conn.php');
					 $selectpersoon="select * from projecten.persoon " ;
					 $result = mysqli_query($conn,$selectpersoon);
					 if (mysqli_num_rows($result) >0){
						 while($row =mysqli_fetch_assoc($result)){
							//  echo "<option value='".$row['persoon_id']." ".$row['persoon_voornaam'] ." ". "$row[persoon_naam])'>".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
							echo "<option value=".$row['persoon_id'].">".$row['persoon_voornaam'] ." ". "$row[persoon_naam]</option>";
						 }
					 }
					 
					  ?>    
					 </datalist>
								</td>
								<td class="col-sm-4">
									<input  type="text" name="taak"  class="form-control"/>
									
								</td>
								<td class="col-sm-4">
									<input type="text" name="beschrijving"  class="form-control"/>
								</td>
								<td class="col-sm-4">
									<input type="date" name="eind"  class="form-control"/>
								</td>
								
				
								<td class="col-sm-2"><a class="deleteRow"></a>
					
								</td>
							</tr>
					</tbody>
					<tfoot>
							<tr>
	
								<td colspan="0" style="text-align: left;">
									<input type="button" class="btn btn-success" id="addrow" value="+" />
								</td>
			  
							
								
							</tr>
							<tr>
							</tr>
						</tfoot>
					</table>
					</div>
				



					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-10 col-sm-10">
	
					  <button type="submit" class="btn btn-success" name="verzend">toevoegen</button>
	
					  </div>
	
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</body>





<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="persoon' + counter + '"/></td>';
		cols += '<td><input type="number" class="form-control" name="taak' + counter + '"/></td>';
		cols += '<td><input type="text" class="form-control" name="omschrijving' + counter + '"/></td>';
		cols += '<td><input type="date" class="form-control" name="eind' + counter + '"/></td>';
	
	
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});

</script>
</html>