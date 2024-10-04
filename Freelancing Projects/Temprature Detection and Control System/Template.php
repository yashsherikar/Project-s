<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:index.php');
}
$email = $_SESSION['user_email'];
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
   
<div class="container" style = " width: 100%; background-image: url('img/bg.jpg'); background-size: cover;
  background-position: center;">

   <div class="content">
   <!-- <a href ="user_page.php"><i style="font-size:24px; color: red;float:right;cursor:pointer;" class="fa">&#xf00d;</i></a> -->
      <a href="index.php" class="btn">Logout</a>
      <a href="AddTemp.php" class="btn">Add Template</a>
      
      <br><br>

        <h1>Template List</h1>

      <br>
      <table>
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Description</th>
          <th >Action's</th>

        </tr>
        <?php
         // echo "$name";
            $sql = "SELECT * FROM templatelist WHERE Flag = '1' AND email = '$email'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                   
          
        ?>
        <tr>
          <td><?php static $sr = 1;
          echo $sr;
          $sr++; ?></td>
          <td><?php echo $row['Name']?></td>
          <td><?php echo $row['Description']?></td>
          <td> <button style = "padding : 5px; margin:5px; background-color: skyblue;cursor:pointer;"><a  style= "color:white;" href = "./Feed.php?data=<?php echo $row['Id'] ?>">View</a></button>
          <button style = "padding : 5px;margin:5px; background-color: green;cursor:pointer;"><a  style= "color:white;" href = "./AddTemp.php?data=<?php echo $row['Id'] ?>">Update</a></button>
          <button style = "padding : 5px;margin:5px; background-color: red;cursor:pointer;"><a  style= "color:white;"href = "./Delete.php?data=<?php echo $row['Id'] ?>">Delete</a></button> 
        </td>

   
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