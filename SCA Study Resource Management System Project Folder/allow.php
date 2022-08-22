<?php  

 include 'connectdb.php';

 $id = $_POST["id"];    
 $sql = "UPDATE students SET PERMISSION=1 WHERE ROLLNO='".$id."'";  
 if(mysqli_query($conn, $sql))  
 {  
      echo "User allowed successfully!! ";
      mailUser($id);

 }  else{
 	echo "Not Allowed . Some error occured!!";
 }

function mailUser($id){

	include 'connectdb.php';

	$sql = "SELECT * FROM students WHERE ROLLNO=".$id;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
				$to = $row['EMAIL'];
				$subject = "Profile Verified Successfully";
				$txt = 'Hi '.$row['FIRSTNAME'].', 

Your profile hasbeen verified!
Now you can Log in!

Thank You
Admin
SCA Study Resource
				';
				$headers = "From: admin@scaresource.com";

				if(mail($to,$subject,$txt,$headers)){					
						echo "Mail sent to the User!!";
				}else{
					echo "Error Sending Mail to the User!! ";;
				}
		}
	}

}


 ?>