
<html>
    <head>
        <title>Display All Records</title>
        <style>
            body
            {
                background: #D071f9;
            }
            table{
                background:white;
            }
             a
            {
              text-decoration: none;
              border:2px solid green;
              background:green;
              color:white;
              margin-left:13px;
              border-radius:3px;
              font-weight:bold;
           
            }
        </style>
    </head>
</html>



<?php

$con =  mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'school');
error_reporting(0);
$q="SELECT * FROM student";
$t= mysqli_query($con,$q);
$total = mysqli_num_rows($t);




if($total != 0)
{
    ?>
    <h2 align="center" ><mark>Displaying All Records</mark></h2>
    <table align="center" border="1" cellspacing="7" width="85%">
        <tr>
        <th width="5%">Id</th>
        <th width="10%">Full Name</th>
        <th width="10%">Class Name</th>
        <th width="10%">Gender</th>
        <th width="15%">Email Id</th>
        <th width="10%">Phone Number</th>
        <th width="15%">Address</th>
        <th width="10%">operations</th></tr>



    <?php
  while($result = mysqli_fetch_assoc($t))
  {
    echo " <tr>
              <td>".$result['id']."</td>
              <td>".$result['fullname']."</td>
              <td>".$result['class']."</td>
              <td>".$result['gender']."</td>
              <td>".$result['email']."</td>
              <td>".$result['phone']."</td>
              <td>".$result['address']."</td>
              <td><a href='update.php?id= $result[id] '>Update</a>
              <a href='delete.php?id= $result[id] '>Delete</a></td>
           </tr>";
  }
}
else{
    echo "No records found";
  }
?>
</table>
