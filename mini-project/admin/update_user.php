<h1 class="text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Users Information/ <small>Update Information</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li><a href="index.php?page=all_users"><i class="fa fa-users" aria-hidden="true"></i> All Users</a></li>
        <li class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Users Information</li>
    </ol>
    <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
    <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>

<?php
    $id = base64_decode($_GET['id']);
    $query = "SELECT * FROM `users` WHERE `id`='$id'";
    $row_info = mysqli_query($link,$query);
    $result = mysqli_fetch_assoc($row_info);

    if(isset($_POST['update_user']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query1 = "UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username',`password`='$password' WHERE `id`='$id'";

        $result1 = mysqli_query($link,$query1);

        if($result1)
        {
            $_SESSION['data_insert_success']="Student Information Added successfull!!";
            header('location:index.php?page=all_users');
        }
        else
        {
            $_SESSION['data_insert_error']="Student Information Does not Added";
        }
    }

?>
<div class="row">
    <div class="col-sm-6 ">
        <form class="shadow p-3 mb-5 bg-white rounded" action="" method="post" enctype = "multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required = "" value = "<?php echo $result['name']?>" >
            </div>

            <div class="form-group">
                <label for="roll">Email</label>
                <input type="email" name="email" id="email" class="form-control" required = "" value = "<?php echo $result['email']?>" >
            </div>

            <div class="form-group">
                <label for="city">Username</label>
                <input type="text" name="username" id="username" class="form-control" required = "" value = "<?php echo $result['username']?>">
            </div>

            <div class="form-group">
                <label for="city">Password</label>
                <input type="password" name="password" id="password" class="form-control" required = "" value = "<?php echo $result['password']?>">
            </div>

            <div class="form-group">
                <input style="margin-bottom:20px;"class="btn btn-primary pull-right" type="submit" name="update_user" id="update_user" value="Update Info">
            </div>
        </form>
    </div>
    <div class="col-sm-6"></div>
</div>