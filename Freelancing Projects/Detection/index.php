<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   
   $email = $_POST['email'];
   $pass = $_POST['password'] ;
   $pass = md5($pass);
 

   
   
   $select = " SELECT * FROM userinfo WHERE email = '$email' AND  password = '$pass'  ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         // echo $row['email'];
         header('location:Template.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo">LOGIBIT</a>

        <ul class="nav_items">
          <li class="nav_item">
           
            <a href="https://www.logibitsoftware.com/" class="nav_link">Visit_Us</a>
          </li>
        </ul>

      </nav>
    </header>

   
<div class="form-container" style = " width: 100%; background-image: url('img/bg.jpg'); background-size: cover;
  background-position: center;">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter Email" autocomplete = "off">
      
      <input type="password" name="password" required placeholder="enter your password" autocomplete = "off">
      
      <input type="submit" name="submit" value="login now" class="form-btn">
      <br><br>

      <div class="login_signup">Don't have an account? <a href="register_form.php" id="signup">Register</a></div>
   </form>

</div>

</body>
</html>