<?php 

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}elseif($_SESSION['usertype']!=1){
	header("location: ../index.php");
}

// -----------------SELECT Quaries----------------------------//

//----course details-------//
$coursequery="SELECT courseID,depID,courseName,courseCredits,courseHours FROM courses";
$courseselect=mysqli_query($connection,$coursequery);

//---get department ID---//
$depquery="SELECT depID FROM departments";
$depidselect=mysqli_query($connection,$depquery);

// -----------------Insert Quaries----------------------------//
if(isset($_POST['add_course'])){

	$courseID=$_POST['courseId'];
	$depID=$_POST['departmentId'];
	$courseName=$_POST['courseName'];
	$courseCredits=$_POST['courseCredits'];
	$courseHours=$_POST['courseHours'];
	$courseinsquery="INSERT INTO courses(courseID,depID,courseName,courseCredits,courseHours) VALUES ('$courseID','$depID','$courseName','$courseCredits','$courseHours')";
	$courseins=mysqli_query($connection,$courseinsquery);
	if($courseins){
		header("location: ./courses.php");
	}else{
		echo "<script>alert('submition Failed')</script>";
	}
}

require_once('layout/header.php'); 
?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> COURSES </div>
			</div>
			<?php
				if($_SESSION['usertype']==1){
					echo "
					<div class='sub-page-box'>
						<button class='sub-page-btn border-default'  onclick=\"show_div('add_course_form');\"> Add a New Course </button>
					</div>";
				}
			?>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
						<th>Course ID</th>
						<th>Department</th>
						<th>Course Name</th>
						<th>Course Credit</th>
						<th>Course Hours</th>
						<?php
							if($_SESSION['usertype']==1){
								echo "
								<th>Action</th>";
							}
						?>
						
					</tr>
					<?php
					$row="";
					if(mysqli_num_rows($courseselect)>0){
						while($course=mysqli_fetch_assoc($courseselect)){
							$row=$row."<tr>
							<td>$course[courseID]</td>
							<td>$course[depID]</td>
							<td>$course[courseName]</td>
							<td>$course[courseCredits]</td>
							<td>$course[courseHours]</td>
							<td>
								<a href='queryboxes/course.php?id=$course[courseID]' target='new'><button class='table-btn'>EDIT</button></a>
								<a href='./queryboxes/delete.php?course=$course[courseID]'>
								<button class='table-btn'>DELETE</button></a>
							</td>
							</tr>";
						}
						echo $row;
					}
				?>
				</table>
			</div>

		</div>

	<div class="container sub-page border-default" style="display:none" id="add_course_form">
        <form action="courses.php" autocomplete="on" method="POST">
            <!-- course ID -->
            <input type="text" name="courseId" class="container inputs border-default" placeholder="Course ID" required/>
            
            <!-- department ID -->
            <select name="departmentId" class="container select border-default" required>
            	<option selected disabled>Select Department ID</option>
            	<?php 
            		while ($departmentID=mysqli_fetch_assoc($depidselect)) {
            			$depID=$departmentID['depID'];
            			echo "<option>$depID</option>";
            		}
            	?>
            </select>

             <!-- course Name -->
            <input type="text" name="courseName" class="container inputs border-default" placeholder="Course Name" required/>

            <!-- course credits -->
            <input type="number" name="courseCredits" class="container inputs border-default" placeholder="Course Credits" required/>

            <!-- course hours -->
            <input type="number" name="courseHours" class="container inputs border-default" placeholder="Course Hours" required/>

            <!-- submit Button -->
            <button name="add_course" type="submit" class="container btn">Add Course</button>
            <!-- cancel Button -->
            <button name="add_course_cancel" onclick="hide_div('add_course_form')" class="container btn">Cancel</button>
	  	</form>
    </div>
</body>

</html>