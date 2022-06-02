<?php
    require_once'../admin/dbcon.php';
    session_start();
    if(isset($_POST['registration']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];  

        $photo = explode('.',$_FILES['photo']['name']);
        $photo_names = $photo[0];
        $photo_ext = end($photo);

        $photo_name = $photo_names.'.'.$photo_ext;
        
        $email_check = mysqli_query($link,"SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($email_check)== 0)
        {
            $username_check = mysqli_query($link,"SELECT * FROM users WHERE username = '$username'");
            if(mysqli_num_rows($username_check)== 0)
            {
                if(strlen($username)>7)
                {
                    if(strlen($password)>7) 
                    {
                        if($password == $c_password)
                        {
                            $password = md5($password);
                            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','Active')";
                            $result = mysqli_query($link,$query);

                            if($result)
                            {
                                $_SESSION['data_insert_success']="Registration successfull!!";
                                move_uploaded_file($_FILES['photo']['tmp_name'],'../admin/images/'.$photo_name);
                                header('location: registration.php');
                            }
                            else
                            {
                                $_SESSION['data_insert_error']="Data does not inserted!!";
                            }
                        }
                        else
                        {
                            $p_error = "<b>Password must be equal.</b><br>"; 
                        }
                    }
                    else
                    {
                        $password_length = "<b>Password must be more than 7 character.</b><br>";
                    }
                }
                else
                {
                    $username_length = "<b>Username must be more than 7 character.</b><br>";
                }
            }
            else
            {
                $username_check = "<b>This username already exists.</b><br>";
            }
        }
        else
        {
            $email_error = "<b>This email address already exists.</b><br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="styleshee">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="cotainer">
            <div class="row ">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-3 pull-right">
                            <div class="logo text-center">
                                <img src="../admin/images/Logo.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-9 pull-right">
                            <div class="title">
                                <a href="">Jashore University of Science and Technology</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <hr>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 shadow p-3 mb-5 bg-white rounded">
            <h4 class="text-center">Attendance Management System</h4>
            <hr>
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="photo">
                            <img style="min-width:100%; margin-top:70px;"src="../admin/images/images.png" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <h4 class="text-center">Admin Registration</h4>
                        <hr>
                        <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
                        <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>
                        <br>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="name">Name</label><br>
                            <input type="text" name="name" id="name" required="" class="form-control" value="<?php if(isset($name)){echo $name;}?>">

                            <label for="email">Email</label><br>
                            <input type="email" name="email" id="email" required= ""class="form-control" value="<?php if(isset($email)){echo $email;}?>">
                            <?php if(isset($email_error)){echo $email_error;}?>

                            <label for="username">User name</label><br>
                            <input type="text" name="username" id="username" required="" class="form-control" value="<?php if(isset($username)){echo $username;}?>">
                            <?php if(isset($username_length)){echo $username_length;}?>

                            <label for="password">Password</label><br>
                            <input type="password" name="password" id="password" required="" class="form-control" value="<?php if(isset($password)){echo $password;}?>">
                            <?php if(isset($password_length)){echo $password_length;}?>

                            <label for="c_password">Conform password</label><br>
                            <input type="password" name="c_password" id="c_password" required="" class="form-control" value="<?php if(isset($c_password)){echo $c_password;}?>">
                            <?php if(isset($p_error)){echo $p_error;}?>

                            <label for="photo">Add photo</label><br>
                            <input type="file" name="photo" id="photo" required=""><br>
                            <a class="back pull-left btn btn-info"style="margin-top: 23px;" href="http://localhost/mini-project/index.php">Back Homepage</a><br>
                            <input style="margin-top:1px;" type="submit" name="registration" id="" value="Submit" class="pull-right btn btn-info"><br><br>
                            <p>Already have an account?<a href="../admin/login.php"> login</a></p>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <br>
            
            <div class="col-sm-2"></div>
        </div>
        <hr>
        <div class="row">
                <div class="col-sm-12">
                    <div class="footer text-center">
                        <p>Copyright &copy; Attendance Management System. All Rights Reserved</p>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>