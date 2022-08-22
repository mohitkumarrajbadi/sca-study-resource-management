<?php
	ob_start();
	include 'connectdb.php';
	if (isset($_POST['submit'])) {
			$password = $_POST['password_again'];
			$password = trim($password);
			$aid = $_POST['aid'];
			$column_name = "PASSWORD";  
 			$sql = 'UPDATE admin SET PASSWORD= "'.$password.'" WHERE AID='.$aid;   
			 if(mysqli_query($conn, $sql))  
			 {  
			      header("location: admin_success_email_reset.php?aid=".$aid."&success=1&change=1");
			      exit();
			 }  else{
			 		header("location: admin_success_email_reset.php?aid=".$aid."&error=1");
			 		exit();
			 }
	}

?>