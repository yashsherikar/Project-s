<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   if(isset($_POST['name']) )
   {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      
   }
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
 
   if(isset($_POST['user_type']) )
   {
      $user_type = $_POST['user_type'];
      
   }
 $flags = 1;
   $select = " SELECT * FROM userinfo WHERE email = '$email' AND  password = '$pass'  AND  Flag = $flags";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         // $_SESSION['admin_email'] = $row['email'];

         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         // echo $row['email'];
         header('location:user_page.php');

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
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email" autocomplete = "off">
      <input type="password" name="password" required placeholder="enter your password" autocomplete = "off">
      <input type="submit" name="submit" value="login now" class="form-btn">
   </form>

</div>

</body>
</html>