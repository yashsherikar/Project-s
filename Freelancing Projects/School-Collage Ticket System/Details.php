<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Details</title>

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<div class="container">

   <div class="content">
   <!-- <a href ="user_page.php"><i style="font-size:24px; color: red;float:right;cursor:pointer;" class="fa">&#xf00d;</i></a> -->
      <a href="user_page.php" class="btn">Back</a>
      <a href="Addfund.php" class="btn">Add Balance</a>
      
   <?php
            $emails = $_SESSION['user_email'];
            $sql = "SELECT * FROM funds where email = '$emails'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
               while($row = mysqli_fetch_assoc($result)) {
                   
                   echo "<h4>Remaining Balance Is :  " .$row['balance']."</h4>";   
      
         } 
      }?>
      <br><br>

  

      <!-- //<h3><span><?php echo $_SESSION['user_name'] ?></span></h3> -->
      <h1>Your Details</h1>

      <br>
      <table>
        <tr>
          <th>Sr.No</th>
          <th>Transation Id</th>
          <th>Type</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
        <?php
            $sql = "SELECT * FROM fund_history where useremail = '$emails' ORDER BY Dates,Times";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                   
          
        ?>
        <tr>
          <td><?php static $sr = 1;
          echo $sr;
          $sr++; ?></td>
          <td><?php echo $row['tid']?></td>
          <td><?php echo $row['type']?></td>
          <td><?php echo $row['amount']?></td>
          <td><?php echo $row['Dates']?></td>
          <td><?php echo $row['Times']?></td>
        </tr>
       <?php
            }
         } 
        
       ?> 
      
    </table>

 <br>
 
     
   </div>

</div>

</body>
</html>