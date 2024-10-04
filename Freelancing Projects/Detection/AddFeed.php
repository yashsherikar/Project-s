<?php

@include 'config.php';

session_start();
$data = "";
$Name = "";
$Pin = "";


if(isset($_GET["data1"]))
{
   $data = $_GET["data1"];

   if($data != "")
   {
      $select = " SELECT * FROM Feed WHERE Id = '$data'";
      $result = mysqli_query($conn, $select);
      $row = mysqli_num_rows($result);
      if( mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result))
            {
               $Name = $row['Name'];
               $Pin  = $row['Pinnumber'];

            }
         // $error[] = 'Template already exist!';

      }
    
      
   }
}
$datas = "";

if(isset($_GET["datas"]))
{
   $datas = $_GET["datas"];

}    
$_SESSION['Iddata'] = "$datas";

if(isset($_POST['submit']))
{
   $name = $_POST['name'];
   $Pin = $_POST['Pinnum'];
   $selectOption = $_POST['taskOption'];

   $password_length = 12;
   $random_bytes = random_bytes($password_length / 2);
   $password = bin2hex($random_bytes);   $flag = 1;
   $email = $_SESSION['user_email'];

   if($data != "")
   {
      $qur = "UPDATE `Feed` SET `Name`='$name',`Pinnumber`= '$Pin',`Type`='$selectOption' WHERE Id = '$data'";
      mysqli_query($conn, $qur);

      $sql = "SELECT * FROM Feed WHERE Id = '$data'";
      $result = mysqli_query($conn, $sql);
      
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) 
      {
         $Iddata = $row['GetId'];
         $_SESSION['Iddata'] = "$Iddata";       

      }}
      header('location:Feed.php');
   }
else
{  

      $select = " SELECT * FROM Feed WHERE Name = '$name' AND email = '$email' AND Flag = 1 AND Authentication_token = '$password'";
   
      $result = mysqli_query($conn, $select);
   
      if(mysqli_num_rows($result) > 0){
         
         $error[] = 'Template already exist!';
   
      }
      else{

            $insert = "INSERT INTO `Feed` VALUES ('','$name','$email','$Pin','$selectOption','$password','$flag','$datas')";
            mysqli_query($conn, $insert);
            $_SESSION['Iddata'] = "$datas";       
           header('location:Feed.php');
           
         
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
   <title>Add Feed</title>

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
      <h3>Add Feed</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter Feed Name"  value="<?= $Name;?>" autocomplete="off">
    <input  type = "text" name="Pinnum" required placeholder="Enter Pin Number"  value="<?= $Pin;?>" autocomplete="off">
    <select name="taskOption">
        <option value="Input">Input</option>
        <option value="Output">Output</option>
    </select>
        <input type="submit" name="submit" value="Save Feed" class="form-btn">

   </form>

 <br><br>
 <a href="Template.php" class="btn">Back</a>
   </div>
</div>
   

</div>

</body>
</html>