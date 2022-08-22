<?php
session_start();
ob_start();
include 'connectdb.php';

if (isset($_POST['submit'])) {

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$email = mysqli_real_escape_string($conn,stripslashes($email));
	$password = mysqli_real_escape_string($conn,stripcslashes($password));


	if(isset($_POST['rem'])){
		setcookie('email',$email,time() + (86400 * 30),"/");
		setcookie('password',$password,time() + (86400*30),"/");
	}

	$sql = "SELECT * FROM students WHERE EMAIL = '$email' AND BINARY PASSWORD='$password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
				$check_email = $row['EMAIL'];
				$check_password = $row['PASSWORD'];
				$check_permission = $row['PERMISSION'];
				$rollno = $row['ROLLNO'];
				if ($email == $check_email && $password == $check_password) {
					if ($check_permission == 1) {		
						$_SESSION['email'] = $email;
						$_SESSION['password'] = $password;
						$_SESSION['rollno'] = $rollno;
						header("location: studentdashboard.php");
						exit();
					}elseif ($check_permission == 2) {
						header("location: pendinguser.php");
						exit();
					}elseif($check_permission == 0){
						header("location: denyeduser.php");
						exit();
					}
				}else{
					header("location: index.php?failed=1");
					exit();
				}
			}	
		}else{
			header("location: index.php?failed=1");
			exit();
		}
}	
?>