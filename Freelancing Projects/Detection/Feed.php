<!DOCTYPE html>
<html lang="en">
<head>
<script>
<?php
@include 'config.php';

session_start();
$data = "";
$Ids = $_SESSION['UniqId'];
$Type = "";

if(!isset($_SESSION['user_name'])){
   header('location:index.php');
}
$email = $_SESSION['user_email'];

$data = (isset($_SESSION['Iddata']));    

if(isset($_GET["data"]))
{
  $data = $_GET["data"];
  $_SESSION['TempId'] = "$data";

}
$data = $_SESSION['TempId'];
$sql = "SELECT * FROM `feed` WHERE  Flag = '1' AND GetId = $data";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{

    while($row = mysqli_fetch_assoc($result)) 
    {
      // $Ids = $row['Id'];
        if($row['Type'] == "Input")
        {
          $test = array();
          $count = 0;
          $sql = "SELECT * FROM `getdata` WHERE Fid = '$Ids' ORDER BY Id DESC LIMIT 10;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) 
          {
            static $class = 1;
              while($row = mysqli_fetch_assoc($result)) 
              {
                  $test[$count]["label"] = $row["date"];
                  $test[$count]["y"] = $row["Data"];
                  $count = $count + 1;
          
          ?>
          window.onload = function () 
          {
          
            var chart = new CanvasJS.Chart("chartContainer", 
            {
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
        <?php 
        
              }
              
          }
        }
      
        
  }
}?>
</script>
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
      <a href="Template.php" class="btn">Back</a>
      <a href="./AddFeed.php?datas=<?php echo $data; ?>" class="btn">Add Feed</a>
      
      <br><br>

        <h1>Feed List</h1>

      <br>
      <table>
        <tr>
          <th>Sr.No</th>
          <th>Feed Name</th>
          <th>Pin Number</th>
          <th>Type</th>
          <th >Action's</th>

        </tr>
        <?php
         // echo "$name";  
        

             
                $sql = "SELECT * FROM Feed WHERE Flag = '1' AND GetId = '$data'";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) 
                {
                   
                
                
      

          
          
        ?>
        <tr>
          <td><?php static $sr = 1;
          echo $sr;
          $sr++; ?></td>
          <td><?php echo $row['Name']?></td>
          <td><?php echo $row['Pinnumber']?></td>
          <td><?php echo $row['Type']?></td>

          <td> 
            <button style = "padding : 5px; margin:5px; background-color: skyblue;cursor:pointer;"><a  style= "color:white;"href = "./ViewFeed.php?data1=<?php echo $row['Id'] ?>">View</a></button>
          <button style = "padding : 5px;margin:5px; background-color: green;cursor:pointer;"><a style= "color:white;"href = "./AddFeed.php?data1=<?php echo $row['Id'] ?>">Update</a></button>
          <button style = "padding : 5px;margin:5px; background-color: red;cursor:pointer;"><a   style= "color:white;"href = "./Delete.php?data1=<?php echo $row['Id'] ?>">Delete</a></button> 
        </td>

   
        </tr>
       <?php
                }
        }
        
       ?> 
      
    </table>
  <?php
    $sql = "SELECT * FROM `feed` WHERE Flag = '1' AND GetId = $data";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
      static $class1 = 1;

        while($row = mysqli_fetch_assoc($result)) 
        {
            if($row['Type'] == "Input")
            {
  ?>
    <table>
        <tr>
          
        <div id="chartContainer" style="margin-left:10%;height: 300px; width: 80%;"></div>

        </tr>
       
        <tr>
          
   
        </tr>
                
      
    </table>
  
 <br>
    ` <?php 
        }
      }
    }?>
        `
   </div>

</div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>
</html>