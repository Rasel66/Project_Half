<?php
require_once'../admin/dbcon.php';
    session_start();

    if(!isset($_SESSION['user_login']))
    {
        header('location: login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="styleshee">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="take_attendance.css">

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/script.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a style="font-size:27px; font-weight:700;" class="navbar-brand" href="http://localhost/mini-project/index.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Attendance Management System</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i> Wellcome: Rasel</a></li>
                <li><a href="index.php?page=user_profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid use">
        <div class="row">
            <div class="col-sm-3">
                <div class="c-left">
                    <div class="list-group">
                        <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                        <a href="index.php?page=add_student" class="list-group-item"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Student </a>
                        <a href="registration.php" class="list-group-item"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User </a>
                        <a href="index.php?page=all_student" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> All Students </a>
                        <a href="index.php?page=all_users" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> All Users </a>
                        <a href="index.php?page=take_attendance" class="list-group-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Take Attendance </a>
                        <a href="index.php?page=give_marks" class="list-group-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Give Marks </a>
                        <a href="show_percentage.php" target="_blank" class="list-group-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Show Percentage </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="content">
                    
                <?php
                    if(isset($_GET['page']))
                    {
                        $page= $_GET['page'].'.php';
                    }
                    else
                    {
                        $page = 'dashboard.php';
                    } 


                    if(file_exists($page))
                    {
                        require_once $page;
                    }
                    else
                    {
                        require_once'404.php';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area">
        <p>Copyright &copy; 2022- Student Management System. All Rights Reserved</p>
    </footer>

<script src="../js/script1.js">
</script>
</body>
</html>