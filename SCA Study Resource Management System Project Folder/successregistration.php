<?php 
	session_start();
	ob_start();
	if (!isset($_SESSION['firstname'])) {
		header("location: studentregistrationpage.php");
		exit();
	}
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
				<div class="container-fluid inner" style="height: 95%;">			
			<div class="row" style="height: inherit;">
				<div class="col-sm-6 d-none d-md-block d-lg-block col1 ">
					<img src="images/studreg.png" class="rounded-circle logimage" id="imagepreview">
				</div>
				<div class="col-sm-6 col2" style="padding-top: 300px; padding-left: 10px; padding-right: 10px;">
					<h2>Thank You <?php echo $_SESSION['firstname']?> for Registration!</h2>
					<h2>Your profile will verified by the admin as soon as possible!!</h2>
					<h2>Your receive a notification after verification on you Email : <?php echo $_SESSION['email'];?></h2>
		</div>
	</div>
	</div>		

<script type="text/javascript" src="script/formvalidation.js"></script>
<script type="text/javascript" src="script/uploadscript.js"></script>

	<?php
		unset($_SESSION['firstname']);
		unset($_SESSION['email']);
	?>
</body>
</html>

<?php
	ob_end_flush();
?>