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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--Jquery Form validation CDN-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!---->

<style type="text/css">
	label{
		padding-top: 5px;
		margin-bottom: 0px;
		color: red !important;
	}
</style>

<body>
				<div class="container-fluid inner">			
			<div class="row">
				<div class="col-sm-6 d-none d-md-block d-lg-block col1">
					<img src="images/lock.png" class=" logimage">
				</div>
				<div class="col-sm-6 col2">
					<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Forgot Password</h4>
			</div>
			<div class="modal-body">
				<form action="reset_student_password.php" method="post" id="regform" enctype="multipart/form-data">

					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Please enter your Email" name="email" >
					</div>

					<div class="form-group">
					<?php
  						$uri = $_SERVER['REQUEST_URI'];
  						$output = "";
  						if (strpos($uri, 'error=1')) {
  							$output = "<div class='form-group'><h5 style='color: red;'>Password Reset Failed!! </h5></div>";
  						}elseif (strpos($uri, 'success=1')) {
  							$output = "<div class='form-group'><h5 style='color: green;'>Confirmation Link has been sent to your Email!! </h5></div>";
  						}else{
  							$output = "";
  						}
  						echo $output;
  					?>
					</div>

  						
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Reset Password" name="submit">
					</div>
				</form>				
				
			</div>
			<div class="row footer">
				<div class="col-sm-4 modal-footer">
					<a href="index.php">Back to Login?</a>
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
	</div>		

<script type="text/javascript" src="script/formvalidation.js"></script>
</body>
</html>