<?php  

include 'connectdb.php';  

 $sql = "DELETE FROM subject WHERE SID = '".$_POST["id"]."'";  
    if(mysqli_query($conn, $sql))  
       {  
            echo $_POST["id"]." deleted successfully.";
       }else{
            echo "Error deleting file!!";
       }  
 ?>