<h1 class="text-primary"><i class="fa fa-user" aria-hidden="true"></i> User Profile/ <small>My Profile</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user" aria-hidden="true"></i> Profile</li>
    </ol>


<?php
    $session_user = $_SESSION['user_login'];
    $query = "SELECT * FROM `users` WHERE `username`='$session_user'";

    $user_data = mysqli_query($link,$query);
    $user_row = mysqli_fetch_assoc($user_data);

?>

<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered table-hover table-responsive table-striped">
            <tr>
                <th>User Id</th>
                <td><?php echo $user_row['id'] ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo ucwords($user_row['name']) ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $user_row['username'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user_row['email'] ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $user_row['status'] ?></td>
            </tr>
            <tr>
                <th>SignUp Date</th>
                <td><?php echo $user_row['datetime'] ?></td>
            </tr>
        </table>
        <a class="btn btn-primary pull-right" href="index.php?page=update_user&id=<?php echo base64_encode($user_row['id']) ?>">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="">
            <img class="img-thumbnail" style="height:200px;"src="../admin/images/<?php echo $user_row['photo'] ?>" alt="">
        </a>
        <br>
        <br>

        <?php
            if(isset($_POST['submit']))
            {
                $photo = explode('.',$_FILES['photo']['name']);
                $photo_names = $photo[0];
                $photo_ext = end($photo);
        
                $photo_name = $photo_names.'.'.$photo_ext;
                $query_for_photo = "UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$session_user'";

                $upload = mysqli_query($link,$query_for_photo);
                if($upload)
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../admin/images/'.$photo_name);
                }
            }

        ?>
        <form action="" enctype="multipart/form-data" method="POST">
            <label for="photo">Profile Picture</label>
            <input type="file" name="photo" id="photo" required = "">
            <br>
            <input class="btn btn-primary" type="submit" name="submit"  value="Submit">
        </form>
    </div>
</div>
