<h1 class="text-primary"><i class="fa fa-users" aria-hidden="true"></i> All Users/ <small>All Users</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users" aria-hidden="true"></i> All Users</li>
    </ol>

<div class="table-responsive">
                        <table id="data" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `users`";
                                    $student_info = mysqli_query($link,$query);

                                    while($row = mysqli_fetch_assoc($student_info))
                                    {
                                ?>
                                <tr>
                                    <td><?php echo ucwords($row['name']) ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo ucwords($row['username']) ?></td>
                                    <td><img style="width:100px; height: 100px;" src="../admin/images/<?php echo $row['photo'] ?>" alt=""></td>
                                    <td>
                                        <a class= "btn btn-primary"href="index.php?page=update_user&id=<?php echo base64_encode($row['id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        <a class= "btn btn-danger"href="delete_user.php?id=<?php echo base64_encode($row['id']) ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>