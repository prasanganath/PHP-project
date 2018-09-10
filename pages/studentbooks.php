<?php

session_start();

if(!isset($_SESSION['usertype'])){
    header("location: ./login.php");
}

if(isset($_SESSION['usertype'])){
    $usertype=$_SESSION['usertype'];
    $userid=$_SESSION['userid'];
    if($usertype==2){
        $query="SELECT * FROM stud_book_borrow WHERE stdID=$userid";
    }else{
        $query="SELECT * FROM stud_book_borrow ORDER BY issuedDate ASC";
    }
}
if (isset($_POST['add_book_borrow'])) {
	
	require_once('../inc/config.php');

	$stdID=$_POST['stdID'];
    $bookID=$_POST['bookID'];
    $issuedDate=$_POST['issuedDate'];
    $returnedDate=$_POST['returnedDate'];
    
    $query2="INSERT INTO stud_book_borrow VALUES('$stdID','$bookID','$issuedDate','$returnedDate')";

    $userquery2=mysqli_query($connection,$query2);
    // echo "hello";
    if($userquery2){
        echo "<script>alert('Book Borrow Details added successfully!')</script>";
        header("location: studentbooks.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}

 require_once('layout/header.php'); 

?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> STUDENT BOOKS </div>
			</div>

			<div class="sub-page-box">
				<button name="add_book_borrow" class="sub-page-btn border-default" onclick="show_div('hidden_div')"> Add Book Borrowing Details </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					
					
                        <?php
                            require_once('../inc/config.php');
                            $userquery=mysqli_query($connection,$query);
                            if($usertype==2){
                                echo "
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                ";

                                if(mysqli_num_rows($userquery)>0){
                                    while($row=mysqli_fetch_assoc($userquery)){
                                        // Get Book Info
                                        $bookid=$row['bookID'];
                                        $bookquery="SELECT * FROM book WHERE bookID=$bookid LIMIT 1";
                                        $bookinfo=mysqli_query($connection, $bookquery);
                                        // echo $bookquery;
                                        $book=mysqli_fetch_assoc($bookinfo);

                                            echo "<tr><td>".$row['bookID']."</td>";
                                            echo "<td>".$book['bookTitle']."</td>";
                                            echo "<td>".$row['issuedDate']."</td>";
                                            echo "<td>".$row['returnedDate']."</td>";
                                    }                            
                                }
                            }else{
                                echo "
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Book ID</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                ";
                                
                                if(mysqli_num_rows($userquery)>0){
                                    while($row=mysqli_fetch_assoc($userquery)){
                                        // Get Book Info
                                        $bookid=$row['bookID'];
                                        $bookquery="SELECT * FROM book WHERE bookID=$bookid LIMIT 1";
                                        $bookinfo=mysqli_query($connection, $bookquery);
                                        // echo $bookquery;
                                        $book=mysqli_fetch_assoc($bookinfo);

                                            echo "<tr><td>".$row['stdID']."</td>";
                                            echo "<td>".$row['bookID']."</td>";
                                            echo "<td>".$book['bookTitle']."</td>";
                                            echo "<td>".$row['issuedDate']."</td>";
                                            echo "<td>".$row['returnedDate']."</td>";
                                    }                            
                                }
                            }
                        ?>
				</table>
			</div>
		</div>
        <div class="container sub-page border-default" style="display:none" id="hidden_div">
            <form action="studentbooks.php" autocomplete="on" method="POST">
                
                <!-- Input for Student ID -->
                <input type="text" name="stdID" class="container inputs border-default" placeholder="Student ID" required/>
                
                <!-- Input for Book ID -->
                <input type="text" name="bookID" class="container inputs border-default" placeholder="Book ID" required/>
                
                <!-- Input for Issued Date -->
                <input type="text" name="issuedDate" class="container inputs border-default" placeholder="Issued Date" required/>

                <!-- Input for Returned Date -->
                <input type="text" name="returnedDate" class="container inputs border-default" placeholder="Returned Date" required/>

                <!-- submit Button -->
                <button name="add_book_borrow" class="container btn">Add Book Borrow</button>
                <!-- cancel Button -->
                <button onclick="hide_div('hidden_div')" class="container btn">Cancel</button>
		  </form>
        </div>

        </div>

	</div>

</body>

</html>