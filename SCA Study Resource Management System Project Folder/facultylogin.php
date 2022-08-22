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

<!--Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:500&display=swap" rel="stylesheet">

<!--Font Awesome-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--CSS Link-->
<link rel="stylesheet" type="text/css" href="css/style.css">

<body>		
<div class="container-fluid inner">

	<div class="row justify-content-center">
					<h2 class="modal-title webtitle">SCA RESOURCE</h2>
	</div>


	<div class="row">
		<div class="col-sm-6 d-none d-md-block d-lg-block col1">
			<img src="images/teachericon.png" class="rounded-circle logimage">
		</div>
<div class="col-sm-6 col2">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Faculty Login</h4>
			</div>
			<div class="modal-body">
				<form action="facultylogincheck.php" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Email" required="required" name="femail" 
						<?php 
						if(isset($_COOKIE['femail']))
							echo "value='".$_COOKIE['femail']."'";
						?>
						>
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Password" required="required" name="fpassword" 
						<?php 
						if(isset($_COOKIE['fpassword']))
							echo "value='".$_COOKIE['fpassword']."'";
						?>
						>			
					</div>

					<div class="custom-control form-group custom-checkbox">
    					<input type="checkbox" class="custom-control-input" id="customCheck" name="frem" value="1">
    					<label class="custom-control-label" for="customCheck">Remember Me</label>
  					</div>

  					<?php
  						$uri = $_SERVER['REQUEST_URI'];
  						if (strpos($uri, 'failed=1')) {
  							echo "<div class='form-group'>";
  							echo "<h5 style='color: red;'>Invalid Email and Password !! </h5>";
  							echo "</div>";
  						}
  					?>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" name="submit">
					</div>
				</form>				
				
			</div>

			<div class="row footer">
				<div class="col-sm-6">
					<a href="faculty_forgot_password.php">Forgot Password?</a>
				</div>
			</div>
			<div class="row footer">
				<div class="col-sm-4 modal-footer">
					<a href="adminlogin.php">Admin Login?</a>
				</div>
				<div class="col-sm-4 modal-footer">
					<a href="index.php">Student Login?</a>
				</div>
			</div>
		</div>
			</div>
		</div>
			

</body>
</html>