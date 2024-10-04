<?php

@include 'config.php';

session_start();


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
      <a href="admin_page.php" class="btn">Back</a>
    
      <br><br>

  

      <!-- //<h3><span><?php echo $_SESSION['user_name'] ?></span></h3> -->
      <h1>User Details</h1>

      <br>
      <table>
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Cardnumber</th>
          <th>Location</th>
          <th>Destionation</th>
          <th>Remaining Balance</th>
          <th>Status</th>

        </tr>
        <?php
            $sql = "SELECT * FROM userinfo where user_type = 'user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                   
          
        ?>
        <tr>
          <td><?php static $sr = 1;
          echo $sr;
          $sr++; ?></td>
          <td class = "names"><?php echo $row['name']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['Cardnum']?></td>
          <td><?php echo $row['Location']?></td>
          <td><?php echo $row['Destination']?></td>
          <td><?php echo $row['Amount']?></td>
          <td><button><a href = "./action.php?data=<?php echo $row['email'] ?>"><?php if(($row['Flag']) == 1){ echo "Block";}  
           elseif(($row['Flag']) == 0){ echo "UnBlock";}
          ?></a></button></td>
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