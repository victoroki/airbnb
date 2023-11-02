<!-- user-detail.php -->
<?php
include("header.php");
if (isset($_GET['view'])) {
	$view=$_GET['view'];
	$query="SELECT * FROM `users` WHERE id='$view'";
    $run=mysqli_query($con,$query);
    $data=mysqli_fetch_assoc($run);
}

?>


<div class="container">
  <div class="card-columns bg-primary">
    <img src="<?php echo "../profiles/".$data['image'];?>" alt="Card image" style="float:left;width:260px;height:260px;border-radius:150px;padding: 20px">
    <div class="card-body">
    <table><tr style="height:250px;color:white"><td valign="bottom"><h1><?php echo $data['f_name'];?> <?php echo $data['l_name'];?></h1></td></tr></table>
    <?php
    if ($data['id']==$user_id) {
      echo '<a href="update-profile.php" class="btn btn-warning" style="float: right;">Update Profile</a>';
    }

    ?>
      
    </div>
  </div>
  <div>
<table style="float:right" class="table table-striped">
<tr><th>First Name</th><td><?php echo $data['f_name'];?></td></tr>
<tr><th>Last Name</th><td><?php echo $data['l_name'];?></td></tr>
<tr><th>User ID</th><td><?php echo $data['email'];?></td></tr>
<tr><th>Contect</th><td><?php echo $data['contact'];?></td></tr>
<tr><th>Date of Birth</th><td><?php echo $data['dob'];?></td></tr>
<tr><th>Gender</th><td><?php echo $data['gender'];?></td></tr>



</table>
</div>
</body>
</html>