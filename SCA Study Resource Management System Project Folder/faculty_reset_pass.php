<?php
		
	ob_start();	

	include 'connectdb.php';
	if (isset($_POST['submit'])) {
			$password = $_POST['password_again'];
			$password = trim($password);
			$fid = $_POST['fid'];
			$column_name = "PASSWORD";  
 			$sql = 'UPDATE faculty SET PASSWORD= "'.$password.'" WHERE FID='.$fid;   
 			echo $password;
			 if(mysqli_query($conn, $sql))  
			 {  
			      header("location: faculty_success_email_reset.php?fid=".$fid."&success=1&change=1");
			      exit();
			 }  else{
			 		header("location: faculty_success_email_reset.php?fid=".$fid."&error=1");
			 		exit();
			 }
	}



?>