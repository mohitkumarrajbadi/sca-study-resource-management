<?php

 include 'connectdb.php';

 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE students SET ".$column_name."='".$text."' WHERE ROLLNO='".$id."'";  
 if(mysqli_query($conn, $sql))  
 {  
      echo $column_name." changed to ".$text." successfully!";  
 }  else{
 	echo "NOt updated";
 }
 ?>