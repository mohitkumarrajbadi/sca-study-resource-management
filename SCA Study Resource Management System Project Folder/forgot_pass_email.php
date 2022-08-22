
<?php
		
	ob_start();

	$to = $email;
	$subject = "Reset Password";

	$message = "
	<html>
	<head>
	<title>Password Reset Email</title>
	</head>
	<body>
	<p>Hi , <b>".$name."</b></p>
	<p>Your request for password reset in under procees click the link to proceed :</p>
	<a href=".$actual_link.">".$actual_link."</a>
	<p>Thank You </p>
	<p>Admin</p>
	<p>SCA Study Resource</p>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <admin@scaresource.com>' . "\r\n";
	$headers .= 'Cc: admin@scaresource.com' . "\r\n";

	$uri = $_SERVER['REQUEST_URI'];

	if(mail($to,$subject,$message,$headers)){					
				header("location: student_forgot_password.php?success=1");
				exit();
		}else{
			header("location: student_forgot_password.php?error=1");
			exit();
		}

?>