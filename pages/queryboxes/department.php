<?php
session_start();

require_once('../../inc/config.php');

// Check if Valied Edit Request
if(isset($_GET['id'])){
      $id=$_GET['id'];
      // Select Query
      $selectquery="SELECT * FROM departments WHERE depID=$id";
      $selectq=mysqli_query($connection,$selectquery);
      $select=mysqli_fetch_assoc($selectq);
}else{
      header("location: ../departments.php");
}

// Check if Form is Submitted
if (isset($_POST['edit_department'])) {
     $depid=$_GET['id'];
     $depname=$_POST['departmentName'];
     $depcontact=$_POST['departmentContact'];
     $dephead=$_POST['departmentHead'];
     $deplocation=$_POST['departmentLocation'];

     $updatequery="UPDATE departments SET depName='$depname', depPhone='$depcontact', profID='$dephead', locationID='$deplocation' WHERE depID='$depid'";
     $upcon=mysqli_query($connection,$updatequery);
     if($upcon){
        echo "<script>alert('Update Successfull');</script>";
        header("location: ../departments.php");
     }else{
        echo "<script>alert('Update Failed');</script>";
     }
     echo "<script>window.close();</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
      <title>Edit Department</title>
      <link rel="stylesheet" type="text/css" href="../../css/main.css">
      <link rel="stylesheet" type="text/css" href="../../css/nav.css">
      <link rel="stylesheet" type="text/css" href="../../css/subpage.css">
      <link rel="stylesheet" type="text/css" href="../../css/input.css">
</head>
<body>

<div class="sub-page-box">
                  <div class="container sub-page-title text-center border-default"> DEPARTMENTS </div>
</div>

<div class="container sub-page border-default" id="add_department_form">
        <form action="" autocomplete="on" method="POST">
            <!-- Department ID -->
            <input type="text" name="departmentId" class="container inputs border-default" value=<?php echo $id; ?> required disabled/>
            
            <!-- Name -->
            <input type="text" name="departmentName" class="container inputs border-default" placeholder="Department Name" value="<?php echo $select['depName'];?>" required/>

            <!-- Contact -->
            <input type="text" name="departmentContact" class="container inputs border-default" placeholder="Contact Number" value="<?php echo $select['depPhone']; ?>" required/>

            <!-- Head -->
            <input type="text" name="departmentHead" class="container inputs border-default" placeholder="Contact Number" value="<?php echo $select['profID']; ?>" required/>

            <!-- Location -->
           <input type="text" name="departmentLocation" class="container inputs border-default" placeholder="Contact Number" value="<?php echo $select['locationID']; ?>" required/>
           
            <!-- submit Button -->
            <button name="edit_department" type="submit" class="container btn">Edit Department</button>
      </form>
    </div>

</body>
</html>