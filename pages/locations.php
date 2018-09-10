<?php

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}elseif($_SESSION['usertype']!=1){
	header("location: ../index.php");
}


// -----------------SELECT Quaries----------------------------//

$locationquery="SELECT * FROM location;";

$locationcon=mysqli_query($connection,$locationquery);

// -----------------INSERT Quaries----------------------------//

if(isset($_POST['add_location'])){

	$locID=$_POST['locID'];
	$locStreet=$_POST['locStreet'];
	$locStreetNo=$_POST['locStreetNo'];
	$locCity=$_POST['locCity'];

	$locationsquery="INSERT INTO location VALUES ('$locID','$locStreet','$locStreetNo','$locCity')";
	//echo $locationsquery;
	$locationins=mysqli_query($connection,$locationsquery);

	if($locationins){
		header("location: ./locations.php");
	}else{
		echo "<script>alert('submition Failed')</script>";
	}
}

require_once('layout/header.php'); 

?>

	<!-- Sub Page -->
	<div class="container sub-page border-default">

		<div class="sub-page-box">
			<div class="container sub-page-title text-center border-default"> LOCATIONS </div>
		</div>

		<div class="sub-page-box">
			<button class="sub-page-btn border-default" onclick="show_div('add_location_form')"> Add a New Location </button>
			<button class="sub-page-btn border-default" onclick="show_div('delete_location_form')"> Delete a Location </button>
		</div>

		<div class="sub-page-box">
			<table class="container sub-page-table text-center">
				<tr>
					<th>ID</th>
					<th>Street</th>
					<th>Street No</th>
					<th>City</th>
				</tr>

				<!-- Show Student Table Data -->
				<?php
					$row="";
					if(mysqli_num_rows($locationcon)>0){
						while($location=mysqli_fetch_assoc($locationcon)){
							
							$id=$location['locationID'];
							$row=$row."<tr>
							<td>$location[locationID]</td>
							<td>$location[locStreet]</td>
							<td>$location[locStreeNo]</td>
							<td>$location[locCity]</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>
	</div>

	<!-- Location Add Form  -->
	<div class="container sub-page border-default" style="display:none;" id="add_location_form">
        <form action="locations.php" autocomplete="on" method="POST">
            <!-- Location ID -->
            <input type="text" name="locID" class="container inputs border-default" placeholder="Location ID" required/>
            
            <!-- Street Name -->
            <input type="text" name="locStreet" class="container inputs border-default" placeholder="Street Name" required/>

            <!-- Street Number -->
            <input type="text" name="locStreetNo" class="container inputs border-default" placeholder="City" required/>

            <!-- Street No -->
            <input type="text" name="locCity" class="container inputs border-default" placeholder="Street No" required/>
           
            <!-- submit Button -->
            <button name="add_location" type="submit" class="container btn">Add Location</button>
            <!-- cancel Button -->
            <button name="add_location_cancel" onclick="hide_div('add_location_form')" class="container btn">Cancel</button>
	  	</form>
    </div>

    <!-- Location Delete Form  -->
	<div class="container sub-page border-default" style="display:none;" id="delete_location_form">
        <form action="queryboxes/delete.php" autocomplete="on" method="GET">
            <!-- Location ID -->
            <input type="text" name="locID" class="container inputs border-default" placeholder="Location ID" required/>
                       
            <!-- delete Button -->
            <button name="delete_location" type="submit" class="container btn">Delete Location</button>
            <!-- cancel Button -->
            <button name="add_location_cancel" onclick="hide_div('delete_location_form')" class="container btn">Cancel</button>
	  	</form>
    </div>

</body>

</html>