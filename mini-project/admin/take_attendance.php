<?php
require_once'dbcon.php';
?>

<h1 class="text-primary"><i class="fa fa-users" aria-hidden="true"></i> Take Attendance/ <small>All Students</small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Take Attendance</li>
    </ol>
<div class="slideshow-container">
<?php
  $sql = "SELECT * FROM `student_info`";
  $result = mysqli_query($link, $sql);
  if($result){
     while( $row = mysqli_fetch_assoc($result)){
      $id = $row['id'];
      $name = $row['name'];
      $roll = $row['roll'];
      $email = $row['email'];
      $pcontact = $row['pcontact'];
      $img_name = $row['photo'];
?>
<div class="row">
  <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
    <div class="student-info shadow p-3 mb-5 bg-white rounded">
      <div class="mySlides" style="margin-left:84px;">
        <img onclick="myf(<?php echo $roll ?>)" src="<?php echo "../admin/student_images/".$img_name ?>" width="329px" height="350px">
        <div  style="width:316px;"class="i-content text-center" id="content"> 
          <h4>Name : <?php echo $name ?></h4>
          <h4>Student Id : <?php echo $roll ?></h4>
          <h5>Email: <?php echo $email ?></h5>
        </div>
     </div>
    </div>
  </div>
  <div class="col-sm-3">
  </div>
</div>
</div>
  <?php
  }
}
?>
<div  style="  width: 331px;
  border: 10px solid;
  margin-left: 69rem;
  text-align: center;"id="test">
  <p>test</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>
</div>
<br>

</body>
</html> 