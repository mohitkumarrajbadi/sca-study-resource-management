<?php
	session_start();

	ob_start();
	include 'connectdb.php';

	if (isset($_POST['submit'])) {

		$adminemail = trim($_POST['adminemail']);
		$adminpassword = trim($_POST['adminpassword']);

		$adminemail = mysqli_real_escape_string($conn,stripslashes($adminemail));
		$adminpassword = mysqli_real_escape_string($conn,stripcslashes($adminpassword));

		if($_POST['arem']){
				setcookie('adminemail',$adminemail,time() + (86400 * 30),"/");
				setcookie('adminpassword',$adminpassword,time() + (86400*30),"/");
		}

		$sql = "SELECT * FROM admin WHERE EMAIL = '$adminemail' AND BINARY PASSWORD='$adminpassword'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
					$fcheck_email = $row['EMAIL'];
					$fcheck_password = $row['PASSWORD'];
					$aid = $row['AID'];
					if ($adminemail == $fcheck_email && $adminpassword == $fcheck_password) {
						$_SESSION['adminemail'] = $adminemail;
						$_SESSION['adminpassword'] = $adminpassword;
						$_SESSION['aid'] = $aid;
						header("location: admindashboard.php");
						exit();
					}else{
						header("location: adminlogin.php?failed=1");
						exit();
					}
				}	
			}else{
				header("location: adminlogin.php?failed=1");
				exit();
			}
	}

	ob_end_flush();
	
?>