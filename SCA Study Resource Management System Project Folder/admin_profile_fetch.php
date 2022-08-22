<?php
        include 'connectdb.php';

        $sql = "SELECT * FROM admin ORDER BY AID DESC";
        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  
          {   
           
            echo '<div class="col-sm-1">'.$row['AID'].'</div>
            <div class="col-sm-2 firstname" data-id1="'.$row['AID'].'"contenteditable>'.$row['FIRSTNAME'].'</div>
            <div class="col-sm-2 lastname" data-id2="'.$row['AID'].'"contenteditable>'.$row['LASTNAME'].'</div>
            <div class="col-sm-2 email" data-id3="'.$row['AID'].'"contenteditable>'.$row['EMAIL'].'</div>
            <div class="col-sm-1 mobnumber" data-id4="'.$row['AID'].'"contenteditable>'.$row['MOBNUMBER'].'</div>
            <div class="col-sm-1 password" data-id5="'.$row['AID'].'"contenteditable>'.$row['PASSWORD'].'</div>
            <div class="col-sm-2 imagelocation" data-id6="'.$row['AID'].'"><a href='.$row['IMAGELOCATION'].'>'.$row['IMAGELOCATION'].'</a></div>
            <div class="col-sm-1">
              <div class="row text-center">
                <div class="col-sm-6">
                <a href="#" class="cc" data-id7='.$row['AID'].'>
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="fbn" data-id8='.$row['AID'].'>
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