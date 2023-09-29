<?php

$con =  mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'school');
error_reporting(0);
$id= $_GET['id'];
 $q= "DELETE from student WHERE id='$id'";
 $t= mysqli_query($con,$q);
 if($t)
  {
    echo "<script>confirm('record deleted ')</script>";
    ?>
  <meta http-equiv = "refresh" content="0; url= http://localhost/student/display.php"/>
  
  <?php

   
  }
  
  else
  {
    echo "failed to Delete ";
  }
  


?>