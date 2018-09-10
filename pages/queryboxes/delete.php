<?php 

require_once('../../inc/config.php');

if(isset($_GET['student'])){
	$student=$_GET['student'];
	$deleq="DELETE FROM students WHERE stdID=$student";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../students.php");
} elseif (isset($_GET['course'])) {
	$course=$_GET['course'];
	$deleq="DELETE FROM courses WHERE courseID=$course";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../courses.php");
}elseif(isset($_GET['delete_book'])){
	$bookID=$_GET['bookID'];
	$deleq="DELETE FROM book WHERE bookID=$bookID";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../books.php");
}elseif(isset($_GET['delete_lab_session'])){
	$courseID=$_GET['courseID'];
    $secSem=$_GET['secSem'];
    $secYear=$_GET['secYear'];
    $secNo=$_GET['secNo'];
    $labSessionNo=$_GET['labSessionNo'];
	$deleq="DELETE FROM labsession WHERE courseID='$courseID' AND secSem='$secSem' AND secYear='$secYear' AND secNo='$secNo'AND labSessionNo='$labSessionNo'";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../lab_sessions.php");
}elseif(isset($_GET['delete_company_session'])){
	echo "<script>alert('FDSD')</script>";
	$comSesName=$_GET['comSesName'];
    $secYear=$_GET['secYear'];
    $sesSem=$_GET['sesSem'];
	$deleq="DELETE FROM companysession WHERE comSesName='$comSesName' AND sesYear='$secYear' AND sesSem='$sesSem'";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../company_sessions.php");
}elseif(isset($_GET['delete_company_session_manager'])){
	$empID=$_GET['empID'];
	$deleq="DELETE FROM company_sess_manager WHERE empID='$empID'";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../company_sessions.php");
}
elseif(isset($_GET['delete_location'])){
	$locID=$_GET['locID'];
	$deleq="DELETE FROM location WHERE locationID='$locID'";
	$delq=mysqli_query($connection, $deleq);
	//echo $deleq;
	header("location: ../locations.php");
}