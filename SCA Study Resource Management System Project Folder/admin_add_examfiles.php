<?php
	session_start();

	ob_start();

	$aid = $_SESSION['aid'];

	if (isset($_POST['submit'])) {
		include 'connectdb.php';

		$examtitle = $_POST['examtitle'];
		$sid = $_POST['subject'];
		$year = $_POST['year'];


		$target_dir = "files/examfiles/";
		$target_file = $target_dir.basename($_FILES["pdfupload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Check if file already exists
		if (file_exists($target_file)) {
		    header("location: adminexamfile.php?error=1");
		    exit();
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    $target_file = str_replace(' ', '', $target_file);
		    if (move_uploaded_file(str_replace(' ', '', $_FILES["pdfupload"]["tmp_name"]), $target_file)) {
		    	
		        $sql = "INSERT INTO examfile (SID,YEAR,EXAMTITLE,FILELOCATION,AID) VALUES($sid,$year,'$examtitle','$target_file',$aid)";

		        if ($conn->query($sql) === TRUE) {
		        	header('location: adminexamfile.php?success=1');
		        	exit();
		        }else{
		        	header("location: adminexamfile.php?error=1");
		        	exit();
		        }
		    } else {
		        header("location: adminexamfile.php?error=1");
		        exit();
		    }
		}	

	}

	ob_end_flush();

?>