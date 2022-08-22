<?php  

      include 'connectdb.php';
  
 $sql = "SELECT * FROM examfile WHERE EID = '".$_POST["id"]."'";  
 $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      { 
      	if(@unlink($row['FILELOCATION'])){
      		$sql = "DELETE FROM examfile WHERE EID = '".$_POST["id"]."'";
      		if(mysqli_query($conn, $sql)){
      			echo "EID ".$_POST["id"]." delete Successfully!!";
      		}else{
      			echo "Can't remove record from Database!";
      		}
      	}else{
      		echo "Can't Delete File!";
      	}
      	}
 }  
 ?>