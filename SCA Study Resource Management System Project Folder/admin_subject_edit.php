<?php  

include 'connectdb.php';  

 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE subject SET ".$column_name."='".$text."' WHERE SID='".$id."'";  
 if(mysqli_query($conn, $sql))  
 {  
      echo $column_name." changed to ".$text." successfully!";  
 }  else{
 	echo "Not updated.Some Error Found!!";
 }
 ?>