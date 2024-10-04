<?php

@include 'config.php';

if(isset($_POST["Uid"]))
{
  $Uid = $_POST["Uid"];
  $sql = "SELECT * FROM `userinfo` WHERE  Authentication_token = '$Uid'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) 
  {
        if(isset($_POST["Tid"]))
        {
            echo "\n";
            $Tid = $_POST["Tid"];
            $sql = "SELECT * FROM `templatelist` WHERE  Authentication_token = '$Tid'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) 
            {
                if(isset($_POST["Fid"]))
                {
                    echo "\n";
                    $Fid = $_POST["Fid"];
                    $sql = "SELECT * FROM `feed` WHERE  Authentication_token = '$Fid'";
                    $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            if(isset($_POST["Data"]))
                            {
                                echo "\n";
                                $Data = $_POST["Data"];           
                                $insert = "INSERT INTO `getdata` (`Id`, `Uid`, `Tid`, `Fid`, `Data`) VALUES('','$Uid','$Tid','$Fid','$Data')";
                                mysqli_query($conn, $insert);
                                echo "Data Insert Succesfully";
                            }
                                
                            
                            
                        }
                }
                else
                {
                    echo "Feed Is Not Found!!";
                }
            }
        }
        else
        {
            echo "templatelist Not Found!!";
        }
    }
    else
    {
        echo "User Not Found";
    }

}
   


?>