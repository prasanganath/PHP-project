<?php

session_start();

require_once('../../inc/config.php');

// Check if Valied Edit Request
if(isset($_GET['id'])){
      $id=$_GET['id'];
      // Select Query
      $selectquery="SELECT * FROM professors WHERE profID=$id";
      //echo $selectquery;
      $selectq=mysqli_query($connection,$selectquery);
      $select=mysqli_fetch_assoc($selectq);
}else{
      header("location: ../professors.php");
}

// Check if Form is Submitted
if (isset($_POST['edit_professor'])) {
     $profid=$_GET['id'];
     $profFname=$_POST['profFName'];
     $profLname=$_POST['profLName'];
     $profContact=$_POST['profContact'];
     $profEmail=$_POST['profEmail'];
     $departmentId=$_POST['depID'];

     $updatequery="UPDATE professors SET profFName='$profFname', profLName='$profLname', profContact='$profContact',  profEmail='$profEmail', depID='$departmentId' WHERE profID='$profid'";
     //echo $updatequery;
     $upcon=mysqli_query($connection,$updatequery);
     if($upcon){
        echo "<script>alert('Update Successfull');</script>";
     }else{
        echo "<script>alert('Update Failed');</script>";
     }
     echo "<script>window.close();</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Professors</title>
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../css/subpage.css">
    <link rel="stylesheet" type="text/css" href="../../css/input.css">
</head>
<body>
	<div class="sub-page-box">
        <div class="container sub-page-title text-center border-default"> PROFESSORS </div>
	</div>
	<div class="container sub-page border-default" id="hidden_div">
            <form action="" autocomplete="on" method="POST">
                
                <!-- Input for Professor ID -->
                <input type="text" name="profID" class="container inputs border-default" placeholder="Professor ID" value="<?php echo $select['profID'];?>" required/>
                
                <!-- Input for Professor First Name -->
                <input type="text" name="profFName" class="container inputs border-default" placeholder="Professor First Name" value="<?php echo $select['profFName'];?>" required/>

                <!-- Input for Professor Last Name -->
                <input type="text" name="profLName" class="container inputs border-default" placeholder="Professor Last Name" value="<?php echo $select['profLName'];?>" required/>

                <!-- Input for Professor Contact -->
                <input type="text" name="profContact" class="container inputs border-default" placeholder="Professor Contact" value="<?php echo $select['profContact'];?>" required/>

                <!-- Input for Professor Email -->
                <input type="text" name="profEmail" class="container inputs border-default" placeholder="Professor Email" value="<?php echo $select['profEmail'];?>" required/>

                <!-- Input for Department ID -->
                <input type="text" name="depID" class="container inputs border-default" placeholder="Department ID" value="<?php echo $select['depID'];?>" required/>

                <!-- submit Button -->
                <button name="edit_professor" class="container btn">Edit Professor</button>
          </form>
        </div>
</body>
</html>