<?php
  session_start();
  ob_start();
  if (!isset($_SESSION['femail']) || !isset($_SESSION['fpassword']) ) {
    header("location: facultylogin.php");
    exit();
  }

  include 'faculty_details.php';

?>


<!DOCTYPE html>
<html>
<head>
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
<!--Css Link-->
<link rel="stylesheet" type="text/css" href="css/sidebarstyle.css">
<style type="text/css">
  h2{
    font-weight: 800;
  }
  .form-group{
    width: 100% !important;
  }
  label {
    display: inline-block;
    margin-bottom: .5rem;
    width: inherit;
    text-align: center;
    font-size: 20px;
    padding-top: 10px;
    color: red;
}

.row{
  margin: 0px;
  padding: 0px;
}


.row .col-sm-4{
  margin: 0px;
  padding: 5px;
}

</style>

</head>
<body>

<!--Close and Open Button Code-->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>

<!--Top Navbar Code-->
  <div class="container-fluid profileimg">
    <img src="<?php echo $imagelocation;?>" class="rounded-circle">
  </div>

<!--Side Navbar Code-->
<ul style="list-style-type: none;">
  <li><a href="facultydashboard.php" class="link l1 active"><i class="fa fa-upload" aria-hidden="true"></i>
 Upload Files</a></li>
  <li><a href="fdfileview.php" class="link l2"><i class="fa fa-eye" aria-hidden="true"></i>
 View Files</a></li>
  <li><a href="fdprofileview.php" class="link l3"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a></li>
  <li><a href="facultysignout.php" class="link"><i class="fa fa-sign-out" aria-hidden="true"></i>
Sign Out</a></li>
</ul>
    
</div>

<div id="main" >

   <div class="row rcol">
    <div class="col-sm-6">
      <h2><a href="facultydashboard.php" style="color: black;">Faculty Dashboard</a></h2>
    </div>
    <div class="col-sm-6">
      <a href="fdprofileview.php" class="headlink">
      <h3><?php echo $firstname." ".$lastname;?> <img src="<?php echo $imagelocation;?>" class="rounded-circle imgheading"></h3>
       </a>
    </div>
  </div>

  <div class="container-fluid opnbtn">
  <div class="row">
    <div class="col-sm-4 text-left">
      <span class="openbtn" id="openbtn"onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i>
 Open Menu</span>
    </div>
  </div>
</div>


<br>
<br>
<br>

 <div id="main" class="container-fluid uploading">
	<h2>Upload Files</h2>
	<br>
	       
<form action="uploadfacultyfile.php" method="post" id="regform" enctype="multipart/form-data">
	
  <div class="row" style="width: 100%;">
    <div class="form-group">
            <input type="text" class="form-control" placeholder="File Title" name="filetitle">
      </div>
  </div>

	<div class="row" style="width: 100%;">
   <div class="form-group">
   <div class="custom-file mb-3">
        <input type="file" class="form-control custom-file-input" id="customFile" name="pdfupload">
      <label class="custom-file-label text-left" for="customFile">Browse File to upload</label>
    </div> 
  </div> 
  </div>
	
	<div class="row">
		<div class="col-sm-4">
		<div class="form-group">
        <select name="branch" class="custom-select">
            <option value="" selected>Branch</option>
            <option value="MCA">MCA</option>
            <option value="BCA">BCA</option>
            <option value="MSC CS">MSC CS</option>
            <option value="BSC CS">BSC CS</option>
          </select>  
    </div>
	</div>

	<div class="col-sm-4">
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
	</div>

  <div class="col-sm-4">
    <div class="form-group">
      <select name="subject" class="custom-select">
        <option value="" selected>Subject</option>
        <?php
          if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<option value=".$row['SID'].">".$row['SUBJNAME']."</option>";
          }
        }
      ?>
      </select>
    </div>
  </div>

	</div>
	<div class="row justify-content-end">
   <div class="col-sm-2">
    <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Submit" name="submit">
      </div>
   </div> 
  </div>

        <div class="row justify-content-end">
          <div class="col-sm-2">
            <?php
              $uri = $_SERVER['REQUEST_URI'];
              if (strpos($uri, 'error=1')) {
                echo "<div class='form-group'>";
                echo "<h5 style='color: red;'>PDF upload Failed!! </h5>";
                echo "</div>";
              }elseif (strpos($uri, 'success=1')) {
                echo "<div class='form-group'>";
                echo "<h5 style='color: black;'>PDF uploaded Successfully!! </h5>";
                echo "</div>";
              }
        ?>
          </div>
        </div>

	</form>
</div>
<!--Javascript Link-->
<script type="text/javascript" src="script/formvalidation.js"></script>
<script type="text/javascript" src="script/fdscript.js"></script>
</body>
</html> 

<?
  ob_end_flush();
?>