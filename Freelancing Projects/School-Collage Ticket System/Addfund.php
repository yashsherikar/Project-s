<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{

   function randomgenrator()
   {
      $randomNumber = rand();
      return $randomNumber;
   }

   $Fund = mysqli_real_escape_string($conn, $_POST['Addfund']);
   $CFund = mysqli_real_escape_string($conn, $_POST['CAddfund']);
   $EmailId = $_SESSION['user_email'];
   $paymenttype = 'credit';
   date_default_timezone_set('Asia/Kolkata');
   $today = date("Y-m-d");
   $currentTime = date('h:i:s');
   $Tid = randomgenrator();


   $select = " SELECT * FROM fund_history WHERE tid = '$Tid'";
   $result = mysqli_query($conn, $select);

   if($Fund != $CFund){
      $error[] = 'Fund not matched!';
   }
   else
   {
      if(mysqli_num_rows($result) > 0)
      {
         $Tid = randomgenrator();
      }
      else
      {
         $insert = "INSERT INTO fund_history VALUES('$Tid','$EmailId','$paymenttype','$Fund','$today','$currentTime')";
         if (mysqli_query($conn, $insert))
         {
            echo "Succesfully insterted";
                     
         }
         else 
         {
            echo "Error updating record: " . mysqli_error($conn);
         }
                  
         $update = "SELECT * FROM funds;";
         $result = mysqli_query($conn, $update);
            
         if (mysqli_num_rows($result) > 0) 
         {
            while($row = mysqli_fetch_assoc($result)) 
            {
               if($row['email'] == $EmailId)
               {
                  echo $EmailId;
                  $Fund = $row['balance'] + $Fund;
                  echo  $Fund;
                  $sql = "UPDATE `funds` SET `balance`= $Fund WHERE email ='$EmailId' ";
                  if(mysqli_query($conn, $sql))
                  {
                     header('location:Details.php');
                  }
                  else 
                  {
                     echo "Error updating record: " . mysqli_error($conn);
                  }
               }
                        
            }
         }
                  
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
   <title>Add Fund</title>

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
      <h3>Add Fund</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="Addfund" required placeholder="enter your fund" autocomplete="off">
      <input type="text" name="CAddfund" required placeholder="confirm your fund" autocomplete = "off">
      
      <input type="submit" name="submit" value="Add Fund" class="form-btn">
   </form>

 <br><br>
 <a href="Details.php" class="btn">Back</a>
   </div>
</div>
   

</div>

</body>
</html>