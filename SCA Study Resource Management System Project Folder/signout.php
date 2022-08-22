<?php
	
	session_start();

	ob_start();
	
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['rollno']);

	header("location: index.php")


?>