<?php

ob_start();

	include 'connectdb.php';

	$email = trim($_POST['email']);

	$sql = 'SELECT * FROM students WHERE EMAIL = "'.$email.'" AND PERMISSION = 1';
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$rollno = $row["ROLLNO"];
        $name = $row["FIRSTNAME"];
       	$actual_link = "http://$_SERVER[HTTP_HOST]/$_SERVER[REQUEST_URI]/"."student_success_email_reset.php?rollno=" . $rollno;
       	$actual_link = str_replace('reset_student_password.php/', '', $actual_link);
       	include 'forgot_pass_email.php';
    }
} else {
    header("location: student_forgot_password.php?error=1");
    exit();
}


?>