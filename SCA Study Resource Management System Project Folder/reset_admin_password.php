<?php
ob_start();
	include 'connectdb.php';

	$email = trim($_POST['email']);

	$sql = 'SELECT * FROM admin WHERE EMAIL = "'.$email.'"';
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	   $aid = $row["AID"];
        $name = $row["FIRSTNAME"];
       	$actual_link = "http://$_SERVER[HTTP_HOST]/$_SERVER[REQUEST_URI]/"."admin_success_email_reset.php?aid=" . $aid;
       	$actual_link = str_replace('reset_admin_password.php/', '', $actual_link);
       	include 'admin_forgot_mail.php';
    }
} else {
    header("location: admin_forgot_password.php?error=1");
    exit();
}

ob_end_flush();

?>