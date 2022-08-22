<?php
  session_start();
  if (!isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['rollno'])) {
    header("location: index.php");
  }

  include 'student_details.php';

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


<!--Bootstrap 4 Ends-->

<!--Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Poppins:700&display=swap" rel="stylesheet">
<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Css Link-->
<link rel="stylesheet" type="text/css" href="css/studentstyle.css">


<!--Jquery Form validation CDN-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!---->

<style type="text/css">
  label{
    color: red;
  }
</style>


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
  <li><a href="studentdashboard.php" class="link l1 "><i class="fa fa-file" aria-hidden="true"></i>
 Study Resource</a></li>
  <li><a href="studyresourcepage.php" class="link l2"><i class="fa fa-file-pdf-o"></i>
 Question Paper</a></li>
  <li><a href="profilepage.php" class="link l3 active"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a></li>
  <li><a href="signout.php" class="link "><i class="fa fa-sign-out" aria-hidden="true"></i>
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

<!--Profile Page-->

<div class="container-fluid profiling">
<form action="stud_edit_profile.php" method="post" id="regform" enctype="multipart/form-data" >
  <div class="row">
    <div class="col-sm-3 imagecol">
      <img src="<?php echo $imagelocation;?>" class="img-thumbnail" alt="Image Loading Failed" id="imagepreview" >
    </div>
    <div class="col-sm-9">
      <div class="row ">
        <div class="col-sm-6"><h5>Profile Name : </h5></div>
        <div class="col-sm-6">
          <h5 class="phide"><?php echo $firstname." ".$lastname;?></h5>
          <input type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control pshow">
          <input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control pshow">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6"><h5>Email : </h5></div>
        <div class="col-sm-6">
          <h5 class="phide"><?php echo $email;?></h5>
          <input type="email" name="email" value="<?php echo $email;?>" class="form-control pshow" >
        </div> 
      </div>
      <div class="row">
        <div class="col-sm-6"><h5>Mobile Number : </h5></div>
        <div class="col-sm-6">
          <h5 class="phide"><?php echo $mobnumber;?></h5>
          <input type="text" name="mobnumber" value="<?php echo $mobnumber;?>" class="form-control pshow">
        </div>
      </div>
      <div class="row pshow">
        <div class="col-sm-6"><h5>Profile Image : </h5></div>
        <div class="col-sm-6">
          <div class="form-group">
            <div class="custom-file ">
                <input type="file" class="custom-file-input" id="customFile" name="imageupload" id="imageupload">
                <label class="custom-file-label text-left" for="customFile">Choose Image</label>
             </div>
          </div>
        </div>
      </div>

      <?php
              $uri = $_SERVER['REQUEST_URI'];
              if (strpos($uri, 'error=1')) {
                echo "<div class='row justify-content-end'>";
                echo "<h4 style='color: red; padding: 10px;'>Error updating.Try Again!</h4>";
                echo "</div>";              
              }elseif (strpos($uri, 'success=1')) {
                echo "<div class='row justify-content-end'>";
                echo "<h5 style='color: green; padding: 10px;'>Profile Updated Successfully!! </h5>";
                echo "</div>";
              }
        ?>

      
      <div class="row justify-content-end">
        <div class="col-sm-1 text-center">
          <a href="#" class="btn btn-primary" id="pedit">Edit</a>
          <input type="submit" class="btn btn-primary" id="pdone" value="Done" name="submit"></a>
        </div>
        <div class="col-sm-1 text-center" id="cancol"><a href="#" class="btn btn-primary" id="cancel">Cancel</a></div>
        <div class="col-sm-1 text-center" id="signoutcol"><a href="signout.php" class="btn btn-primary">Signout</a></div>
        <div class="col-sm-2 text-center" id="resetcol"><a href="student_forgot_password.php" class="btn btn-primary">Reset Password</a></div>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Profile Code Ending-->

<!--Javascript Link-->
<script type="text/javascript" src="script/sdscript.js"></script>
<script type="text/javascript" src="script/uploadscript.js"></script>
<script type="text/javascript" src="script/profile_form_validate.js"></script>

</body>
</html> 