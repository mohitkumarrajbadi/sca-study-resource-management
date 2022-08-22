<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM students WHERE PERMISSION = 1";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
            getSemester($row['ROLLNO']);
            getBranch($row['ROLLNO']);
            echo '<div class="col-sm-1">'.$row['ROLLNO'].'</div>
            <div class="col-sm-1 firstname" data-id1="'.$row['ROLLNO'].'"contenteditable>'.$row['FIRSTNAME'].'</div>
            <div class="col-sm-1 lastname" data-id2="'.$row['ROLLNO'].'"contenteditable>'.$row['LASTNAME'].'</div>
            <div class="col-sm-2 imagelocation" data-id3="'.$row['ROLLNO'].'"><a href='.$row['IMAGELOCATION'].'>'.$row['IMAGELOCATION'].'</a></div>
            <div class="col-sm-1 " data-id4="'.$row['ROLLNO'].'">'.$branch.'</div>
            <div class="col-sm-1 " data-id5="'.$row['ROLLNO'].'">'.$semester.'</div>
            <div class="col-sm-2 email" data-id6="'.$row['ROLLNO'].'"contenteditable>'.$row['EMAIL'].'</div>
            <div class="col-sm-1 mobnumber" data-id7="'.$row['ROLLNO'].'"contenteditable>'.$row['MOBNUMBER'].'</div>
            <div class="col-sm-1 password" data-id8="'.$row['ROLLNO'].'"contenteditable>'.$row['PASSWORD'].'</div>
            <div class="col-sm-1">
              <div class="row action text-center">
                <div class="col-sm-6">
                <a href="#" class="cc" data-id9='.$row['ROLLNO'].'>
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id10='.$row['ROLLNO'].'>
                  <i class="fa fa-trash" aria-hidden="true"></i>
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

          function getSemester($rollno){
            global $semester;
            $semester = "<select name='semester' class='custom-select semester' data-id5='$rollno'>";
            
            include 'connectdb.php';

            $sql = "SELECT * FROM students WHERE ROLLNO=$rollno";  
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)  
            {  
              while($row = mysqli_fetch_array($result))  
              {
                for ($i=1; $i<=6 ; $i=$i+1) { 
                  if($i == $row["SEMESTER"]){
                    $semester .= '
                      <option value="'.$i.'" selected>'.$i.'</option>
                  ';
                }else{
                  $semester .= '
                      <option value="'.$i.'" >'.$i.'</option>
                  ';
                }
                }
                  
              }
              $semester .= '</select>'; 
            }
          }

          function getBranch($rollno){
            global $branch;
            $branch = "<select name='branch' class='custom-select branch' data-id4='$rollno'>";
            
            include 'connectdb.php';    
            
            $sql = "SELECT * FROM students WHERE ROLLNO=$rollno";  
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)  
            {  
              while($row = mysqli_fetch_array($result))  
              {
                if($row['BRANCH'] == "BCA"){
                    $branch .= '<option value="BCA" selected>BCA</option>';
                }else{
                    $branch .='<option value="BCA">BCA</option>';
                }
                 if($row['BRANCH'] == "MCA"){
                    $branch .= '<option value="MCA" selected>MCA</option>';
                }else{
                    $branch .='<option value="MCA">MCA</option>';
                }
                if($row['BRANCH'] == "BSC"){
                    $branch .= '<option value="BSC" selected>BSC</option>';
                }else{
                    $branch .='<option value="BSC">BSC</option>';
                }
                if($row['BRANCH'] == "MSC"){
                    $branch .= '<option value="MSC" selected>MSC</option>';
                }else{
                    $branch .='<option value="MSC" >MSC</option>';
                } 
              }
              $branch .= '</select>'; 
            }
          }
    ?>