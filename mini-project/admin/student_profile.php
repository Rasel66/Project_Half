<h1 class="text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Student Profile/ <small>Profile</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li><a href="index.php?page=all_student"><i class="fa fa-users" aria-hidden="true"></i> All Students</a></li>
        <li class="active"><i class="fa fa-user" aria-hidden="true"></i> Student Profile</li>
    </ol>

<?php


    $id = base64_decode($_GET['id']);
    $query = "SELECT * FROM `student_info` WHERE `id`='$id'";

    $user_data = mysqli_query($link,$query);
    $user_row = mysqli_fetch_assoc($user_data);

?>

    <div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered table-hover table-responsive table-striped">
            <tr>
                <th>Name</th>
                <td><?php echo ucwords($user_row['name']) ?></td>
            </tr>
            <tr>
                <th>Roll</th>
                <td><?php echo $user_row['roll'] ?></td>
            </tr>
            <tr>
                <th>Year</th>
                <td><?php echo $user_row['class'] ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $user_row['city'] ?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?php echo $user_row['pcontact'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user_row['email'] ?></td>
            </tr>
            <tr>
                <th>Added Date</th>
                <td><?php echo $user_row['datetime'] ?></td>
            </tr>
        </table>

        <a class="btn btn-primary pull-right" href="index.php?page=update_student&id=<?php echo base64_encode($user_row['id']) ?>">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="">
            <img class="img-thumbnail" style="height:200px;"src="../admin/student_images/<?php echo $user_row['photo'] ?>" alt="">
        </a>
        <br>
        <br>

        <?php
            if(isset($_POST['submit']))
            {
                $id = base64_decode($_GET['id']);
                $photo = explode('.',$_FILES['photo']['name']);
                $photo_names = $photo[0];
                $photo_ext = end($photo);
        
                $photo_name = $photo_names.'.'.$photo_ext;
                $query_for_photo = "UPDATE `student_info` SET `photo`='$photo_name' WHERE `id`='$id'";

                $upload = mysqli_query($link,$query_for_photo);
                if($upload)
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../admin/student_images/'.$photo_name);
                }
            }

        ?>
        <form action="" enctype = "multipart/form-data" method = "POST">
            <label for="photo">Profile Picture</label>
            <input type="file" name="photo" id="photo" required = "">
            <br>
            <input class="btn btn-primary" type="submit" name="submit"  value="Submit">
        </form>
    </div>
</div>