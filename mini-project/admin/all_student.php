<h1 class="text-primary"><i class="fa fa-users" aria-hidden="true"></i> All Students/ <small>All Students</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users" aria-hidden="true"></i> All Students</li>
    </ol>

<div class="table-responsive">
                        <table id="data" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>City</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `student_info`";
                                    $student_info = mysqli_query($link,$query);

                                    while($row = mysqli_fetch_assoc($student_info))
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo ucwords($row['name']) ?></td>
                                    <td><?php echo $row['roll'] ?></td>
                                    <td><?php echo $row['class'] ?></td>
                                    <td><?php echo ucwords($row['city']) ?></td>
                                    <td><?php echo $row['pcontact'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><img style="width:110px; height: 110px;" src="../admin/student_images/<?php echo $row['photo'] ?>" alt=""></td>
                                    <td>
                                        <div class="btnn" style="display: grid;">
                                            <a style="margin-bottom:4px;" class= "btn btn-primary"href="index.php?page=update_student&id=<?php echo base64_encode($row['id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                            <a style="margin-bottom:4px;" class= "btn btn-danger"href="delete_student.php?id=<?php echo base64_encode($row['id']) ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                            <a style="margin-bottom:4px;" class= "btn btn-info"href="index.php?page=student_profile&id=<?php echo base64_encode($row['id']) ?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>