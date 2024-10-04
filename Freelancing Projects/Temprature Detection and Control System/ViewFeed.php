<?php

@include 'config.php';

session_start();
$data = "";
$types = "";
$Ids ="";
$TId = "";
if(!isset($_SESSION['user_name'])){
   header('location:index.php');
}
$email = $_SESSION['user_email'];
// $data = (isset($_SESSION['Iddata']));   

// $_SESSION['Iddata'] = "$data";

$tempId = $_SESSION['TempId'];


if(isset($_GET["data1"]))
{
  $data = $_GET["data1"];
  // echo $data;
}
// echo $email;
$sql = "SELECT * FROM `feed` WHERE Id = '$data'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $types = $row['Type'];
        $Ids = $row['Authentication_token'];
        $_SESSION['UniqId'] = $Ids;
     
    }
}
if($types == "Input")
{

  header("location:chart.php?data1=$data");

}
if(isset($_GET["data2"]))
{
  $data = $_GET["data2"];
  // echo $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	//theme: "light2",
	title:{
		text: "CHART"
	},
	axisX:{
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "DATA",
		includeZero: true,
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	toolTip:{
		enabled: false
	},
	data: [{
		type: "area",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>ViewFeed</title>

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<div class="container" style = " width: 100%; background-image: url('img/bg.jpg'); background-size: cover;
  background-position: center;">

   <div class="content">
   <!-- <a href ="user_page.php"><i style="font-size:24px; color: red;float:right;cursor:pointer;" class="fa">&#xf00d;</i></a> -->
      <a href="Feed.php?data=<?php echo $tempId; ?>" class="btn">Back</a>
      
      <br>
     
      <table style = "width:30%;float:left;  font-size:90%;">
        <tr>
          <th>UId Names</th>
          <th>UId</th>
        </tr>
       
            <tr>
          
                <td>User Uid</td>
                  <td> <?php   
                        $sql = "SELECT `Authentication_token` FROM `userinfo` WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                                echo $row['Authentication_token'];
                            }
                        }
                    ?>
                    </td>
            </tr>
            <tr>
                <td>Template Uid</td>
                <td><?php   $sql = "SELECT `Authentication_token` FROM `templatelist` WHERE Id = '$tempId'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                            echo $row['Authentication_token'];
                        }
                    }
                ?></td>
            </tr>

            <tr>
              <td>Feed Uid</td>
              <td><?php  
              echo $data;
              $sql = "SELECT `Authentication_token` FROM `feed` WHERE Id = '$data'";
                  $result = mysqli_query($conn, $sql);
                  
                  if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) 
                      { 
                          echo $row['Authentication_token'];
                      }
                  }
              ?></td>
            </tr>
                
      
    </table>
    <br><br><br><br>
    <br><br><br><br>



      <br>
      <table>
        <tr>
        <label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
       
        </tr>
       
        <tr>
          
   
        </tr>
                
      
    </table>
    <br><br>

        
 <br>
 
     
   </div>

</div>

</body>
</html>