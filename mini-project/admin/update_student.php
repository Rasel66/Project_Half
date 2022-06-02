<h1 class="text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Student Information/ <small>Update Information</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li><a href="index.php?page=all_student"><i class="fa fa-users" aria-hidden="true"></i> All Students</a></li>
        <li class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Students Information</li>
    </ol>
    <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
    <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>

<?php
    $id = base64_decode($_GET['id']);
    $query = "SELECT * FROM `student_info` WHERE `id`='$id'";
    $row_info = mysqli_query($link,$query);
    $result = mysqli_fetch_assoc($row_info);

    if(isset($_POST['update_student']))
    {
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];

        $query1 = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id`='$id'";

        $result1 = mysqli_query($link,$query1);

        if($result1)
        {
            $_SESSION['data_insert_success']="Student Information Added successfull!!";
            header('location:index.php?page=all_student');
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
                <input type="text" name="name" id="name" class="form-control" required = "" value = "<?php echo $result['name']?>" >
            </div>

            <div class="form-group"> 
                <label for="roll">Roll</label>
                <input type="number" name="roll" id="roll" class="form-control" required = "" pattern="[0-9]{6}" value = "<?php echo $result['roll']?>" >
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" required = "" value = "<?php echo $result['city']?>">
            </div>

            <div class="form-group">
                <label for="pcontact">Parent Contact No</label>
                <input type="number" name="pcontact" id="pcontact" class="form-control" required = "" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" value = "<?php echo $result['pcontact']?>">
            </div>

            <div class="form-group">
                <label for="class">Year</label>
                <select class="form-control" name="class" id="class" required = "">
                    <option value="">Select</option>
                    <option <?php echo $result['class']=='1st'?'selected=""':"" ?> value="1st">1st </option>
                    <option <?php echo $result['class']=='2nd'?'selected=""':"" ?> value="2nd">2nd</option>
                    <option <?php echo $result['class']=='3rd'?'selected=""':"" ?> value="3rd">3rd</option>
                    <option <?php echo $result['class']=='4th'?'selected=""':"" ?> value="4th">4th</option>
                </select>
            </div>
            <div class="form-group">
                <input style="margin-bottom:20px;"class="btn btn-primary pull-right" type="submit" name="update_student" id="update_student" value="Update Info">
            </div>
        </form>
    </div>
    <div class="col-sm-6"></div>
</div>