<?php  

  session_start();
  include 'connectdb.php';
  $fid = $_SESSION['fid'];
   
 $output = '';  
 $sql = "SELECT * FROM pdffile WHERE FID=$fid ORDER BY FLID DESC";  
 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="data">  
                <tr id="data">  
                     <th width="20%">SUBJECT NAME</th>  
                     <th width="10%">BRANCH</th>  
                     <th width="10%">SEMSETER</th>  
                     <th width="40%">FILE TILE</th>
                     <th width="40%">FILE LOCATION</th>
                     <th width="10%">UPDATE</th>
                     <th width="10%">DELETE</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
          getDetails($row['SID']);
          getSelect($row['FID'],$row['FLID'],$subjname);
           $output .= '  
                <tr>  
                     <td class="sid">'.$subject.'</td>  
                     <td class="sid" data-id1="'.$row["FLID"].'" >'.$branch.'</td>  
                     <td class="fid" data-id2="'.$row["FLID"].'" >'.$semester.'</td>
                     <td class="filetitle" data-id3="'.$row["FLID"].'" contenteditable>'.$row["FILETITLE"].'</td>
                     <td class="filelocation" data-id4="'.$row["FLID"].'"><a href="'.$row["FILELOCATION"].'" style ="color:black">'.$row["FILELOCATION"].'</a></td>  
                      <td>
                      <button type="button" name="update_btn" data-id5="'.$row["FLID"].'" class="btn btn-xs btn-success update_btn"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                      </td>
                      <td>
                        <button type="button" name="delete_btn" data-id6="'.$row["FLID"].'" class="btn btn-xs btn-danger btn_delete"><i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                      </td>
                </tr>  
            ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                      <td colspan="7">Data not Found</td>  
                  </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  

 function getDetails($sid){
  
  include 'connectdb.php';

  $sql = "SELECT * FROM subject WHERE SID=$sid";  
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0)  
    {  
      while($row = mysqli_fetch_array($result))  
      {
        global $subjname;
        global $branch;
        global $semester;
        $subjname = $row['SUBJNAME'];
        $branch = $row['BRANCH'];
        $semester = $row['SEMESTER'];
      } 
    }
  }


  function getSelect($fid,$flid,$subjname){
    
    include 'connectdb.php';

    global $subject;
    $subject = "<select name='subject' class='custom-select' data-id7='$flid'>";    
    $sql = "SELECT * FROM subject WHERE FID=$fid";  
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)  
    {  
      while($row = mysqli_fetch_array($result))  
      {
          if($subjname == $row["SUBJNAME"]){
            $subject .= '
              <option value="'.$row["SID"].'" selected>'.$row["SUBJNAME"].'</option>
          ';
        }else{
          $subject .= '
              <option value="'.$row["SID"].'" >'.$row["SUBJNAME"].'</option>
          ';
        }
      }
      $subject .= '</select>'; 
    }
  }

 ?>