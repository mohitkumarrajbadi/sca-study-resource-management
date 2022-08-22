<?php
	$rollno = $_GET['rollno'];
?>

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
					<img src="images/lock.png" class="logimage">
				</div>
				<div class="col-sm-6 col2">
					<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Forgot Password</h4>
			</div>
			<div class="modal-body">
				<form action="stud_reset_pass.php" method="post" id="regform" enctype="multipart/form-data">
						<input type="hidden" name="rollno" value="<?php echo $rollno;?>">
					<?php
						$uri = $_SERVER['REQUEST_URI'];
						if (strpos($uri,'change=1')) {
								$input = '<h2 style="color:green;">Thank You!!</h4>';
						}else{
							$input = '<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Enter a new password" name="password" id="password">
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Reenter new password" name="password_again" >
					</div>';
						}
						echo $input;
  						
  						if (strpos($uri, 'error=1')) {
  							$output = "<div class='form-group'><h5 style='color: red;'>Password change Failed !! </h5></div>";
  						}elseif (strpos($uri, 'success=1')) {
  							$output = "<div class='form-group'><h5 style='color: green;'>Password changed successfully !! </h5></div>";
  						}else{
  							$output = "";
  						}
  						echo $output;
  					 
						if (strpos($uri, 'change=1')){
							echo '';
						}else{
							echo '<div class="form-group">
										<input type="submit" class="btn btn-primary btn-block btn-lg" value="Reset Password" name="submit">
									</div>';
						}
					?>
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