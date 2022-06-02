<?php
require_once'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Percentage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Percentage and Marks of All Students</h1>
    <hr>
    <div class="container">
    <div class="table-responsive">
        <table id="data" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Total Present</th>
                    <th>Total Absent</th>
                    <th>Total Class</th>
                    <th>Attendance <br>
                        Percentage</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql1 = "SELECT * FROM `student_info` order by roll asc";
                    $result1 = mysqli_query($link, $sql1);

                    $sql2 =  "SELECT COUNT(DISTINCT att_time) as cnt FROM `atttendance`";
                    $result2 = mysqli_query($link, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                                

                                
                    if($result1 ){
                    while($row = mysqli_fetch_assoc($result1)){
                    $roll = $row['roll'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $total_attd = $row2['cnt'];
                                    
                    $sql3 = "SELECT COUNT(DISTINCT att_time) as cnt3 FROM `atttendance` WHERE `roll` = '$roll'";
                    $result3 = mysqli_query($link, $sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    $total_present = $row3['cnt3'];
                    $attd_percentage = ($total_present/$total_attd)*100;
                    $total_absent = ($total_attd - $total_present);
                    if($attd_percentage >= 95)
                        $marks = 8;
                    else if($attd_percentage >= 90 && $attd_percentage <=94)
                        $marks = 7;
                    else if($attd_percentage >= 85 && $attd_percentage <=89)
                        $marks = 6;
                    else if($attd_percentage >= 80 && $attd_percentage <=84)
                        $marks = 5;
                    else if($attd_percentage >= 75 && $attd_percentage <=79)
                        $marks = 4;
                    else if($attd_percentage >= 70 && $attd_percentage <=74)
                        $marks = 3;
                    else if($attd_percentage >= 65 && $attd_percentage <=69)
                        $marks = 2;
                    else if($attd_percentage >= 60 && $attd_percentage <=64)
                        $marks = 1;
                    else
                        $marks = 0;

                        echo '<tr>
                        <th scope="row">'.$roll.'</th>
                        <td>'.$name.'</td>
                        <td>'.$total_present.'</td>
                        <td>'.($total_attd - $total_present).'</td>
                        <td>'.$total_attd.'</td>
                        <td>'.$attd_percentage.'%</td>
                        <td>'.$marks.'</td>
                        </tr>';
                                    
                                    
                    }  
                    }
                    else{
                        echo "error";
                        }
                    ?>
                </tbody>
        </table>                        
    </div>
    </div>
</body>
</html>
    