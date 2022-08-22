<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM pdffile ORDER BY FLID DESC";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
          getSubject($row['SID'],$row['FLID']);
          getFaculty($row['FID'],$row['FLID']);
            echo '<div class="col-sm-2">'.$row["FLID"].'</div>
            <div class="col-sm-2">'.$subject.'</div>
            <div class="col-sm-2">'.$faculty.'</div>
            <div class="col-sm-2 filetitle" data-id3="'.$row["FLID"].'" contenteditable>'.$row["FILETITLE"].'</div>
            <div class="col-sm-2 filelocation"><a href="'.$row["FILELOCATION"].'">'.$row["FILELOCATION"].'</a></div>
            <div class="col-sm-2">
              <div class="row action text-center">
                <div class="col-sm-6">  
                <a href="#" class="cc" data-id4='.$row['FLID'].'>
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id5='.$row['FLID'].'>
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


          function getSubject($sid,$id){
              include 'connectdb.php';
                global $subject ;
                $subject='<select class="custom-select subject" data-id1="'.$id.'">';
                $sql = "SELECT * FROM subject";
                $result = mysqli_query($conn, $sql);  
                if(mysqli_num_rows($result) > 0) {  
                while($row = mysqli_fetch_array($result))  
                  {
                    if($sid == $row["SID"]){
                        $subject .= '
                          <option value="'.$row["SID"].'" selected>'.$row["SID"]." ".$row["SUBJNAME"].'</option>
                      ';
                    }else{
                      $subject .= '
                          <option value="'.$row["SID"].'" >'.$row["SID"]." ".$row["SUBJNAME"].'</option>
                      ';
                    }
                    }
                    $subject .= '</select>';
                  }        
                }


          function getFaculty($fid,$flid){
                include 'connectdb.php';
                global $faculty ;
                $faculty='<select class="custom-select faculty" data-id2="'.$flid.'">';
                $sql = "SELECT * FROM faculty ";
                $result = mysqli_query($conn, $sql);  
                if(mysqli_num_rows($result) > 0) {  
                while($row = mysqli_fetch_array($result))  
                  {
                    $name = $row["FIRSTNAME"]." ".$row["LASTNAME"];
                    if($fid == $row["FID"]){
                        $faculty .= '
                          <option value="'.$row["FID"].'" selected>'.$row["FID"]." ".$name.'</option>
                      ';
                    }else{
                      $faculty .= '
                          <option value="'.$row["FID"].'" >'.$row["FID"]." ".$name.'</option>
                      ';
                    }
                    }
                    $faculty .= '</select>';
                  }
             }


    ?>