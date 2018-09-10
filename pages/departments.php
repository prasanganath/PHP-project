<?php

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}elseif($_SESSION['usertype']!=1){
	header("location: ../index.php");
}

// -----------------SELECT Quaries----------------------------//

//Get a List of Professors

$profquery="SELECT profID,profFName,profLName FROM professors";
$profselect=mysqli_query($connection,$profquery);



//Get a List of Locations

$locations="SELECT * FROM location";
$locationselect=mysqli_query($connection,$locations);

// -----------------SELECT Quaries----------------------------//

$depquery="SELECT D.depID,D.depName,D.depPhone,P.profFName,P.profLName,L.locStreeNo,L.locStreet,L.locCity 
		FROM departments AS D LEFT OUTER JOIN location AS L ON D.locationID = L.locationID 
		LEFT OUTER JOIN professors AS P ON D.profID = P.profID;";

$depcon=mysqli_query($connection,$depquery);


// -----------------INSERT Quaries----------------------------//

if(isset($_POST['add_department'])){

	$depID=$_POST['departmentId'];
	$depName=$_POST['departmentName'];
	$depPhone=$_POST['departmentContact'];
	$profID=$_POST['departmentHead'];
	$location=$_POST['departmentLocation'];
	$depinsquery="INSERT INTO departments(depID, depName, depPhone, profID, locationID) VALUES ('$depID','$depName','$depPhone','$profID','$location')";
	$depins=mysqli_query($connection,$depinsquery);
	if($depins){

		echo "<script>alert('submitted Succefully')</script>";
		header("location: department.php");
	}else{
		echo "<script>alert('submition Failed')</script>";
	}
}

require_once('layout/header.php'); ?>

	<!-- Sub Page -->
	<div class="container sub-page border-default">

		<div class="sub-page-box">
			<div class="container sub-page-title text-center border-default"> DEPARTMENTS </div>
		</div>

		<div class="sub-page-box">
			<button class="sub-page-btn border-default" onclick="show_div('add_department_form')"> Add a New Department </button>
		</div>

		<div class="sub-page-box">
			<table class="container sub-page-table text-center">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Head</th>
					<th>Location</th>
					<th>Actions</th>
				</tr>

				<!-- Show Department and Location Table Data -->
				<?php
					$row="";
					if(mysqli_num_rows($depcon)>0){
						while($department=mysqli_fetch_assoc($depcon)){
							$depid=$department['depID'];
							$row=$row."<tr>
							<td>$department[depID]</td>
							<td>$department[depName]</td>
							<td>$department[depPhone]</td>
							<td>$department[profFName] $department[profLName]</td>
							<td>$department[locStreeNo] , $department[locStreet] , $department[locCity]</td>
							<td>
								<a href='queryboxes/department.php?id=$depid' target='new'><button class='table-btn'>EDIT</button></a>
								<a href='./queryboxes/delete.php?department=$department[depID]'><button class='table-btn'>DELETE</button></a>
							</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>
	</div>
	
	<!-- Department Add Form  -->
	<div class="container sub-page border-default" style="display:none" id="add_department_form">
        <form action="departments.php" autocomplete="on" method="POST">
            <!-- Department ID -->
            <input type="text" name="departmentId" class="container inputs border-default" placeholder="Department ID" required/>
            
            <!-- Name -->
            <input type="text" name="departmentName" class="container inputs border-default" placeholder="Department Name" required/>

            <!-- Contact -->
            <input type="text" name="departmentContact" class="container inputs border-default" placeholder="Contact Number" required/>

            <!-- Head -->
            <select name="departmentHead" class="container select border-default" required>
            	<option selected disabled>Select Department Head</option>
            	<?php 
            		while ($head=mysqli_fetch_assoc($profselect)) {
            			$profName=$head['profFName']." ".$head['profLName'];
            			$value=$head['profID'];
            			echo "<option value='$value'>$profName</option>";
            		}
            	?>
            </select>

            <!-- Location -->
            <select name="departmentLocation" class="container select border-default" required>
            	<option selected disabled>Select a Location</option>
            	<?php 
            		while ($loc=mysqli_fetch_assoc($locationselect)) {
            			$adddress=$loc['locStreet'].", ".$loc['locStreeNo'].", ".$loc['locCity'];
            			$value=$loc['locationID'];
            			echo "<option value='$value'>$adddress</option>";
            		}
            	?>
            </select>
           
            <!-- submit Button -->
            <button name="add_department" type="submit" class="container btn">Add Department</button>
            <!-- cancel Button -->
            <button name="add_department_cancel" onclick="hide_div('add_department_form')" class="container btn">Cancel</button>
	  	</form>
    </div>
</body>

</html>