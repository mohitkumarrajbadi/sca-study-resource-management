<!DOCTYPE html>
<html>
<head>
	<title>SCA RESOURCE</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:500&display=swap" rel="stylesheet">
<!--Font Awesome Link-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!---->
<!--Jquery Form validation CDN-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!---->

<!--CSS link-->
<link rel="stylesheet" type="text/css" href="css/regstyle.css">
<!---->

<body>
				<div class="container-fluid inner">			
			<div class="row">
				<div class="col-sm-6 d-none d-md-block d-lg-block col1 ">
					<img src="images/studreg.png" class="rounded-circle logimage" id="imagepreview">
				</div>
				<div class="col-sm-6 col2">
					<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Student Registration</h4>
			</div>
			<div class="modal-body">
				<form action="registerstudent.php" method="post" id="regform" enctype="multipart/form-data">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="First Name" name="firstname">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Last Name" name="lastname">
					</div>
					<div class="form-group">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="form-group">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<input type="number" class="form-control" placeholder="Mobile Number" name="phonenumber">
					</div>
					<div class="form-group">
						<div class="custom-file">
						    <input type="file" class="custom-file-input" id="customFile" name="imageupload" id="imageupload">
						    <label class="custom-file-label text-left" for="customFile">Choose Image</label>
						 </div>
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="number" name="rollno" placeholder="Roll No" class="form-control">
					</div>
					<div class="form-group">
						 <select name="branch" class="custom-select" >
				            <option value="" selected>Branch</option>
				            <option value="MCA">MCA</option>
				            <option value="BCA">BCA</option>
				            <option value="MSC CS">MSC CS</option>
				            <option value="BSC CS">BSC CS</option>
          				</select>
					</div>
					<div class="form-group">
						<select name="semester" class="custom-select" >
							<option value="" selected>Semester</option>
				              <option value="1">1</option>
				              <option value="2">2</option>
				              <option value="3">3</option>
				              <option value="4">4</option>
				              <option value="5">5</option>
				              <option value="6">6</option>
           				</select>
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password">				
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Confirm Password" name="password_again">				
					</div>
					<?php
  						$uri = $_SERVER['REQUEST_URI'];
  						if (strpos($uri, 'error=1')) {
  							echo "<div class='form-group'>";
  							echo "<h5 style='color: red;'>Student Registration Failed!! </h5>";
  							echo "</div>";
  						}
  					?>

					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="submit">
					</div>
				</form>				
				
			</div>
			<div class="row footer">
				<div class="col-sm-6 modal-footer">
					<a href="index.php">Have an Account?</a>
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
	</div>		

<script type="text/javascript" src="script/formvalidation.js"></script>
<script type="text/javascript" src="script/uploadscript.js"></script>

</body>
</html>
