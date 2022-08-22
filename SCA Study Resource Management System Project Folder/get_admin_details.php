<?php
	
include 'connectdb.php';

$sql = 'SELECT * FROM admin WHERE AID='.$aid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
          $firstname = $row['FIRSTNAME'];
          $lastname = $row['LASTNAME'];
          $mobnumber = $row['MOBNUMBER'];
          $email = $row['EMAIL'];
          $imagelocation = $row['IMAGELOCATION'];
    }
  }

?>