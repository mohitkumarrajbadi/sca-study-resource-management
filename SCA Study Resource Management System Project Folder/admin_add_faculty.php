<?php

	ob_start();

	if (isset($_POST['submit'])) {
		include 'connectdb.php';
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$mobnumber = $_POST['phonenumber'];
		$password = $_POST['password_again'];
		$target_dir = "imageuploads/faculty/faculty";
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
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  	header("location: adminfcview.php?error=1");
		  	exit();
		// if everything is ok, try to upload file
		} else {
		    $target_file = str_replace(' ', '', $target_file);
		    if (move_uploaded_file(str_replace(' ', '', $_FILES["imageupload"]["tmp_name"]), $target_file)) {
		        $sql = "INSERT INTO faculty (FIRSTNAME,LASTNAME,EMAIL,MOBNUMBER,PASSWORD,IMAGELOCATION) VALUES('$firstname','$lastname','$email','$mobnumber','$password','$target_file')";
		        if ($conn->query($sql) === TRUE) {
		        	header("location: adminfcview.php?success=1");
		        	exit();
		        }else{
		        	@unlink($target_file);
		        	header("location: adminfcview.php?error=1");
		        	exit();		        		
		        }
		    } else {
		        header("location: adminfcview.php?error=1");
		        exit();
		    }
		}	
	}

	ob_end_flush();

?>