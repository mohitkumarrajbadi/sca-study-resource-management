<?php
	
	include 'connectdb.php';

	$fid = $_SESSION['fid'];
	
	$firstname = "";
	$lastname = "";
	$imagelocation ="";
	$mobnumber = "";
	$email = "";
	
	$sql = "SELECT * FROM faculty WHERE FID=".$fid;
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