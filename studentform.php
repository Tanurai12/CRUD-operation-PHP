<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link rel="stylesheet" type="text/css" href="studentstyle.css">
</head>
<body>
    <form method="post" action="studentform.php" >
        <div class="container">
    <H2 class="title">Registration Page</H2><br><br>
    <div class="form">
        <div class="input-field">
      <label> Name:</label> <input type="text" name="studentname" class="input" required><br><br><br>
      </div>
      <div class="input-field">
      <label> Class Name:</label> <input type="text" name="classname" class="input" required><br><br><br>
       </div>

      <div class="input-field">
            <label>Gender: </label> 
           
            <input type="radio" name="gender" value="male" required> <label>male </label> 
            <input type="radio" name ="gender" value="female" required> <label>female </label> 
            <br><br><br>
        </div>

            <div class="input-field">
            <label>Email Address: </label> <input type="text" name="email" class="input" required><br><br><br>
             </div>
            <div class="input-field">
            <label>Phone Number: </label> <input type="text" name="phone" class="input" required><br><br><br>
             </div>
            <div class="input-field">
            <label>Address: </label> <textarea type="text" name="address" class="input" cols="23" rows="4" required></textarea><br><br><br>
            </div>
            <div class="input-field" required>
            <p><input type="checkbox"  class="checkbox" required>Agree with terms and conditions.</p><br>
             </div>
           <div class="register-btn"> <input type="submit" value="Register" class="reg" name="reg"></div>
            
    </form>
</div>
</div> 
</body>

</html>

<?php
  if(isset($_POST['reg']))
  {
    $name     = $_POST['studentname'];//$name---> it is simple var can be anything that u want ..and  $_POST['name'];--->it is name should be same as nameattribut of input fun
    $class    = $_POST['classname'];
    $gender   = $_POST['gender'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $addrress = $_POST['address'];

    if($name !=" " && $class !=" " &&  $gender  !=" " &&   $email !=" " &&   $phone !=" " &&    $addrress !=" " )
    {
   $con =  mysqli_connect('localhost', 'root');
   mysqli_select_db($con, 'school');
   $q = " INSERT INTO student(fullname,class,gender,email,phone,address) VALUES ('$name', '$class' , '$gender', '$email' , $phone ,  '$addrress' )";
   $t= mysqli_query($con,$q);
  if($t)
  {
    echo "<script>alert('Data inserted')</script>";
  }
  else
  {
    echo "failed ";
  }
  }


  else
  {
   echo "<script>'fields are empty'</script>";
  }

  }

?>