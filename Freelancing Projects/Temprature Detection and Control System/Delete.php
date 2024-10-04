<?php

@include 'config.php';

session_start();
$data = "";



if(isset($_GET["data"]))
{
   $data = $_GET["data"];

   if($data != "")
   {
    $qur = "UPDATE `templatelist` SET `Flag`='0' WHERE Id = '$data'";
      mysqli_query($conn, $qur);
      header('location:Template.php');
     
      
   }
}
elseif(isset($_GET["data1"]))
{
   $data = $_GET["data1"];

   if($data != "")
   {
    $qur = "UPDATE `Feed` SET `Flag`='0' WHERE Id = '$data'";
      mysqli_query($conn, $qur);
      header('location:Feed.php');
     
      
   }
}

?>