<?php

@include 'config.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = "p@123";
   $cpass = "p@123";
   $user_type = "user";
   // $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];


   //Import PHPMailer classes into the global namespace
   //These must be at the top of your script, not inside a function


   //Load Composer's autoloader
   require 'PHPMailer/Exception.php';
   require 'PHPMailer/PHPMailer.php';
   require 'PHPMailer/SMTP.php';


   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);

   try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'yasherikar20@gmail.com';                     //SMTP username
      $mail->Password   = 'fehiznxyalvavyap';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('yasherikar20@gmail.com', 'Mailer');
      $mail->addAddress("$email", 'Joe User');     //Add a recipient
   


      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'User Id Password';
      $mail->Body    = "User Name :- <b>$email</b> <br> User Name :- <b>$cpass</b>";

      $mail->send();
      echo 'Message has been sent';
   } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }

   $Cardnum = mysqli_real_escape_string($conn, $_POST['cardnum']);
   $Location = mysqli_real_escape_string($conn, $_POST['from']);
   $Destination = mysqli_real_escape_string($conn, $_POST['destination']);
   $Amount = mysqli_real_escape_string($conn, $_POST['rupees']);
   $flag = 1;

   $select = " SELECT * FROM userinfo WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{

        
            $balance = 0;
            $insert = "INSERT INTO userinfo VALUES('$name','$email','$pass','$user_type','$Cardnum','$Location','$Destination','$Amount','$flag')";
            mysqli_query($conn, $insert);
                
            if($user_type == 'user')
            {
               $Balanceinsert = "INSERT INTO `funds`(`id`, `email`, `balance`) VALUES ('','$email','$balance')";
               mysqli_query($conn, $Balanceinsert);
               header('location:index.php');

            }
          

            header('location:index.php');
   
         

      }
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
   
<div class="form-container">

   <form action="" method="post"  autocomplete = "off">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <!-- <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password"> -->
      <input type="text" name="cardnum" required placeholder="Enter your Card Number">
      <input type="text" name="from" required placeholder="Enter Your Location">
      <input type="text" name="destination" required placeholder="Enter Your Destination">
      <input type="text" name="rupees" required placeholder="Enter The Rupees">
      <!-- <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select> -->
      <input type="submit" name="submit" value="register now" class="form-btn">
      <!-- <p style ="font-size : 18px;">don't have an Admin account? <a href="AdminRegister.php">Admin Registration</a></p> -->
   </form>

</div>

</body>
</html>