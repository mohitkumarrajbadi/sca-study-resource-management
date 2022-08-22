<?php
  session_start();
  ob_start();
if (!isset($_SESSION['adminemail']) || !isset($_SESSION['adminpassword'])) {
    header("location: adminlogin.php");
  }
    $aid = $_SESSION['aid'];
    include 'get_admin_details.php'
    
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

<!--Jquery Form validation CDN-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!---->


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
  <li><a href="adminsubview.php" class="link l3 active"><i class="fa fa-book" aria-hidden="true"></i>  Subjects</a></li>
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
    <div class="col-sm-4 text-center">
      <h3>Subjects</h3>
    </div>
    <div class="col-sm-4 text-right">
<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>
    Add Subject</button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Subject</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="admin_add_subject.php" method="post" id="regform">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject Code" name="subcode">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject Name" name="subname">
              </div>
               <div class="form-group">
                 <?php
                   getFaculty();
                   echo $faculty;
                 ?>
              </div>
              <div class="form-group">
                <select name="branch" class="custom-select" >
                  <option value="" selected>Branch</option>
                          <option value="BCA">BCA</option>
                          <option value="MCA">MCA</option>
                          <option value="BSC">BSC</option>
                          <option value="MSC">MSC</option>
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
                <input type="submit" class="btn btn-primary btn-block btn-lg" value="Add Faculty" name="submit">
              </div>
          </form>  
        </div>     
      </div>
    </div>
  </div>
  
</div>
    </div>
  </div>
</div>
<!---->


<div class="container-fluid">
  <?php
              $uri = $_SERVER['REQUEST_URI'];
              if (strpos($uri, 'error=1')) {
                $data = '<div class="row" id="msg" style="justify-content: flex-end;">
  Failed to Add Subject</div>';
              }elseif(strpos($uri, 'success=1')){
                $data = '<div class="row" id="msg" style="justify-content: flex-end;">
  Subject Added Successfully!</div>';
              }else{
                $data = '<div class="row" id="msg" style="justify-content: flex-end;">
  </div>';
              }
          echo $data;
  ?>
  
</div>

<!--Exam Resources-->
 <div class="container-fluid studentspage">
 	  <div class="row head line text-center">
      <div class="col-sm-1">SID</div>
      <div class="col-sm-2">Subject Code</div>
      <div class="col-sm-2">FID</div>
      <div class="col-sm-2">Branch</div>
      <div class="col-sm-1">Semester</div>
      <div class="col-sm-2">Subject Name</div>
      <div class="col-sm-2">Action</div>
    </div>

    <div class="row details text-center line show">
      
    </div>

    </div>
</div>
<!--Exam Resource Code Ending-->

<script type="text/javascript" src="script/adminscript.js"></script>
<script type="text/javascript" src="script/formvalidation.js"></script>
<script type="text/javascript" src="script/uploadscript.js"></script>

</body>
</html> 

<script type="text/javascript">

$(document).ready(function() {
  function fetch_data()  
      {  
           $.ajax({  
                url:"admin_subject_fetch.php",  
                method:"POST",  
                success:function(data){  
                     $('.show').html(data);  
                }  
           });  
      }  
      fetch_data();  

      function edit_data(id, text, column_name)  
      {  
          $(".cc").click(function()
          {
            $.ajax({  
                url:"admin_subject_edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     document.getElementById("msg").innerHTML = data; 
                     fetch_data(); 
                }  
           });
          });    
      }

      $(document).on('blur', '.subjcode', function(){ 
           var id = $(this).data("id1");  
           var subjcode = $(this).text();  
           edit_data(id,subjcode, "SUBJCODE");  
      });

      $(document).on('blur', '.subjname', function(){ 
           var id = $(this).data("id5");  
           var subjname = $(this).text();  
           edit_data(id,subjname, "SUBJNAME");  
      });

      $(document).on('change', '.branch', function(){  
           var id = $(this).data("id3");
           var branch = $(this).val();
           edit_data(id,branch,"BRANCH");  
      });

      $(document).on('change', '.semester', function(){  
           var id = $(this).data("id4");
           var semester = $(this).val();
           edit_data(id,semester,"SEMESTER");  
      });

      $(document).on('change', '.faculty', function(){  
           var id = $(this).data("id2");
           var fid = $(this).val();
           edit_data(id,fid,"FID");  
      });




      $(document).on('click', '.fbn', function(){ 
           var id=$(this).data("id7");  
           if(confirm("Are you sure you want to remove this Subject ?"))  
           {  
                $.ajax({  
                     url:"admin_delete_subject.php",  
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
    
    function getFaculty(){
                        include 'connectdb.php';
                          global $faculty ;
                          $faculty='<select class="custom-select " name="faculty"> <option value="" selected>Faculty</option>';
                          $sql = "SELECT * FROM faculty ";
                          $result = mysqli_query($conn, $sql);  
                          if(mysqli_num_rows($result) > 0) {  
                          while($row = mysqli_fetch_array($result))  
                            {
                              $name = $row["FIRSTNAME"]." ".$row["LASTNAME"];
                                $faculty .= '
                                    <option value="'.$row["FID"].'" >'.$row["FID"]." ".$name.'</option>
                                ';
                              }
                              $faculty .= '</select>';
                            }
    }

  ob_end_flush();
?>