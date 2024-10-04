<?php

@include 'config.php';

if(isset($_GET["Uid"]))
{
  $Uid = $_GET["Uid"];
  $sql = "SELECT * FROM `userinfo` WHERE  Authentication_token = '$Uid'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) 
  {
        if(isset($_GET["Tid"]))
        {
            echo "\n";
            $Tid = $_GET["Tid"];
            $sql = "SELECT * FROM `templatelist` WHERE  Authentication_token = '$Tid'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) 
            {
                if(isset($_GET["Fid"]))
                {
                    echo "\n";
                    $Fid = $_GET["Fid"];
                    $sql = "SELECT * FROM `feed` WHERE  Authentication_token = '$Fid'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) 
                    {
                        if(isset($_GET["Ip"]))
                        {
                            echo "\n";
                            $Ip = $_GET["Ip"];
                            $sql = "SELECT * FROM `idchecker` WHERE  Ipadd = '$Ip'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) 
                            {
                                $sql = "SELECT * FROM `idchecker` WHERE  Ipadd = '$Ip'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) 
                                {
                                    while($row = mysqli_fetch_assoc($result)) 
                                    {
                                        if($row['Uid'] == $Uid && $row['Tid'] == $Tid && $row['Fid'] == $Fid)
                                        {
                                            echo "Access Granted!";
                                        }
                                        else
                                        {
                                            echo "Somthing Wen Wrong!!!";
                                        }
                                    }
                                }
                                    
                            }
                            else
                            {
                                $sql = "SELECT * FROM `idchecker`;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) 
                                {
                                    while($row = mysqli_fetch_assoc($result)) 
                                    {
                                        if($row['Uid'] == $Uid && $row['Tid'] == $Tid && $row['Fid'] == $Fid)
                                        {
                                            $qur = "UPDATE `idchecker` SET `Ipadd`='$Ip' WHERE Uid = '$Uid'";
                                            mysqli_query($conn, $qur);
                                            echo "Ip Update Succesfully";
                                        }
                                    
                                    }
                                }
                                else
                                {
                                    $insert = "INSERT INTO idchecker VALUES('','$Uid','$Tid','$Fid','$Ip')";
                                    mysqli_query($conn, $insert);
                                    echo "Data Insert Succesfully";
                                }
                              
                        
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
  }
  else
  {
    echo "User Not Found";
  }
}


?>