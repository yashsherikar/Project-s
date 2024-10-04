<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{


   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $finder = $_SESSION['user_email'];

   if($pass != $cpass){
      $error[] = 'Password not matched!';
   }
   else
   {
    $sql = "UPDATE `userinfo` SET `password`='$cpass' WHERE email = '$finder' ";

    if ($conn->query($sql) === TRUE) {
        header("location: user_page.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }
     
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reset Password</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
</div>

<div class="form-container">
<div class="container">

   <div class="content">
      <h3><span><?php echo $_SESSION['user_name'] ?></span></h3>
      <br><br>
      
      <form action="" method="post">
      <h3>Reset Password</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="password" required placeholder="Enter your Password" autocomplete="off">
      <input type="text" name="cpassword" required placeholder="Confirm your Password" autocomplete = "off">
      
      <input type="submit" name="submit" value="Reset" class="form-btn">
   </form>

 <br><br>
 <a href="Details.php" class="btn">Back</a>
   </div>
</div>
   

</div>

</body>
</html>