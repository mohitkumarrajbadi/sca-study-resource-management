<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM subject ORDER BY SID DESC";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
           getBranch($row['BRANCH'],$row['SID']);
           getSemester($row['SEMESTER'],$row['SID']);
          getFaculty($row['FID'],$row['SID']);
            echo '
            <div class="col-sm-1">'.$row['SID'].'</div>
            <div class="col-sm-2 subjcode" data-id1="'.$row['SID'].'"contenteditable>'.$row['SUBJCODE'].'</div>
            <div class="col-sm-2 ">'.$faculty.'</div>
            <div class="col-sm-2 " >'.$branch.'</div>
            <div class="col-sm-1 " >'.$semester.'</div>
            <div class="col-sm-2 subjname" data-id5="'.$row['SID'].'"contenteditable>'.$row['SUBJNAME'].'</div>
            <div class="col-sm-2">
              <div class="row action text-center">
                <div class="col-sm-6">
                <a href="#" class="cc" data-id6='.$row['SID'].'>
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id7='.$row['SID'].'>
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


          function getBranch($bran,$id){
            global $branch;
            $branch = '<select class="custom-select branch" data-id3="'.$id.'">';
            if($bran == "BCA"){
                $branch .= '<option value="BCA" selected>BCA</option>';
            }else{
                $branch .= '<option value="BCA" >BCA</option>';
            }
            if($bran == "MCA"){
                $branch .= '<option value="MCA" selected>MCA</option>';
            }else{
                $branch .= '<option value="MCA" >MCA</option>';
            }
            if($bran == "BSC"){
                $branch .= '<option value="BSC" selected>BSC</option>';
            }else{
                $branch .= '<option value="BSC" >BSC</option>';
            }
            if($bran == "MSC"){
                $branch .= '<option value="MSC" selected>MSC</option>';
            }else{
                $branch .= '<option value="MSC" >MSC</option>';
            }
            $branch .= '</select>';
          }


          function getSemester($sem,$id){
            global $semester;
            $semester = '<select class="custom-select semester" data-id4="'.$id.'">';
            if($sem == "1"){
                $semester .= '<option value="1" selected>1</option>';
            }else{
                $semester .= '<option value="1" >1</option>';
            }
            if($sem == "2"){
                $semester .= '<option value="2" selected>2</option>';
            }else{
                $semester .= '<option value="2" >2</option>';
            }
            if($sem == "3"){
                $semester .= '<option value="3" selected>3</option>';
            }else{
                $semester .= '<option value="3" >3</option>';
            }
            if($sem == "4"){
                $semester .= '<option value="4" selected>4</option>';
            }else{
                $semester .= '<option value="4" >4</option>';
            }
            if($sem == "5"){
                $semester .= '<option value="5" selected>5</option>';
            }else{
                $semester .= '<option value="5" >5</option>';
            }
            if($sem == "6"){
                $semester .= '<option value="6" selected>6</option>';
            }else{
                $semester .= '<option value="6" >6</option>';
            }
            $semester .= '</select>';
          }


          function getFaculty($fid,$sid){
                include 'connectdb.php';
                global $faculty ;
                $faculty='<select class="custom-select faculty" data-id2="'.$sid.'">';
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