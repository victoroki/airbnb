<?php
include("header.php");

$query2="SELECT * FROM `users` WHERE id='$user_id'";
$run2=mysqli_query($con,$query2);
$data=mysqli_fetch_assoc($run2);



if(isset($_POST['submit']))
{
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$query1="UPDATE `users` SET `f_name`='$f_name',`l_name`='$l_name',`email`='$email',`contact`='$contact',`gender`='$gender',`dob`='$dob' WHERE `id`='$user_id'";
    $run1=mysqli_query($con,$query1);
if(isset($run1)){
  echo "<script>alert('Record has been Successfully Updated!')</script>";
  echo "<script>window.open('update-profile.php','self')</script>";
  //exit();
}
else{
  echo "<script>alert('unknown error!')</script>";
  echo "<script>window.open('update-profile.php','self')</script>";
  //exit();
}
}
if(isset($_POST['submit1']))
{
$filename=$_FILES["uploadimg"]["name"];
$tempname=$_FILES["uploadimg"]["tmp_name"];
$folder="../profiles/".$filename;
move_uploaded_file($tempname,$folder);
$query2="UPDATE `users` SET `image`='$filename' WHERE `id`='$user_id'";
    $run2=mysqli_query($con,$query2);
if(isset($run2)){
  // echo "<script>alert('Picture has been Successfully Updated!')</script>";
  // echo "<script>window.open('update-profile.php','self')</script>";
  //exit();
}
else{
  echo "<script>alert('unknown error!')</script>";
  echo "<script>window.open('update-profile.php','self')</script>";
  //exit();
}
}


?>

<div class="container">
<h1><span class="badge badge-info">Update Profile</span></h1>
<div class="row">
<div class="col-sm-6 col-md-6 col-lg-4">
<form method="post" enctype="multipart/form-data">
<table>
<tr><td>
<div class="card" style="width:300px">
<div class="alert alert-success">
    <img id="blah" class="card-img-top" src='<?php echo "../profiles/".$data4['image']; ?>' alt="Card image">
    <div class="card-body">
      <h4 class="card-title">Update Picture</h4>
      <input type="file" name="uploadimg" value="Chosse File" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><br>
      <button type="submit" name="submit1" class="form-control btn btn-primary">Update</button>
    </div>
  </div>
  </div>
  </td></tr>
  </table>
  </form>
  </div>
<div class="col-md-4 col-lg-8">
<div class="alert alert-warning">
<form method="post" enctype="multipart/form-data">
<table class="table table-striped">
<tr><td>First Name:</td>
<td><input type="text" name="f_name" class="form-control" required value="<?php echo $data4['f_name'];?>"></td></tr>
<tr><td>Last Name:</td>
<td><input type="text" name="l_name" class="form-control" required value="<?php echo $data4['l_name'];?>"></td></tr>
<tr><td>Email:</td>
<td><input type="email" name="email" class="form-control" required value="<?php echo $data4['email'];?>"></td></tr>
<tr><td>Contact:</td>
	<td><input type="text" name="contact" class="form-control" required value="<?php echo $data4['contact'];?>"></td>
</tr>
<tr><td>Gender*</td><td><select name="gender" title="gender" required="" class="form-control">
  <option value="<?php echo $data4['gender'];?>"><?php echo $data4['gender'];?></option>
  <option value="Male">Male</option>
    <option value="Female">Female</option>
</select></td></tr>

<tr><td>Date of Birth:</td>
<td><input type="date" data-date-inline-picker="true" name="dob" class="form-control" required value="<?php echo $data4['dob'];?>">
<tr><td></td>
<td><button type="submit" name="submit" class="form-control btn btn-primary">Update</button></td></tr>
</table>
</form>
</div>
</div>
</div>
</div>









</body>
</html>