<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM examfile ORDER BY EID DESC";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
          getSubject($row['SID'],$row['EID']);
          getYear($row['YEAR'],$row['EID']);
          getExam($row['EXAMTITLE'],$row['EID']);

            echo '<div class="col-sm-2">'.$row["EID"].'</div>
            <div class="col-sm-2">'.$subject.'</div>
            <div class="col-sm-2">'.$years.'</div>
            <div class="col-sm-2">'.$examtitle.'</div>
            <div class="col-sm-2 filelocation"><a href="'.$row["FILELOCATION"].'">'.$row["FILELOCATION"].'</a></div>
            <div class="col-sm-2">
              <div class="row action text-center">
                <div class="col-sm-6">  
                <a href="#" class="cc" data-id4='.$row['EID'].'>
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id5='.$row['EID'].'>
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
                $sql = "SELECT * FROM subject ";
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


          function getYear($year,$EID){
                global $years ;
                $years='<select class="custom-select year" data-id2="'.$EID.'">';
                
                  for ($i=2013; $i<=2020 ; $i++) { 
                      if ($year == $i) {
                        $years .= '<option value='.$i.' selected>'.$i.'</option>';
                      }else{
                        $years .= '<option value='.$i.'>'.$i.'</option>';
                      }
                  }
                $years .= '</select>';
             }


             function getExam($exam,$EID){
                global $examtitle;
                $examtitle='<select class="custom-select examtitle" data-id3="'.$EID.'">';
                
                  if ($exam == "Mid Sem") {
                    $examtitle .= '<option value = "Mid Sem" selected>Mid Sem</option>';
                  }else{
                    $examtitle .= '<option value = "Mid Sem">Mid Sem</option>';
                  }

                  if ($exam == "End Sem") {
                    $examtitle .= '<option value = "End Sem" selected>End Sem</option>';
                  }else{
                    $examtitle .= '<option value = "End Sem">End Sem</option>';
                  }
                  
                $examtitle .= '</select>';
             }




    ?>