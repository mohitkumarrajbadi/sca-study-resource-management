<?php  
 include 'connectdb.php';

 $sql = "SELECT * FROM admin WHERE AID = '".$_POST["id"]."'";  
 $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      { 
      	if(@unlink($row['IMAGELOCATION'])){
      		$sql = "DELETE FROM admin WHERE AID = '".$_POST["id"]."'";
      		if(mysqli_query($conn, $sql)){
      			echo "AID ".$_POST["id"]." delete Successfully!!";
      		}else{
      			echo "Can't remove record from Database!";
      		}
      	}else{
      		echo "Can't Delete File!";
      	}
      	}
 }  
 ?>