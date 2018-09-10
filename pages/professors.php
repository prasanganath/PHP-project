<?php

session_start();

if(!isset($_SESSION['usertype'])){
    header("location: ./login.php");
}elseif($_SESSION['usertype']==2){
    header("location: ../index.php");
}

if (isset($_POST['add_professor'])) {
	
	require_once('../inc/config.php');

	$profID=$_POST['profID'];
    $profFName=$_POST['profFName'];
    $profLName=$_POST['profLName'];
    $profContact=$_POST['profContact'];
    $profEmail=$_POST['profEmail'];
    $depID=$_POST['depID'];
    
    $query="INSERT INTO professors VALUES('$profID','$profFName','$profLName','$profContact','$profEmail','$depID')";

    $userquery=mysqli_query($connection,$query);
    
    if($userquery){
        echo "<script>alert('Professor added successfully!')</script>";
        header("location: professors.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}
 require_once('layout/header.php'); 

?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> PROFESSORS </div>
			</div>

			<div class="sub-page-box">
				<button class="sub-page-btn border-default" onclick="show_div('hidden_div')"> Add a New Professor </button>
                
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
                        <th>Professor ID</th>
						<th>Professor First Name</th>
						<th>Professor Last Name</th>
                        <th>Professor Contact</th>
						<th>Professor Email</th>
                        <th>Department ID</th>
                        <th>Edit</th>
					</tr>
					
                        <?php
                            require_once('../inc/config.php');
                            $query="SELECT * FROM professors";
                    $userquery=mysqli_query($connection,$query);
                        if(mysqli_num_rows($userquery)>0){
                            while($row=mysqli_fetch_assoc($userquery)){
                                $id=$row['profID'];
                                    echo "<tr><td>".$row['profID']."</td>";
                                    echo "<td>".$row['profFName']."</td>";
                                    echo "<td>".$row['profLName']."</td>";
                                    echo "<td>".$row['profContact']."</td>";
                                    echo "<td>".$row['profEmail']."</td>";
                                    echo "<td>".$row['depID']."</td>";
                                    echo "<td><a href='./queryboxes/professor.php?id=$id'><button>Edit Professor </button></a></td></tr>";
                                    
                                }                            
                            }
                    
                        ?>
				</table>
			</div>
		</div>
        <div class="container sub-page border-default" style="display:none" id="hidden_div">
            <form action="professors.php" autocomplete="on" method="POST">
                
                <!-- Input for Professor ID -->
                <input type="text" name="profID" class="container inputs border-default" placeholder="Professor ID" required/>
                
                <!-- Input for Professor First Name -->
                <input type="text" name="profFName" class="container inputs border-default" placeholder="Professor First Name" required/>

                <!-- Input for Professor Last Name -->
                <input type="text" name="profLName" class="container inputs border-default" placeholder="Professor Last Name" required/>

                <!-- Input for Professor Contact -->
                <input type="text" name="profContact" class="container inputs border-default" placeholder="Professor Contact" required/>

                <!-- Input for Professor Email -->
                <input type="text" name="profEmail" class="container inputs border-default" placeholder="Professor Email" required/>

                <!-- Input for Department ID -->
                <input type="text" name="depID" class="container inputs border-default" placeholder="Department ID" required/>

                <!-- submit Button -->
                <button name="add_professor" class="container btn">Add Professor</button>
                <!-- cancel Button -->
                <button onclick="hide_div()" class="container btn">Cancel</button>
		  </form>
        </div>
	</div>
</body>
</html>