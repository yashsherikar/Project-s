<?php 

@include 'config.php';

     if(isset($_GET["data"]))
     {
        $data = $_GET["data"];
        echo $data;
     }
     $select = " SELECT * FROM userinfo WHERE email = '$data'";

     $result = mysqli_query($conn, $select);
  
     if(mysqli_num_rows($result) > 0){
  
        $row = mysqli_fetch_array($result);
  
        if($row['Flag'] == '1'){
  
            $sql = "UPDATE userinfo SET Flag = 0 WHERE email ='$data'";

                if ($conn->query($sql) === TRUE) {
                    header('location:UserDetails.php');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
  
        }elseif($row['Flag'] == '0'){
  
            $sql = "UPDATE userinfo SET Flag = 1 WHERE email ='$data'";

            if ($conn->query($sql) === TRUE) {
                header('location:UserDetails.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }

  
        }
       
     }else{
        $error[] = 'incorrect email or password!';
     }
     

?>