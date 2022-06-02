<h1 class="text-primary"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard/<small>Statistics Overview</small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</li>
                    </ol>

                    <?php
                        $query_for_total_student = "SELECT * FROM `student_info`";
                        $count_student = mysqli_query($link,$query_for_total_student);
                        $tatol_student = mysqli_num_rows($count_student);

                        $query_for_total_user = "SELECT * FROM `users`";
                        $count_user = mysqli_query($link,$query_for_total_user);
                        $tatol_user = mysqli_num_rows($count_user);
                    ?>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="pull-right" style="font-size:45px;"><?php echo $tatol_student; ?></div>
                                            <div class="clearfix"></div>
                                            <div class="pull-right">All Students</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="index.php?page=all_student">
                                    <div class="panel-footer">
                                        <span class="pull-left">All Students</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading"style="background:green;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="pull-right" style="font-size:45px;"><?php echo $tatol_user; ?></div>
                                            <div class="clearfix"></div>
                                            <div class="pull-right">All Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="index.php?page=all_users">
                                    <div class="panel-footer"style="color:green;">
                                        <span class="pull-left">All Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>New Students</h3>
                    <div class="table-responsive">
                        <table id="data" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>City</th>
                                    <th>Contact</th>
                                    <th>Photo</th>
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
                                    <td><?php echo ucwords($row['city']) ?></td>
                                    <td><?php echo $row['pcontact'] ?></td>
                                    <td><img style="width:100px; height: 100px;" src="../admin/student_images/<?php echo $row['photo'] ?>" alt=""></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>