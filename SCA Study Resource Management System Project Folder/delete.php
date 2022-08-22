<?php

      include 'connectdb.php';    
       $sql = "SELECT * FROM pdffile WHERE FLID = '".$_POST["id"]."'";  
       $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0)  
       {  
            while($row = mysqli_fetch_array($result))  
            { 
            	if(@unlink($row['FILELOCATION'])){
            		$sql = "DELETE FROM pdffile WHERE FLID = '".$_POST["id"]."'";
            		if(mysqli_query($connect, $sql)){
            			echo "Delete Successfully!!";
            		}else{
            			echo "Can't remove record from Database!";
            		}
            	}else{
            		echo "Can't Delete File!";
            	}
            	}
       }

 ?>