<?php
  session_start();
  ob_start();
if (!isset($_SESSION['adminemail']) || !isset($_SESSION['adminpassword'])) {
    header("location: adminlogin.php");
  }
    $aid = $_SESSION['aid'];
    include 'get_admin_details.php';
    getStudentDetails();
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<!--Css Link-->
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
<!--Javascript Link-->
<script type="text/javascript" src="script/sdscript.js"></script>
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
  <li><a href="adminstudview.php" class="link l1"><i class="fas fa-user-graduate"></i> Student</a></li>
  <li><a href="adminfcview.php" class="link l2"><i class="fas fa-user-tie"></i> Faculty</a></li>
  <li><a href="adminsubview.php" class="link l3"><i class="fa fa-book" aria-hidden="true"></i>  Subjects</a></li>
  <li><a href="adminview.php" class="link l4"><i class="fas fa-user-cog"></i>  Admin</a></li>
  <li><a href="adminfileview.php" class="link l5"><i class="fa fa-file" aria-hidden="true"></i> Files</a></li>
  <li><a href="adminexamfile.php" class="link l4"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exam Files</a></li>
  <li><a href="adminprofileview.php" class="link l6"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></i>
  <li><a href="adminsignout.php" class="link l7"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
</ul>    
</div>
<!---->

<div id="main" >
<!--Header Row-->
   <div class="row rcol">
  		<div class="col-sm-6">
  			<h3><a href="admindashboard.php" style="color: black;">ADMIN DASHBOARD</a></h3>
  		</div>
  		<div class="col-sm-6">
        <h3 class="pfname"><a href="adminprofileview.php" style="color: black;"><?php echo $firstname." ".$lastname;?><img src="<?php echo $imagelocation;?>" class="rounded-circle imgheading"></a></h3>
  		</div>
 	</div>
<!---->
<!--The open close button-->

<div class="container-fluid opnbtn">
  <div class="row">
    <div class="col-sm-4 text-left">
      <span class="openbtn" id="openbtn"onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i>
 Open Menu</span>
    </div>
    <div class="col-sm-4 text-center" style="padding-top: 10px;">
      <h3 >Welcome to Admin Dashboard</h3>
    </div> 
  </div>
</div>
<!---->


<!-- Admindashboard column -->

<div class="container-fluid">
    
    <div class="card-columns text-center">
      
      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fas fa-user-clock cardlogo"></i>
          <p class="card-text">Student Approval Pending : <?php echo $pending;?> </p>
          <a href="adminstudapproval.php" class="btn btn-primary">Pending Approval</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fas fa-user-check cardlogo"></i>
          <p class="card-text">Student Profile Approved : <?php echo $permited;?> </p>
          <a href="adminstudview.php" class="btn btn-primary">Student Approved</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fas fa-user-times cardlogo"></i>
          <p class="card-text">Student Profile Denied : <?php echo $denied;?> </p>
          <a href="adminstuddenied.php" class="btn btn-primary">Student Denied</a>
        </div>
      </div>

    </div>

    <div class="card-columns text-center">
      
      <div class="card bg-light">
        <div class="card-body text-center">
        <i class="fas fa-user-tie cardlogo"></i>          
        <p class="card-text">Faculty Assigned </p>
          <a href="adminfcview.php" class="btn btn-primary">Faculty</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fa fa-book cardlogo" aria-hidden="true"></i>
          <p class="card-text">Assigned Subjects</p>
          <a href="adminsubview.php" class="btn btn-primary">Subjects</a>
        </div>
      </div> 

      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fas fa-user-cog cardlogo"></i>
          <p class="card-text">Admin Assigned</p>
          <a href="adminview.php" class="btn btn-primary">Admin</a>
        </div>
      </div>
      
    </div>

    <div class="card-columns text-center">
      
      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fa fa-file cardlogo" aria-hidden="true"></i>
          <p class="card-text">PDF Files Resources </p>
          <a href="adminfileview.php" class="btn btn-primary">PDF Files</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fa fa-file-pdf-o cardlogo" aria-hidden="true"></i>
          <p class="card-text">Exam Question Paper </p>
          <a href="adminexamfile.php" class="btn btn-primary">Exam Files</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <i class="fas fa-user cardlogo"></i>
          <p class="card-text">My Profile </p>
          <a href="adminprofileview.php" class="btn btn-primary">Profile</a>
        </div>
      </div>
      
    </div>

</div>


<!--  -->

</div>
<!--Exam Resource Code Ending-->

<script type="text/javascript" src="script/adminscript.js"></script>

</body>
</html> 


<script type="text/javascript">
  $(document).ready(function(){

      function fetch_data()  
      {  
           $.ajax({  
                url:"admin_stud_fetch.php",  
                method:"POST",  
                success:function(data){  
                     $('.show').html(data);  
                }  
           });  
      }  
      fetch_data();  

    $(document).on('click', '.cc', function(){ 
           var id=$(this).data("id1");  
           if(confirm("Are you sure you want to allow this user?"))  
           {  
                $.ajax({  
                     url:"allow.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          document.getElementById('msg').innerHTML=data; 
                          fetch_data();  
                     }  
                });  
           }  
      });

      $(document).on('click', '.fbn', function(){ 
           var id=$(this).data("id2");  
           if(confirm("Are you sure you want to deny this user?"))  
           {  
                $.ajax({  
                     url:"deny.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          document.getElementById('msg').innerHTML=data; 
                          fetch_data();  
                     }  
                });  
           }  
      });
  });
</script>

<?php
  ob_end_flush();

  function getStudentDetails(){
      include 'connectdb.php';

      global $permited,$denied,$pending;

      $sql = "SELECT * FROM students WHERE PERMISSION = 1";
      $results = $conn->query($sql);
      $permited = $results->num_rows;

      $sql = "SELECT * FROM students WHERE PERMISSION = 0";
      $results = $conn->query($sql);
      $denied = $results->num_rows;

      $sql = "SELECT * FROM students WHERE PERMISSION = 2";
      $results = $conn->query($sql);
      $pending = $results->num_rows;

  }

?> 
