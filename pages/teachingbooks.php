<?php

session_start();

if(!isset($_SESSION['usertype'])){
    header("location: ./login.php");
}elseif($_SESSION['usertype']==2){
    header("location: ../index.php");
}

if (isset($_POST['addBook'])) {
	
	require_once('../inc/config.php');

	$bookID=$_POST['bookID'];
    $bookISBN=$_POST['bookISBN'];
    $bookYear=$_POST['bookYear'];
    $bookTitle=$_POST['bookTitle'];
    $bookPublisher=$_POST['bookPublisher'];
    $profID=$_POST['profID'];
    
    $query="INSERT INTO book VALUES('$bookID','$bookISBN','$bookYear','$bookTitle','$bookPublisher','$profID')";

    $userquery=mysqli_query($connection,$query);
    // echo "hello";
    if($userquery){
        echo "<script>alert('Book added successfully!')</script>";
        header("location: books.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}

 require_once('layout/header.php'); 

?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> TEACHING BOOKS </div>
			</div>

			<div class="sub-page-box">
				<button name="add_new_book" class="sub-page-btn border-default" onclick="show_div()"> Add a New Book </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
                        <th>Book ID</th>
						<th>Book ISBN</th>
						<th>Book Year</th>
                        <th>Book Title</th>
						<th>Book Publisher</th>
						<th>Book Co-Authoring Proffessor ID</th>
					</tr>
					
                        <?php
                            require_once('../inc/config.php');
                            $query="SELECT * FROM book";
                        $userquery=mysqli_query($connection,$query);
                        if(mysqli_num_rows($userquery)>0){
                            while($row=mysqli_fetch_assoc($userquery)){
                                    echo "<tr><td>".$row['bookID']."</td>";
                                    echo "<td>".$row['bookISBN']."</td>";
                                    echo "<td>".$row['bookYear']."</td>";
                                    echo "<td>".$row['bookTitle']."</td>";
                                    echo "<td>".$row['bookPublisher']."</td>";
                                    echo "<td>".$row['profID']."</td></tr>";
                                }                            
                            }
                        ?>
				</table>
			</div>
		</div>
        </div>

	</div>

</body>

</html>