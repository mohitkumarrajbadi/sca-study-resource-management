<?php
	include 'connectdb.php';

	$rollno = $_SESSION['rollno'];
	$firstname = "";
	$lastname = "";
	$imagelocation ="";
	$mobnumber = "";
	$email = "";
	
	$sql = "SELECT * FROM students WHERE ROLLNO=".$rollno;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$firstname = $row['FIRSTNAME'];
			$lastname = $row['LASTNAME'];
			$imagelocation = $row['IMAGELOCATION'];
			$mobnumber = $row['MOBNUMBER'];
			$email = $row['EMAIL'];
		}
	}

?>