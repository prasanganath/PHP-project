<?php
	
session_start();

if(isset($_SESSION['usertype'])) {
	header("location: ../index.php");
}
elseif (isset($_POST['login'])) {
	
	require_once('../inc/config.php');

	$username=$_POST['userName'];
    $password=$_POST['password'];

    $password=md5($password);

    $query="SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";

    $userquery=mysqli_query($connection,$query);

    if(mysqli_num_rows($userquery)>0){
        $userlogin = mysqli_fetch_array($userquery,MYSQLI_ASSOC);
        $_SESSION['usertype']=$userlogin["type"];
        $_SESSION['userid']=$userlogin["user_id"];

        if($userlogin["type"]==1){
            header("location: ../index.php");
        }elseif($userlogin["type"]==3){
            header("location: ../pages/bookmenu.php");
        }

    }else{
        echo "<script>alert('username or email invalied!')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>

	<div class="container page border-default">

		<!-- Title Box -->
		<div class="container title-box border-default">
			<div class="title text-center">LOGIN</div>
		</div>

		<form action="login.php" autocomplete="on" method="POST">
			<!-- Input for User Name -->
			<input type="text" name="userName" class="container inputs border-default" placeholder="User Name" required/>

			<!-- Input for Password -->
			<input type="password" name="password" class="container inputs border-default" placeholder="Password" required />

			<!-- Login Button -->
			<button name="login" class="container btn"> Log In </button>
		</form>
	</div>

</body>

</html>