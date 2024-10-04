<?php

@include 'config.php';

session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <h1>User Details</h1>


<br>
<table>
  <tr>
    <th>Sr.No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone No.</th>
    <th>Address</th>
    <th>Payment Mode</th>
    <th>Product</th>
    <th>Amount_paid</th>

  </tr>
  <?php
      $sql = "SELECT * FROM  orders";
      $result = mysqli_query($conn, $sql);
      
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
             
    
  ?>
  <tr>
    <td><?php static $sr = 1;
    echo $sr;
    $sr++; ?></td>
    <td ><?php echo $row['name']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['phone']?></td>
    <td><?php echo $row['address']?></td>
    <td><?php echo $row['pmode']?></td>
    <td><?php echo $row['products']?></td>
    <td><?php echo $row['amount_paid']?></td>

  </tr>
 <?php
      }
   } 
  
 ?> 

</table>
<br><br>
      <a href="login_form.php" class="btn">login</a>
      <a href="logout.php" class="btn">logout</a>

   </div>

</div>

</body>
</html>