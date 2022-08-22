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
  <li><a href="adminsubview.php" class="link l3"><i class="fa fa-book" aria-hidden="true"></i>  Subjects</a></li>
  <li><a href="adminview.php" class="link l4"><i class="fas fa-user-cog"></i>  Admin</a></li>
  <li><a href="adminfileview.php" class="link l5"><i class="fa fa-file" aria-hidden="true"></i> Files</a></li>
  <li><a href="adminexamfile.php" class="link l4 active"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exam Files</a></li>
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
      <h3 >Files</h3>
    </div>
    <div class="col-sm-4 text-right">
<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>
    Add File</button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add File</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="admin_add_examfiles.php" method="post" id="regform" enctype="multipart/form-data">
        <div class="form-group"><?php getSubject(); echo $subject;?></div>
          <div class="form-group"><?php getYear(); echo $years;?></div>
          <div class="form-group"><?php getExam(); echo $exam;?></div>
        
          <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="pdfupload" id="pdfupload">
                <label class="custom-file-label text-left" for="customFile">Choose File</label>
             </div>
          </div>
          <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block btn-lg" value="Add File" name="submit">
          </div>
        </form>                  
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
  Failed to Add File</div>';
              }elseif(strpos($uri, 'success=1')){
                $data = '<div class="row" id="msg" style="justify-content: flex-end;">
  File Added Successfully!</div>';
              }else{
                $data = '<div class="row" id="msg" style="justify-content: flex-end;">
  </div>';
              }
          echo $data;
  ?>
  
</div>


<!--The files upload view-->
 <div class="container-fluid studentspage">
    
    <div class="row head line text-center">
      <div class="col-sm-2">EID</div>
      <div class="col-sm-2">SID Subject</div>
      <div class="col-sm-2">Year</div>
      <div class="col-sm-2">Exam Title</div>
      <div class="col-sm-2">File Location</div>
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
                url:"admin_exam_file_fetch.php",  
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
                url:"admin_examfiles_edit.php",  
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


      $(document).on('blur', '.examtitle', function(){ 
           var id = $(this).data("id3");  
           var examtitle = $(this).val();
            edit_data(id,examtitle, "EXAMTITLE");  
      });

      
      $(document).on('change', '.subject', function(){  
           var id = $(this).data("id1");
           var sid = $(this).val();
           edit_data(id,sid,"SID");  
      });

      $(document).on('change', '.year', function(){  
           var id = $(this).data("id2");
           var year = $(this).val();
           edit_data(id,year,"YEAR");  
      });




      $(document).on('click', '.fbn', function(){ 
           var id=$(this).data("id5");  
           if(confirm("Are you sure you want to remove this File ?"))  
           {  
                $.ajax({  
                     url:"admin_delete_examfiles.php",  
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

        function getSubject(){
              include 'connectdb.php';
                global $subject ;
                $subject='<select class="custom-select subject" name="subject"> <option value="" selected>Subject</option>';
                $sql = "SELECT * FROM SUBJECT ";
                $result = mysqli_query($conn, $sql);  
                if(mysqli_num_rows($result) > 0) {  
                while($row = mysqli_fetch_array($result))  
                  {
                      $subject .= '
                          <option value="'.$row["SID"].'" >'.$row["SID"]." ".$row["SUBJNAME"].'</option>
                      ';
                    }
                    $subject .= '</select>';
                  }        
                }


          function getYear(){
                global $years ;
                $years='<select class="custom-select" name="year"> <option value="" selected>Year</option>';
                
                  for ($i=2013; $i<=2020 ; $i++) { 
                        $years .= '<option value='.$i.'>'.$i.'</option>';
                      }
                 $years .= '</select>';
            }


          function getExam(){
              global $exam;
              $exam = '<select class="custom-select" name="examtitle">
              <option value="" selected>Exam</option>
              <option value="Mid Sem">Mid Sem</option>
              <option value="End Sem">End Sem</option>
              </select>
              ';
          }
              
          

ob_end_flush();

?>