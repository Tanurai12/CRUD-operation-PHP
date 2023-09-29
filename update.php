<?php
$con =  mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'school');
$id= $_GET['id'];
$q="SELECT * FROM student WHERE id='$id'";
$t= mysqli_query($con,$q);

$result = mysqli_fetch_assoc($t);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="studentstyle.css">
</head>
<body>
    <form method="post" action="#" >
        <div class="container">
    <H2 class="title">Update Students Details</H2><br><br>
    <div class="form">
        <div class="input-field">
      <label> Name:</label> <input type="text" value=<?php echo $result['fullname']; ?> name="studentname" class="input" required><br><br><br>
      </div>
      <div class="input-field">
      <label> Class Name:</label> <input type="text" value=<?php echo $result['class'];?> name="classname" class="input" required><br><br><br>
       </div>

      <div class="input-field">
            <label>Gender: </label> <select name="gender" value=<?php echo $result['gender']; ?> required>
                
                <option value="not selected">Select</option>
                
                <option value="male"
                <?php
                  if($result['gender'] =='male')
                  {
                    echo "selected";
                  }

                ?>
                
                >Male</option>
                
                <option value="female"
                <?php
                  if($result['gender'] =='female')
                  {
                    echo "selected";
                  }

                ?>
                >Female</option>

            </select>  <br><br><br>
        </div>

            <div class="input-field">
            <label>Email Address: </label> <input type="text" value=<?php echo $result['email']; ?> name="email" class="input" required><br><br><br>
             </div>
            <div class="input-field">
            <label>Phone Number: </label> <input type="text" value=<?php echo $result['phone']; ?>  name="phone" class="input" required><br><br><br>
             </div>
            <div class="input-field">
            <label>Address: </label> <textarea type="text" name="address" class="input" cols="23" rows="4" required> <?php  echo $result['address']; ?> </textarea><br><br><br>
            </div>
            <div class="input-field" required>
            <p><input type="checkbox"  class="checkbox" required>Agree with terms and conditions.</p><br>
             </div>
           <div class="register-btn"> <input type="submit" value="Update" class="reg" name="update"></div>
            
    </form>
</div>
</div> 
</body>

</html>
<?php
  if(isset($_POST['update']))
  {
    $name     = $_POST['studentname'];//$name---> it is simple var can be anything that u want ..and  $_POST['name'];--->it is name should be same as nameattribut of input fun
    $class    = $_POST['classname'];
    $gender   = $_POST['gender'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $addrress = $_POST['address'];

    
   $con =  mysqli_connect('localhost', 'root');
   mysqli_select_db($con, 'school');
   $q = "UPDATE student set fullname='$name', class='$class',gender='$gender',email='$email' ,phone= '$phone ', address='$addrress' WHERE id='$id'";
   $t= mysqli_query($con,$q);
  if($t)
  {
    echo "<script>alert('Record updated')</script>";
    ?>
  <meta http-equiv = "refresh" content="0; url= http://localhost/student/display.php"/>
  
  <?php

  }
  
  else
  {
    echo "failed to update ";
  }
  }



?>
