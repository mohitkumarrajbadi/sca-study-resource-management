<?php  
 
 include 'connectdb.php'; 

$sid = $_POST['sid'];
$fid = $_POST['fid'];
$filetitle = $_POST['filetitle'];
$filelocation = $_POST['filelocation'];

 $sql = "INSERT INTO pdffile(SID, FID, FILETITLE, FILELOCATION) VALUES($sid,$fid,'$filetitle','$filelocation')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Inserted';  
 } 
 ?> 