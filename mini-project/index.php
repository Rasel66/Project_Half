<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini project</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="styleshee">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <div class="container shadow p-3 mb-5 bg-white rounded">
            <div class="row ">
                <div class="col-sm-2">
                    <div class="logo text-center">
                        <img src="Logo.png" alt="">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="title">
                        <a href="">Jashore University of Science and Technology</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="btn">
                        <a class="btn btn-primary pull-right" href="./admin/registration.php">Registration</a>
                        <a class="btn btn-primary pull-right" href="./admin/login.php">Login</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div class="ptitle">
                        <h4><i class="fa fa-pencil-square-o " aria-hidden="true"></i> Attendance Management System</h4>
                    </div>
                </div>
            </div>
            <hr>
            <br>
            <div class="row mb-4">
                <div class="col-sm-6">
                    <img style="height:auto;width:550px;" src="img.800px.jpg" alt="">
                </div>
                <div class="col-sm-6">
                    <form action="" method="post">
                        <table style="height:373px;" class="table table-bordered ">
                            <tr>
                                <th style="font-size: 20px;" class="text-center" colspan="2"><label for="">Student Information</label></th>
                            </tr>
                            <tr>
                                <th><label for="choose">Choose Year</label></th>
                                <td><select class="form-control" name="choose" id="choose">
                                    <option value="">Select</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select></td>
                            </tr>
                            <tr>
                                <th><label for="roll">Roll</label></th>
                                <td >
                                    <input class="form-control" type="text" name="roll" id="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2"><input class="btn btn-primary" type="submit" name="show_info" id="show_info" value="Show Info"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <?php
                require_once'./admin/dbcon.php';
                if(isset($_POST['show_info']))
                {
                    $choose = $_POST['choose'];
                    $roll = $_POST['roll'];

                    $query = "SELECT * FROM `student_info` WHERE `class`='$choose' AND `roll`='$roll'";

                    $result = mysqli_query($link,$query);

                    if(mysqli_num_rows($result)==1)
                    {
                        $student_info = mysqli_fetch_assoc($result);
                        ?>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <table class="table table-bordered ">
                                    <tr>
                                        <td colspan="3"><h4 class="text-center">Student Information</h4></td>
                                    </tr>
                                    <tr>
                                        <td style="width:300px;"rowspan="6"><img class="img-thumbnail" src="./admin/student_images/<?php echo $student_info['photo'] ?>"style="height:300px;width:300px;" alt=""></td>
                                        <th>Name</th>
                                        <td><?php echo $student_info['name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Roll</th>
                                        <td><?php echo $student_info['roll'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Year</th>
                                        <td><?php echo $student_info['class'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><?php echo $student_info['city'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $student_info['pcontact'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $student_info['email'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                    <?php
                    }
                    else
                    {
                        echo 
                        '<div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class=" text-center alert alert-warning msg">
                                <b>Student Information not Found!!!</b>
                                </div>
                            </div>
                        <div class="col-sm-2"></div>
                        </div>';
                    }

                }


            ?>

            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer text-center">
                        <p>Copyright &copy; Attendance Management System. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>