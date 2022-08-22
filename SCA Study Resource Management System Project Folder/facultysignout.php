<?php

	session_start();
	
	ob_start();

	unset($_SESSION['femail']);
	unset($_SESSION['fpassword']);
	unset($_SESSION['fid']);

	header("location: facultylogin.php")
  

?>
