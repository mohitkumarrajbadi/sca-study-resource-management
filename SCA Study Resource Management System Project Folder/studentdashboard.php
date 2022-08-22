<?php
	session_start();
	ob_start();
	include 'student_details.php';
	if (!isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['rollno'])) {
		header("location: index.php");
		exit();
	}	    
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Bootstrap 4 CDN-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- AJAX -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!---->

<!--Bootstrap 4 Ends-->

<!--Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Poppins:700&display=swap" rel="stylesheet">
<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Css Link-->
<link rel="stylesheet" type="text/css" href="css/studentstyle.css">
<!--Javascript Link-->
<script type="text/javascript" src="script/sdscript.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>

<!--Siderbar-->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
  <div class="container-fluid profileimg">
    <img src="<?php echo $imagelocation;?>" class="rounded-circle">
    <h5><?php echo $firstname." ".$lastname;?></h5>
  </div>
<ul style="list-style-type: none;">
  <li><a href="studentdashboard.php" class="link l1 active"><i class="fa fa-file" aria-hidden="true"></i>
 Study Resource</a></li>
  <li><a href="studyresourcepage.php" class="link l2"><i class="fa fa-file-pdf-o"></i>
 Question Paper</a></li>
  <li><a href="profilepage.php" class="link l3"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a></li>
  <li><a href="signout.php" class="link"><i class="fa fa-sign-out" aria-hidden="true"></i>
Sign Out</a></li>
</ul>    
</div>
<!---->

<div id="main" >
<!--Header Row-->
   <div class="row rcol">
  		<div class="col-sm-6">
  			<h3><a href="studentdashboard.php" style="color: black;">SCA STUDENT RESOURCES</a></h3>
  		</div>
  		<div class="col-sm-6">
  			<h3 class="pfname"><a href="profilepage.php" style="color: black;"><?php echo $firstname." ".$lastname;?> <img src="<?php echo $imagelocation;?>" class="rounded-circle imgheading"></a></h3>
  		</div>
 	</div>
<!---->
<!--The open close button-->

<div class="container-fluid opnbtn">
  <span class="openbtn" id="openbtn"onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i>
 Open Menu</span>
</div>
<!---->

<!--Exam Resources-->
 <div class="container-fluid examres">
 	<h4 class="text-center">Study Resources</h4>


		 	<div class="form-group">
		    <div class="input-group">
		     <div class="input-group-prepend">
		     	<span class="input-group-text">Search</span>
		     </div>
		     <input type="text" name="search_text" id="search_text" placeholder="Search for the File" class="form-control" />
		    </div>
		   </div>
		   <br />
		   <div id="result">
		   	

		   </div>
</div>
<!--Exam Resource Code Ending-->


</body>
</html> 

<script>
$(document).ready(function(){

 load_data();

		 function load_data(query)
		 {
		  $.ajax({
		   url:"fetch_pdf_resource.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('#result').html(data);
		   }
		  });
		 }

		 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  }
		  else
		  {
		   load_data();
		  }
		 });
});
</script>

<?php
	ob_end_flush();
?>