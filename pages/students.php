<?php

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}elseif($_SESSION['usertype']!=1){
	header("location: ../index.php");
}


// -----------------SELECT Quaries----------------------------//

$stdquery="SELECT S.stdID,S.stdFName,S.stdLName,S.stdStreetNo,S.stdStreet,S.stdCity,U.stdID AS UGR,G.stdID AS GR
		   FROM students AS S LEFT OUTER JOIN undergraduate AS U ON S.stdID = U.stdID 
		   LEFT OUTER JOIN graduate AS G ON S.stdID = G.stdID;";

$stdcon=mysqli_query($connection,$stdquery);

// -----------------INSERT Quaries----------------------------//

if(isset($_POST['add_student'])){

	$stdID=$_POST['studentId'];
	$stdFName=$_POST['stdFName'];
	$stdLName=$_POST['stdLName'];
	$stdStreetNo=$_POST['stdStreetNo'];
	$stdStreet=$_POST['stdStreet'];
	$stdCity=$_POST['stdCity'];
	$stdState=$_POST['stdState'];

	$stdinsquery="INSERT INTO students(stdID, stdFName, stdLName, stdStreetNo, stdStreet, stdCity) VALUES ('$stdID','$stdFName','$stdLName','$stdStreetNo','$stdStreet','$stdCity')";

	$stdins=mysqli_query($connection,$stdinsquery);

	if ($stdState==1) {
		$statequery = "INSERT INTO undergraduate(stdID) VALUES ('$stdID')";
		$stateins=mysqli_query($connection,$statequery);
	} elseif ($stdState==2) {
		$statequery = "INSERT INTO graduate(stdID) VALUES ('$stdID')";
		$stateins=mysqli_query($connection,$statequery);
	}

	if($stdins){
		header("location: ./students.php");
	}else{
		echo "<script>alert('submition Failed')</script>";
	}
}

require_once('layout/header.php'); 

?>

	<!-- Sub Page -->
	<div class="container sub-page border-default">

		<div class="sub-page-box">
			<div class="container sub-page-title text-center border-default"> STUDENTS </div>
		</div>

		<div class="sub-page-box">
			<button class="sub-page-btn border-default" onclick="show_div('add_student_form')"> Add a New Student </button>
		</div>

		<div class="sub-page-box">
			<table class="container sub-page-table text-center">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Student State</th>
					<th>Actions</th>
				</tr>

				<!-- Show Student Table Data -->
				<?php
					$row="";
					if(mysqli_num_rows($stdcon)>0){
						while($student=mysqli_fetch_assoc($stdcon)){
							$state="";
							if($student['UGR']!="" && $student['GR']==""){
								$state="Undergraduate";
							} elseif ($student['UGR']=="" && $student['GR']!="") {
								$state="Graduate";
							} else {
								$state="Not Mentioned";
							}
							$id=$student['stdID'];
							$row=$row."<tr>
							<td>$student[stdID]</td>
							<td>$student[stdFName] $student[stdLName]</td>
							<td>$student[stdStreetNo] , $student[stdStreet] , $student[stdCity]</td>
							<td>$state</td>
							<td>
								<a href='queryboxes/student.php?id=$id' target='new'><button class='table-btn'>EDIT</button></a>
								<a href='./queryboxes/delete.php?student=$student[stdID]'><button class='table-btn'>DELETE</button></a>
							</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>
	</div>

	<!-- Student Add Form  -->
	<div class="container sub-page border-default" style="display:none;" id="add_student_form">
        <form action="students.php" autocomplete="on" method="POST">
            <!-- Student ID -->
            <input type="text" name="studentId" class="container inputs border-default" placeholder="Student ID" required/>
            
            <!-- First Name -->
            <input type="text" name="stdFName" class="container inputs border-default" placeholder="First Name" required/>

            <!-- Last Name -->
            <input type="text" name="stdLName" class="container inputs border-default" placeholder="Last Name" required/>

            <!-- Street No -->
            <input type="text" name="stdStreetNo" class="container inputs border-default" placeholder="Street No" required/>
            
            <!-- Street -->
            <input type="text" name="stdStreet" class="container inputs border-default" placeholder="Street" required/>

            <!-- City -->
            <input type="text" name="stdCity" class="container inputs border-default" placeholder="City" required/>

            <!-- State -->
            <select name="stdState" class="container select border-default" required>
            	<option selected disabled>Select Student State</option>
            	<option value=1>Undergraduate</option>
            	<option value=2>Graduate</option>
            </select>
           
            <!-- submit Button -->
            <button name="add_student" type="submit" class="container btn">Add Student</button>
            <!-- cancel Button -->
            <button name="add_student_cancel" onclick="hide_div('add_student_form')" class="container btn">Cancel</button>
	  	</form>
    </div>

</body>

</html>