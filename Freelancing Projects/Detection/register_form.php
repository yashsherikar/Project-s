<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name =  $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['password'] ;
   $pass = md5($pass);
 
   $cpass = $_POST['cpassword'];
   $cpass = md5($cpass);
 


   if($pass == $cpass)
   {
      $decpass = $_POST['cpassword'];
      $user_type = "user";
      $flag = 1;

      $password_length = 12;
      $random_bytes = random_bytes($password_length / 2);
      $password = bin2hex($random_bytes);

      $select = " SELECT * FROM userinfo WHERE email = '$email' AND Authentication_token = '$password'";
   
      $result = mysqli_query($conn, $select);
   
      if(mysqli_num_rows($result) > 0){
   
         $error[] = 'user already exist!';
   
      }else{
   
         $balance = 0;
         $insert = "INSERT INTO userinfo VALUES('$name','$email','$cpass','$user_type','$password','$flag')";
         mysqli_query($conn, $insert);
         $Insertuser = "INSERT INTO `userdetails` VALUES ('','$name','$email','$decpass','1')";
         mysqli_query($conn, $Insertuser);
         header('location:index.php');
         
      }
   
   }
   else
   {
      $error[] = 'Password Not Match!';
   }
  
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo">LOGIBIT</a>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="#" class="nav_link">Home</a>
            <a href="#" class="nav_link">Product</a>
            <a href="#" class="nav_link">Services</a>
            <a href="#" class="nav_link">Contact</a>
          </li>
        </ul>

      </nav>
    </header>
<div class="form-container"  style = " width: 100%; background-image: url('img/bg.jpg'); background-size: cover;
  background-position: center;">

   <form action="" method="post"  autocomplete = "off">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password" autocomplete = "off">
      <input type="password" name="cpassword" required placeholder="Conform your password" autocomplete = "off">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <br><br>
      <div class="login_signup">Already have an account? <a href="index.php" id="signup">Login</a></div>

   </form>

</div>

</body>
</html>