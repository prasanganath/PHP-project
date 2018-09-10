<?php

$usertype=$_SESSION['usertype'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>University Management System</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/subpage.css">
	<link rel="stylesheet" type="text/css" href="../css/input.css">
	<style type="text/css">
		.sub-page-table th,td {
			width: 16.5%;
		}
	</style>
	<script type="text/javascript" src="../js/show_div.js"></script>
</head>

<body>

	<div class="container page border-default">

		<!-- Title Box -->
		<div class="container title-box border-default">
			<div class="title left">UNIVERSITY SYSTEM</div>
			<div class="logview-box right">
				<!-- Logged user view and logout button -->
				<?php
				echo "<div class='logview-label text-center'> LOGGED AS ";
				if($_SESSION["usertype"]==1){
					echo "ADMIN"; 
				} elseif ($_SESSION["usertype"]==2) {
					echo "STUDENT";
				}else{
					echo "LIBRARIAN";
				}
				echo" </div>";
				echo "<a href='logout.php'><div class='logview-btn text-center'> LOG OUT </div></a>";
				?>				
			</div>
		</div>

		<!-- Navigation Panel -->
		<div class="container nav-panel border-default">
			<!-- Check the Usertype and Rebuild the Navigation Menu -->
			<?php 

				//Admin Menu
				if ($usertype==1){
					echo "<a href='./departments.php' class='nav-item-leftmost text-center'> DEPARTMENTS </a>";
					echo "<a href='./students.php' class='nav-item text-center'> STUDENTS </a>";
					echo "<a href='./locations.php' class='nav-item text-center'> LOCATIONS </a>";
					echo "<a href='./courses.php' class='nav-item text-center'> COURSES </a>";
					echo "<a href='./professors.php' class='nav-item text-center'> PROFESSORS </a>";
					echo "<a href='./company_sessions.php' class='nav-item text-center' > COMPANY </a>";
					echo "<a href='./bookmenu.php' class='nav-item text-center'> BOOKS </a>";
					echo "<a href='./lab_sessions.php' class='nav-item-rightmost text-center'> LAB SESSIONS </a>";
				}
				//Student Menu
				elseif($usertype==2){
					echo "<a href='./courses.php' class='nav-item text-center'> COURSES </a>";
					echo "<a href='./studentbooks.php' class='nav-item text-center'> BOOKS </a>";
					echo "<a href='./lab_sessions.php' class='nav-item-rightmost text-center'> LAB SESSIONS </a>";
				}
				//Librarian Menu
				else{
					echo "<a href='./bookmenu.php' class='nav-item text-center'> BOOKS </a>";
				}
			?>	

		</div>