<?php
ob_start();
include 'connectdb.php';
	if (isset($_POST['submit'])) {
			$password = $_POST['password_again'];
			$password = trim($password);
			$rollno = $_POST['rollno'];
			$column_name = "PASSWORD";  
 			$sql = 'UPDATE students SET PASSWORD= "'.$password.'" WHERE ROLLNO='.$rollno;   
 			echo $password;
			 if(mysqli_query($conn, $sql))  
			 {  
			      header("location: student_success_email_reset.php?rollno=".$rollno."&success=1&change=1");
			      exit();
			 }  else{
			 		header("location: student_success_email_reset.php?rollno=".$rollno."&error=1");
			 		exit();
			 }
	}

	ob_end_flush();
?>