<?php

session_start();

require_once('../../inc/config.php');

// Check if Valied Edit Request
if(isset($_GET['id'])){
      $id=$_GET['id'];
      // Select Query
      $selectquery="SELECT * FROM courses WHERE courseID=$id";
      //echo $selectquery;
      $selectq=mysqli_query($connection,$selectquery);
      $select=mysqli_fetch_assoc($selectq);
}else{
      header("location: ../courses.php");
}

// Check if Form is Submitted
if (isset($_POST['edit_course'])) {
     $courseid=$_GET['id'];
     $depID=$_POST['departmentId'];
     $courseName=$_POST['courseName'];
     $courseCredits=$_POST['courseCredits'];
     $courseHours=$_POST['courseHours'];
     //$stdstate=$_POST['stdState'];

     $updatequery="UPDATE courses SET courseID='$courseid', depID='$depID', courseName='$courseName', courseCredits='$courseCredits', courseHours='$courseHours' WHERE courseID='$courseid'";
     //echo $updatequery;
     $upcon=mysqli_query($connection,$updatequery);
     if($upcon){
        echo "<script>alert('Update Successfull');</script>";
        header("location: ../courses.php");
     }else{
        echo "<script>alert('Update Failed');</script>";
     }
     echo "<script>window.close();</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Course</title>
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../css/subpage.css">
    <link rel="stylesheet" type="text/css" href="../../css/input.css">
</head>
<body>
	<div class="sub-page-box">
        <div class="container sub-page-title text-center border-default"> COURSES </div>
	</div>
	<div class="container sub-page border-default" id="add_course_form">
        <form action="" autocomplete="on" method="POST">
            <!-- course ID -->
            <input type="text" name="courseId" class="container inputs border-default" placeholder="Course ID" value="<?php echo $select['courseID'];?>" disabled required/>
            
            <!-- department ID -->
            <input type="text" name="departmentId" class="container inputs border-default" placeholder="Department ID" value="<?php echo $select['depID'];?>" required/>
            
             <!-- course Name -->
            <input type="text" name="courseName" class="container inputs border-default" placeholder="Course Name" value="<?php echo $select['courseName'];?>" required/>

            <!-- course credits -->
            <input type="number" name="courseCredits" class="container inputs border-default" placeholder="Course Credits" value="<?php echo $select['courseCredits'];?>" required/>

            <!-- course hours -->
            <input type="number" name="courseHours" class="container inputs border-default" placeholder="Course Hours" value="<?php echo $select['courseHours'];?>" required/>

            <!-- submit Button -->
            <button name="edit_course" type="submit" class="container btn">Edit Course</button>
	  	</form>
    </div>
</body>
</html>