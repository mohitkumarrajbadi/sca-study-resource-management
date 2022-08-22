<?php
		
		session_start();

		ob_start();

		include 'connectdb.php';

		if (isset($_POST['submit'])) {

			$femail = trim($_POST['femail']);
			$fpassword = trim($_POST['fpassword']);

			$femail = mysqli_real_escape_string($conn,stripslashes($femail));
			$fpassword = mysqli_real_escape_string($conn,stripcslashes($fpassword));

			if($_POST['frem']){
					setcookie('femail',$femail,time() + (86400 * 30),"/");
					setcookie('fpassword',$fpassword,time() + (86400*30),"/");
			}

			$sql = "SELECT * FROM faculty WHERE EMAIL = '$femail' AND BINARY PASSWORD='$fpassword'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
						$fcheck_email = $row['EMAIL'];
						$fcheck_password = $row['PASSWORD'];
						$fcheck_fid = $row['FID'];
						if ($femail == $fcheck_email && $fpassword == $fcheck_password) {
							$_SESSION['femail'] = $femail;
							$_SESSION['fpassword'] = $fpassword;
							$_SESSION['fid'] = $fcheck_fid;
							header("location: facultydashboard.php");
							exit();
						}else{
							header("location: facultylogin.php?failed=1");
							exit();
						}
					}	
				}else{
					header("location: facultylogin.php?failed=1");
					exit();
				}
		}

		ob_end_flush();
	
?>