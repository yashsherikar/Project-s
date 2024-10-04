<?php

@include 'config.php';

session_start();
$data = "";
$Name = "";
$desc = "";

if(isset($_GET["data"]))
{
   $data = $_GET["data"];

   if($data != "")
   {
      $select = " SELECT * FROM templatelist WHERE Id = '$data'";
      $result = mysqli_query($conn, $select);
      $row = mysqli_num_rows($result);
      if( mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result))
            {
               $Name = $row['Name'];
               $desc  = $row['Description'];

            }
         $error[] = 'Template already exist!';

      }
    
      
   }
}
    

if(isset($_POST['submit']))
{
   $name = $_POST['name'];
   $Desc = $_POST['Desc'];
   
   $password_length = 12;
   $random_bytes = random_bytes($password_length / 2);
   $password = bin2hex($random_bytes);

   $flag = 1;
   $email = $_SESSION['user_email'];

   if($data != "")
   {
      $qur = "UPDATE `templatelist` SET `Name`='$name',`Description`= '$Desc' WHERE Id = '$data'";
      mysqli_query($conn, $qur);
      header('location:Template.php');
   }
else
{  

      $select = " SELECT * FROM templatelist WHERE Name = '$name' AND email = '$email' AND Flag = 1 AND Authentication_token = '$password'";
   
      $result = mysqli_query($conn, $select);
   
      if(mysqli_num_rows($result) > 0){
         
         $error[] = 'Template already exist!';
   
      }
      else{

         $insert = "INSERT INTO `templatelist` VALUES ('','$name','$email','$Desc','$password','$flag')";
         mysqli_query($conn, $insert);
         header('location:Template.php');
           
         
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
   <title>Add Template</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
</div>

<div class="form-container" >
<div class="container">

   <div class="content">
      <br><br>
      
      <form action="" method="post">
      <h3>Add Template</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter Template Name"  value="<?= $Name;?>" autocomplete="off">
      <!-- <input type="textarea"> -->
    
        <input  type = "text" name="Desc" required placeholder="Enter Description"  value="<?= $desc;?>" autocomplete="off" style = "height : 130px">
        <input type="submit" name="submit" value="Save Template" class="form-btn">

   </form>

 <br><br>
 <a href="Template.php" class="btn">Back</a>
   </div>
</div>
   

</div>

</body>
</html>