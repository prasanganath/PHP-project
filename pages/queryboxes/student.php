<?php

session_start();

require_once('../../inc/config.php');

// Check if Valied Edit Request
if(isset($_GET['id'])){
      $id=$_GET['id'];
      // Select Query
      $selectquery="SELECT * FROM students WHERE stdID=$id";
      //echo $selectquery;
      $selectq=mysqli_query($connection,$selectquery);
      $select=mysqli_fetch_assoc($selectq);
}else{
      header("location: ../students.php");
}

// Check if Form is Submitted
if (isset($_POST['edit_student'])) {
     $stdid=$_GET['id'];
     $stdfname=$_POST['stdFName'];
     $stdlname=$_POST['stdLName'];
     $stdstreetno=$_POST['stdStreetNo'];
     $stdstreet=$_POST['stdStreet'];
     $stdcity=$_POST['stdCity'];
     //$stdstate=$_POST['stdState'];

     $updatequery="UPDATE students SET stdID='$stdid', stdFName='$stdfname', stdLName='$stdlname', stdStreetNo='$stdstreetno', stdStreet='$stdstreet', stdCity='$stdcity' WHERE stdID='$stdid'";
     $upcon=mysqli_query($connection,$updatequery);
     if($upcon){
        echo "<script>alert('Update Successfull');</script>";
        header("location: ../students.php");
     }else{
        echo "<script>alert('Update Failed');</script>";
     }
     echo "<script>window.close();</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student</title>
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../css/subpage.css">
    <link rel="stylesheet" type="text/css" href="../../css/input.css">
</head>
<body>

<div class="sub-page-box">
                  <div class="container sub-page-title text-center border-default"> STUDENTS </div>
</div>

<div class="container sub-page border-default" id="add_student_form">
        <form action="" autocomplete="on" method="POST">
            <!-- Student ID -->
            <input type="text" name="studentId" class="container inputs border-default" placeholder="Student ID" value="<?php echo $select['stdID'];?>" required/>
            
            <!-- First Name -->
            <input type="text" name="stdFName" class="container inputs border-default" placeholder="First Name" value="<?php echo $select['stdFName'];?>"  required/>

            <!-- Last Name -->
            <input type="text" name="stdLName" class="container inputs border-default" placeholder="Last Name" value="<?php echo $select['stdLName'];?>" required/>

            <!-- Street No -->
            <input type="text" name="stdStreetNo" class="container inputs border-default" placeholder="Street No" value="<?php echo $select['stdStreetNo'];?>" required/>
            
            <!-- Street -->
            <input type="text" name="stdStreet" class="container inputs border-default" value="<?php echo $select['stdStreet'];?>" placeholder="Street" required/>

            <!-- City -->
            <input type="text" name="stdCity" class="container inputs border-default" value="<?php echo $select['stdCity'];?>" placeholder="City" required/>

            <!-- State -->
            <select name="stdState" class="container select border-default" disabled required>
            	<option selected disabled>Select Student State</option>
            	<option value=1>Undergraduate</option>
            	<option value=2>Graduate</option>
            </select>
           
            <!-- submit Button -->
            <button name="edit_student" type="submit" class="container btn">Edit Student</button>
        
	  	</form>
    </div>


</body>
</html>