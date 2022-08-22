<?php
	session_start();

	unset($_SESSION['adminemail']);
	unset($_SESSION['adminpassword']);
	unset($_SESSION['aid']);
	
	header("location: adminlogin.php")

?>