<h1 class="text-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Students/ <small>Add New Student</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Students</li>
    </ol>
    <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
    <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>
<?php
    if(isset($_POST['add_student']))
    {
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $email = $_POST['email'];
        $class = $_POST['class'];
        
        $picture = explode('.',$_FILES['picture']['name']);
        $picture_names = $picture[0];
        $picture_ext = end($picture);

        $picture_name = $picture_names.'.'.$picture_ext;

        $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`,`email`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$email','$picture_name')";

        $result = mysqli_query($link,$query);
        if($result)
        {
            $_SESSION['data_insert_success']="Student Information Added successfull!!";
            move_uploaded_file($_FILES['picture']['tmp_name'],'student_images/'.$picture_name);
            header('location:index.php?page=add_student');
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
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name" class="form-control" required = "" >
            </div>

            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="number" name="roll" id="roll" class="form-control" required = "" pattern="[0-9]{6}" >
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" required = "">
            </div>

            <div class="form-group">
                <label for="pcontact">Contact No</label>
                <input type="number" name="pcontact" id="pcontact" class="form-control" required = "" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required = "" >
            </div>

            <div class="form-group">
                <label for="class">Year</label>
                <select class="form-control" name="class" id="class" required = "">
                    <option value="">Select</option>
                    <option value="1st">1st </option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="picture">Upload Image</label>
                <input type="file" name="picture" id="picture" required = "">
            </div>
            <div class="form-group">
                <input style="margin-bottom:20px;"class="btn btn-primary pull-right" type="submit" name="add_student" id="add_student" value="Add Student">
            </div>
        </form>
    </div>
    <div class="col-sm-6"></div>
</div>