<?php
 @include 'config.php';

session_start();
$Ids = $_SESSION['UniqId'];
header("refresh: 5"); 

$test = array();

$count = 0;
$sql = "SELECT * FROM `getdata` WHERE Fid = '$Ids' ORDER BY Id DESC LIMIT 10;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $test[$count]["label"] = $row["date"];
        $test[$count]["y"] = $row["Data"];
        $count = $count + 1;

    }
}
$data = "";
$types = "";
$Ids ="";
if(!isset($_SESSION['user_name'])){
   header('location:index.php');
}

if(isset($_GET["data"]))
{
  $data = $_GET["data"];
  $_SESSION['TempId'] = "$data";

  // echo $data;
}
if(isset($_GET["data1"]))
{
  $data1 = $_GET["data1"];
  $_SESSION['FeedId'] = "$data1";

  // echo $data;
}
$email = $_SESSION['user_email'];
$tempId = $_SESSION['TempId'];

echo $data;
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
  header('location:chart.php');

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
              
                <td><?php     $sql = "SELECT `Authentication_token` FROM `templatelist` WHERE Id = '$tempId'";
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
              $sql = "SELECT `Authentication_token` FROM `feed` WHERE Id = '$data1'";
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
          
        <div id="chartContainer" style="margin-left:10%;height: 300px; width: 80%;"></div>

        </tr>
       
        <tr>
          
   
        </tr>
                
      
    </table>
    <br><br>

        
 <br>
 
     
   </div>

</div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>
</html>