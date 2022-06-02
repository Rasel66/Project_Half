<?php
 include 'dbcon.php';
    //$roll = $_POST['std_id'];
    date_default_timezone_set('Asia/Dhaka');
    //default timezone
    
    $roll = 180118;
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM `atttendance` WHERE roll = '$roll'";

     $result = mysqli_query($link,$sql);
     $row = mysqli_fetch_assoc($result);

     echo $date;
     echo "<br>";
     //echo $row['att_time'];

     if($row)
     {
         //echo 1;
     }
     else{
         
     }
     echo "<pre>";
     print_r($row);
     echo "</pre>";
     

?>