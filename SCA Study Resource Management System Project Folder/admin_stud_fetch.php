<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM students WHERE PERMISSION = 2";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
            echo '<div class="col-sm-1">'.$row['ROLLNO'].'</div>
            <div class="col-sm-1">'.$row['FIRSTNAME'].'</div>
            <div class="col-sm-1">'.$row['LASTNAME'].'</div>
            <div class="col-sm-2"><a href='.$row['IMAGELOCATION'].'>'.$row['IMAGELOCATION'].'</a></div>
            <div class="col-sm-1">'.$row['BRANCH'].'</div>
            <div class="col-sm-1">'.$row['SEMESTER'].'</div>
            <div class="col-sm-2">'.$row['EMAIL'].'</div>
            <div class="col-sm-1">'.$row['MOBNUMBER'].'</div>
            <div class="col-sm-1">'.$row['PASSWORD'].'</div>
            <div class="col-sm-1">
              <div class="row text-center">
                <div class="col-sm-6">
                <a href="#" class="cc" data-id1='.$row['ROLLNO'].'>
                  <i class="fa fa-check-circle" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id2='.$row['ROLLNO'].'>
                  <i class="fa fa-ban" aria-hidden="true"></i>
                </a>
              </div>
              </div>
            </div>';
            }
          }else{
            echo '
              <div class="col-sm-12">NO RECORDS FOUND</div>
            ';
          }
    ?>