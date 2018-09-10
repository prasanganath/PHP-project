<?php

session_start();

if(!isset($_SESSION['usertype'])){
    header("location: ./login.php");
}elseif($_SESSION['usertype']==2){
    header("location: ../index.php");
}

 require_once('layout/header.php'); 

?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default">
                    <a href="books.php">All Books </a>
                </div>
			</div>
            <div class="sub-page-box">
                <div class="container sub-page-title text-center border-default">
                    <a href="studentbooks.php">Student Borrowing </a>
                </div>
            </div>
            <div class="sub-page-box">
                <div class="container sub-page-title text-center border-default">
                    <a href="teachingbooks.php">Teaching Books </a>
                </div>
            </div>			
		</div>

    </div>

	</div>

</body>

</html>