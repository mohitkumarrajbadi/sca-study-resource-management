<?php
	
	session_start();

	ob_start();

	if (isset($_POST['submit'])) {
		include 'connectdb.php';
		
		$fid = $_SESSION['fid']; 	
		$filetitle = $_POST['filetitle'];
		$branch = $_POST['branch'];
		$semester = $_POST['semester'];
		$sid = $_POST['subject'];	
		$target_dir = "files/studyfiles/";
		$target_file = $target_dir.basename($_FILES["pdfupload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Check if file already exists
		if (file_exists($target_file)) {
		    header("location: facultydashboard.php?error=1");
		    exit();
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    $target_file = str_replace(' ', '', $target_file);
		    if (move_uploaded_file(str_replace(' ', '', $_FILES["imageupload"]["tmp_name"]), $target_file)) {
		        $sql = "INSERT INTO pdffile (SID,FID,FILETITLE,FILELOCATION) VALUES($sid,$fid,'$filetitle','$target_file')";

		        if ($conn->query($sql) === TRUE) {
		        	header('location: facultydashboard.php?success=1');
		        	exit();
		        }else{
		        	header("location: facultydashboard.php?error=1");
		        	exit();
		        }
		    } else {
		        header("location: facultydashboard.php?error=1");
		        exit();
		    }
		}	

	}

	ob_end_flush();

?>