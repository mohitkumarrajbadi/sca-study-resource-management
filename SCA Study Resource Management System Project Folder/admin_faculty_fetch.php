<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM faculty ORDER BY FID DESC";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
           
            echo '<div class="col-sm-1">'.$row['FID'].'</div>
            <div class="col-sm-2 firstname" data-id1="'.$row['FID'].'"contenteditable>'.$row['FIRSTNAME'].'</div>
            <div class="col-sm-2 lastname" data-id2="'.$row['FID'].'"contenteditable>'.$row['LASTNAME'].'</div>
            <div class="col-sm-2 email" data-id3="'.$row['FID'].'"contenteditable>'.$row['EMAIL'].'</div>
            <div class="col-sm-1 mobnumber" data-id4="'.$row['FID'].'"contenteditable>'.$row['MOBNUMBER'].'</div>
            <div class="col-sm-1 password" data-id5="'.$row['FID'].'"contenteditable>'.$row['PASSWORD'].'</div>
            <div class="col-sm-2 imagelocation" data-id6="'.$row['FID'].'"><a href='.$row['IMAGELOCATION'].'>'.$row['IMAGELOCATION'].'</a></div>
            <div class="col-sm-1">
              <div class="row text-center">
                <div class="col-sm-6">
                <a href="#" class="cc" data-id7='.$row['FID'].'>
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id8='.$row['FID'].'>
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

    ?>