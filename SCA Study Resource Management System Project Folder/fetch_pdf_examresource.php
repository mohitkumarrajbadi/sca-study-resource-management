<?php

//fetch_pdf_resource.php

include 'connectdb.php';

ob_start();

$output = '';
  
  if(isset($_POST["query"]))
  {
       $search = mysqli_real_escape_string($conn, $_POST["query"]);

       getSubject($search);
       
       if (empty($sid)) {
           $query = "
          SELECT * FROM examfile 
          WHERE EXAMTITLE LIKE '%".$search."%'
          OR YEAR LIKE '%".$search."%'
         ";
       }else{
          $query = "
          SELECT * FROM examfile 
          WHERE EXAMTITLE LIKE '%".$search."%'
          OR SID IN (".implode(',', $sid).")
          OR YEAR LIKE '%".$search."%'
         ";
       }
       

  }
  else
    {
       $query = "
        SELECT * FROM examfile ORDER BY UPDATEDATE DESC
       ";
    }


if($result = mysqli_query($conn, $query)){
    if(mysqli_num_rows($result) > 0)
      {
        $trigger = 1;
        $output .= '<div class="card-columns">';
         while($row = mysqli_fetch_array($result))
         {
            getSubjectDetails($row['SID']);

            $output .= '
                  <div class="card">
                    <div class="card-body text-center">
                      <h4 class="card-title"><i class="fa fa-file-pdf-o"></i></h4>
                      <p class="card-text">'.$row['EXAMTITLE'].'</p>
                      <p class="card-text">Subject : '.$subject.'</p>
                      <p class="card-text">Branch : '.$branch.' &nbsp Semester : '.$semester.'</p>
                      <p class="card-text">Year : '.$row['YEAR'].'</p>
                      <a href="'.$row['FILELOCATION'].'" class="btn btncard" target="_blank">View</a>
                    </div>
                  </div>
          ';
          
          if ($trigger%3 == 0) {
            $output .= '</div><div class="card-columns">';
          }
          $trigger++;
         }
       echo $output;
      }
      else
      {
        echo 'Data Not Found';
      }
}else{
  echo "Data Not Found";
}




function getSubject($search){

    global $sid;
    $sid = array();

    include 'connectdb.php';
    
    $query = "
      SELECT * FROM subject WHERE 
      SUBJCODE LIKE '%".$search."%' 
      OR BRANCH LIKE '%".$search."%' 
      OR SEMESTER LIKE '%".$search."%' 
      OR SUBJNAME LIKE '%".$search."%'
    ";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
       while($row = mysqli_fetch_array($result)){
          array_push($sid, $row['SID']);
       }
     }

}





function getSubjectDetails($sid){

    global $branch,$semester,$subject;

    include 'connectdb.php';
    
    $query = "SELECT * FROM subject WHERE SID=".$sid;

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
       while($row = mysqli_fetch_array($result)){
          $branch = $row['BRANCH'];
          $semester = $row['SEMESTER'];
          $subject = $row['SUBJNAME'];
       }
     } 
}


ob_end_flush();


?>

