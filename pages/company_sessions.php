<?php

session_start();

if(!isset($_SESSION['usertype'])){
    header("location: ./login.php");
}elseif($_SESSION['usertype']==2){
    header("location: ../index.php");
}

if (isset($_POST['add_company_session'])) {
	
	require_once('../inc/config.php');

	$comSesName=$_POST['comSesName'];
    $sesYear=$_POST['sesYear'];
    $sesSem=$_POST['sesSem'];
    $comSesAssesment=$_POST['comSesAssesment'];
    $comSesManager=$_POST['comSesManager'];
    
    $query="INSERT INTO companysession VALUES('$comSesName','$sesYear','$sesSem','$comSesAssesment','$comSesManager')";
    echo $query;
    $userquery=mysqli_query($connection,$query);
    
    if($userquery){
        echo "<script>alert('Company session added successfully!')</script>";
        header("location: company_sessions.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}
if (isset($_POST['add_company_session_manager'])) {
	
	require_once('../inc/config.php');
	$empID=$_POST['empID'];
    $sesYear=$_POST['sesYear'];
    $sesSem=$_POST['sesSem'];
    $empFName=$_POST['empFName'];
    $empLName=$_POST['empLName'];
    
    $query="INSERT INTO company_sess_manager VALUES('$empID','$empFName','$empLName','$sesYear','$sesSem')";
    echo $query;
    $userquery=mysqli_query($connection,$query);
    
    if($userquery){
        echo "<script>alert('Company session manager added successfully!')</script>";
        header("location: company_sessions.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}
require_once('layout/header.php'); 

?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> COMPANY SESSIONS </div>
			</div>

			<div class="sub-page-box">
                <div class="sub-page-box">
				    <button class="sub-page-btn border-default" onclick="show_div('hidden_div')"> Add a New Company Session </button>
                    <button name="delete_company_session" class="sub-page-btn border-default" onclick="show_div('hidden_delete_div')">Delete Company Session </button>
			     </div>
                <div class="sub-page-box" style="display:none" id="hidden_delete_div">
                <form action="./queryboxes/delete.php" autocomplete="on" method="GET">
                
                    <!-- Input for Company Session Name -->
                    <input type="text" name="comSesName" class="container inputs border-default" placeholder="Company Session Name" required/>

                    <!-- Input for Section Year -->
                    <input type="text" name="sesYear" class="container inputs border-default" placeholder="Section Year" required/>

                    <!-- Input for Section Semester -->
                    <input type="text" name="sesSem" class="container inputs border-default" placeholder="Section Semester" required/>
                    
                    <!-- delete Button -->
                    <button name="delete_company_session" class="container btn">Delete Company Session</button>
                    <!-- cancel Button -->
                    <button onclick="hide_div('hidden_delete_div')" class="container btn">Cancel</button>
		      </form>
            </div>
				<table class="container sub-page-table text-center">
					<tr>
                        <th>Company Session Name</th>
						<th>Section Year</th>
						<th>Section Semester</th>
                        <th>Company Session Assesment</th>
						<th>Company Session Manager ID</th>
					</tr>
					   <?php
                            require_once('../inc/config.php');
                            $query="SELECT * FROM companysession";
                    $userquery=mysqli_query($connection,$query);
                        if(mysqli_num_rows($userquery)>0){
                            while($row=mysqli_fetch_assoc($userquery)){
                                    echo "<tr><td>".$row['comSesName']."</td>";
                                    echo "<td>".$row['sesYear']."</td>";
                                    echo "<td>".$row['sesSem']."</td>";
                                    echo "<td>".$row['comSesAssesment']."</td>";
                                    echo "<td>".$row['comSesManager']."</td></tr>";
                                }                            
                            }
                        ?>
				</table>
			</div>
            <div class="sub-page-box">
                <div class="sub-page-box">
				    <button class="sub-page-btn border-default" onclick="show_div('hidden_div2')"> Add a New Comany Session Manager </button>
                    <button name="delete_company_session_manager" class="sub-page-btn border-default" onclick="show_div('hidden_delete_div2')">Delete Company Session Manager</button>
			     </div>
                <div class="sub-page-box" style="display:none" id="hidden_delete_div2">
                <form action="./queryboxes/delete.php" autocomplete="on" method="GET">
                
                    <!-- Input for Company Session Manager ID -->
                    <input type="text" name="empID" class="container inputs border-default" placeholder="Company Session Manager ID" required/>
                    
                    <!-- delete Button -->
                    <button name="delete_company_session_manager" class="container btn">Delete Company Session Manager</button>
                    <!-- cancel Button -->
                    <button onclick="hide_div('hidden_delete_div2')" class="container btn">Cancel</button>
		      </form>
            </div>
				<table class="container sub-page-table text-center">
					<tr>
                        <th>Company Session Manager</th>
						<th>First Name</th>
						<th>Last Name</th>
                        <th>Section Year</th>
						<th>Section Semester</th>
					</tr>
					
                        <?php
                            require_once('../inc/config.php');
                            $query="SELECT * FROM company_sess_manager";
                    $userquery=mysqli_query($connection,$query);
                        if(mysqli_num_rows($userquery)>0){
                            while($row=mysqli_fetch_assoc($userquery)){
                                
                                    echo "<tr><td>".$row['empID']."</td>";
                                    echo "<td>".$row['empFName']."</td>";
                                    echo "<td>".$row['empLName']."</td>";
                                    echo "<td>".$row['sesYear']."</td>";
                                    echo "<td>".$row['sesSem']."</td></tr>";
                                }                            
                            }
                        ?>
				</table>
			</div>

		</div>
        <div class="container sub-page border-default" style="display:none" id="hidden_div">
            <form action="company_sessions.php" autocomplete="on" method="POST">
                
                <!-- Input for Company Session Name -->
                <input type="text" name="comSesName" class="container inputs border-default" placeholder="Company Session Name" required/>
                
                <!-- Input for Section Year -->
                <input type="text" name="sesYear" class="container inputs border-default" placeholder="Section Year" required/>

                <!-- Input for Section Semester -->
                <input type="text" name="sesSem" class="container inputs border-default" placeholder="Section Semester" required/>

                <!-- Input for Company Session Assesment -->
                <input type="text" name="comSesAssesment" class="container inputs border-default" placeholder="Company Session Assesment" required/>

                <!-- Input for Company Session Manager -->
                <input type="text" name="comSesManager" class="container inputs border-default" placeholder="Company Session Manager" required/>


                <!-- submit Button -->
                <button name="add_company_session" class="container btn">Add Company Session</button>
                <!-- cancel Button -->
                <button onclick="hide_div('hidden_div')" class="container btn">Cancel</button>
		  </form>
        </div>
        <div class="container sub-page border-default" style="display:none" id="hidden_div2">
            <form action="company_sessions.php" autocomplete="on" method="POST">
                
                <!-- Input for Company Session Manager ID -->
                <input type="text" name="empID" class="container inputs border-default" placeholder="Company Session Manager ID" required/>
                
                 <!-- Input for Company Session Manager First Name -->
                <input type="text" name="empFName" class="container inputs border-default" placeholder="Company Session Manager First Name" required/>

                <!-- Input for Company Session Manager Last Name -->
                <input type="text" name="empLName" class="container inputs border-default" placeholder="Company Session Manager Last Name" required/>

                <!-- Input for Section Year -->
                <input type="text" name="sesYear" class="container inputs border-default" placeholder="Section Year" required/>

                <!-- Input for Section Semester -->
                <input type="text" name="sesSem" class="container inputs border-default" placeholder="Section Semester" required/>

                <!-- submit Button -->
                <button name="add_company_session_manager" class="container btn">Add Company Session Manager</button>
                <!-- cancel Button -->
                <button onclick="document.getElementById('hidden_div2').style.display='none'" class="container btn">Cancel</button>
                
		  </form>
        </div>
	</div>

</body>

</html>