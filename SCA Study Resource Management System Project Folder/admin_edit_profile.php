<?php
	session_start();

	ob_start();

	if(isset($_POST['submit'])){
	
		$aid = $_SESSION['aid'];

		include 'connectdb.php';
		include 'get_admin_details.php';

		$firstname = trim($_POST['firstname']);
		$lastname = trim($_POST['lastname']);
		$email = trim($_POST['email']);
		$mobnumber = trim($_POST['mobnumber']);

		$sql = "";

		if ($_FILES["imageupload"]["name"]) {
			checkFile($imagelocation);
			if ($newimagelocation != '') {
				$sql = "UPDATE admin SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', EMAIL = '$email', MOBNUMBER = '$mobnumber' , IMAGELOCATION = '$newimagelocation' WHERE AID=$aid";
			}else{
				$sql = "UPDATE admin SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', EMAIL = '$email', MOBNUMBER = '$mobnumber' WHERE AID=$aid";		
			}
		}else{
			$sql = "UPDATE admin SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', EMAIL = '$email', MOBNUMBER = '$mobnumber' WHERE AID=$aid";
		}

		if ($conn->query($sql) === TRUE) {
		    header('location: adminprofileview.php?success=1');
		    exit();
		} else {
			 header('location: adminprofileview.php?error=1');
			 exit();
		}
	}


		function checkFile($imagelocation){
			global $newimagelocation;
			$newimagelocation = '';

			echo $imagelocation;

			$target_dir = "imageuploads/admin/admin";
			$target_file = $target_dir.basename($_FILES["imageupload"]["name"]);
			echo $target_file;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["imageupload"]["tmp_name"]);
				if ($check !== false) {
					echo "File is an image - " . $check["mime"].".";
				}else{
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}

				// Check if file already exists
			if (file_exists($target_file)) {
				header('location: adminprofileview.php?error=1');
				exit();
			    $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    header('location: adminprofileview.php?error=1');
			    exit();
			// if everything is ok, try to upload file
			} else {
			    
			    if (@unlink($imagelocation)) {
			    	$target_file = str_replace(' ', '', $target_file);
			    	if (move_uploaded_file(str_replace(' ', '', $_FILES["imageupload"]["tmp_name"]), $target_file)) {
			        	$newimagelocation = $target_file;
			        }else{
			        	header('location: adminprofileview.php?error=1');
			        	exit();
			        }
			    }else{
			    	header('location: adminprofileview.php?error=1');
			    	exit();
			    }

			    }
		}


ob_end_flush();


?>
