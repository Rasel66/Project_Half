<?php
 include 'dbcon.php';
    date_default_timezone_set('Asia/Dhaka');
    $roll = $_POST['std_id'];
    $date = date("Y-m-d");

    $sql = "SELECT * FROM `atttendance` WHERE roll = '$roll' AND att_time = '{$date}' limit 1";

     $result = mysqli_query($link,$sql);
     if($result)
     {
         if($row = mysqli_fetch_assoc($result))
         {
             if($row['attendance'] == 'present')
             {
                $sql = "DELETE FROM `atttendance` WHERE `roll`='$roll' AND `att_time`='{$date}'";
                $result = mysqli_query($link,$sql);
                if($result)
                {
                    echo 0;
                }
             }
         }
         else
         {
            $sql = "INSERT INTO `atttendance`(`roll`, `attendance`, `att_time`, `marks`) VALUES ('$roll','present',now(),'')";
            $result = mysqli_query($link,$sql);
            if($result)
            {
                echo 1;
            }
        }
     }
?>