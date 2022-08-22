<?php
  session_start();

  ob_start();

  if (!isset($_SESSION['femail']) || !isset($_SESSION['fpassword']) || !isset($_SESSION['fid'])) {
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
<link rel="stylesheet" type="text/css" href="css/sidebarstyle.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<style type="text/css">
  .highlight { background-color: red; }
</style>

</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>

  <div class="container-fluid profileimg">
    <img src="<?php echo $imagelocation;?>" class="rounded-circle">
  </div>

<ul style="list-style-type: none;">
  <li><a href="facultydashboard.php" class="link l1"><i class="fa fa-upload" aria-hidden="true"></i>
 Upload Files</a></li>
  <li><a href="fdfileview.php" class="link l2 active"><i class="fa fa-eye" aria-hidden="true"></i>
 View Files</a></li>
  <li><a href="fdprofileview.php" class="link l3"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a></li>
  <li><a href="facultysignout.php" class="link l4"><i class="fa fa-sign-out" aria-hidden="true"></i>
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

<div class="container-fluid viewing">
  <h2 class="text-center">File Uploaded</h2>
     <div class="container-fluid text-center">  
                <div class="table-responsive"> 
                     <h5 class="text-right message" style="color: red;" id="msg"></h5>
                     <br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
  
</div>

<script type="text/javascript" src="script/fdscript.js"></script>
</body>
</html> 


<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
  
      function edit_data(id, text, column_name)  
      {  
          $(".update_btn").click(function(){
            $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     document.getElementById('msg').innerHTML=data;  
                }  
           });
          });    
      }
      
     
      $(document).on('change', 'select', function(){  
           var id = $(this).data("id7");
           var sid = $(this).val();
           edit_data(id,sid,"SID");  
      });


      $(document).on('blur', '.filetitle', function(){ 
          $(this).css("background-color","transparent");   
           var id = $(this).data("id3");  
           var filetitle = $(this).text();  
           edit_data(id,filetitle, "FILETITLE");  
      });

      $(document).on('click', '.filetitle', function(){  
           $(this).css("background-color","white");  
      });      

      $(document).on('blur', '.fid', function(){  
           var id = $(this).data("id4");  
           var filelocation = $(this).text();  
           edit_data(id,filelocation, "FILELOCATION");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
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

 