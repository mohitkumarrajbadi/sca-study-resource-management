<?php

ob_start();
	include 'connectdb.php';

	$email = trim($_POST['email']);

	$sql = 'SELECT * FROM FACULTY WHERE EMAIL = "'.$email.'"';
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	   $fid = $row["FID"];
        $name = $row["FIRSTNAME"];
       	$actual_link = "http://$_SERVER[HTTP_HOST]/$_SERVER[REQUEST_URI]/"."faculty_success_email_reset.php?fid=" . $fid;
       	$actual_link = str_replace('reset_faculty_password.php/', '', $actual_link);
       	include 'faculty_forgot_mail.php';
    }
} else {
    header("location: faculty_forgot_password.php?error=1");
    exit();
}

ob_end_flush();

?>