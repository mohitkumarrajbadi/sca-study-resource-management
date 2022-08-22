<?php
	ob_start();
	if (isset($_POST['submit'])) {
		$subjcode = $_POST['subcode'];
		$subjname = $_POST['subname'];
		$faculty = $_POST['faculty'];
		$branch = $_POST['branch'];
		$semester = $_POST['semester'];

		include 'connectdb.php';

		$sql = "INSERT INTO subject (SUBJCODE, FID, BRANCH, SEMESTER , SUBJNAME)
		VALUES ('$subjcode', '$faculty', '$branch', '$semester', '$subjname')";

		if ($conn->query($sql) === TRUE) {
		    header("location: adminsubview.php?success=1");
		    exit();
		} else {
		    header("location: adminsubview.php?error=1");
		    exit();
		}
	}

	ob_end_flush();
?>