<!-- sign_up.php -->
<?php
include("header.php");

if(isset($_POST['submit']))
{
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$account_type=$_POST['account_type'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$filename=$_FILES["uploadimg"]["name"];
$tempname=$_FILES["uploadimg"]["tmp_name"];
$folder="profiles/".$filename;
move_uploaded_file($tempname,$folder);
$query1="SELECT * FROM `users` WHERE `email`='$email'";
$run1=mysqli_query($con,$query1);
$row1=mysqli_num_rows($run1);
if($row1<1)
  {
    if($password==$cpassword)
{
  
  $query="INSERT INTO `users`(`f_name`, `l_name`, `email`, `contact`, `gender`, `image`, `dob`, `account_type`, `password`) VALUES ('$f_name','$l_name','$email','$contact','$gender','$filename','$dob','$account_type','$password')";
  $run=mysqli_query($con,$query);
  if(isset($run)){
    echo "<script>alert('Successfully registered!')</script>";
    echo "<script>window.open('login.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('index.php','self')</script>";
    exit();
  }sleep(3);
}
else
{
  echo "<script>alert('Password and Confirm Password does not match!')</script>";
}

  }
else
{
  echo "<script>alert('User Id already Exist! Change Username')</script>";
}

}
?>




<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-danger">
  <h2><span class="badge badge-danger">Signup Form</span></h2>
<table class="table table-striped">
<tr><td>First Name:*</td>
<td><input type="text" name="f_name" class="form-control" required></td></tr>
<td>Last Name:*</td>
<td><input type="text" name="l_name" class="form-control" required></td></tr>
<tr><td>Username/Email:*</td>
<td><input type="email" name="email" class="form-control" placeholder="name@gmail.com" required></td></tr>
<tr><td>Contact no:</td>
<td><input type="tel" name="contact" class="form-control"></td></tr>
<tr><td>Gender*</td><td><select name="gender" title="gender" required="" class="form-control">
  <option value="">-- Select Gender --</option>
  <option value="Male">Male</option>
    <option value="Female">Female</option>
</select></td></tr>
<tr><td>Picture:</td>
<td><input type="file" name="uploadimg" value="Chosse File" class="form-control"></td></tr>
<td>Date of Birth:*</td>
<td><input type="date" data-date-inline-picker="true" name="dob" class="form-control" required></tr>
<tr><td>Account Type</td>
<td><input type="text" name="account_type" readonly class="form-control" value="Customer"></td></tr>

<tr><td>Password:*</td>
<td><input type="password" name="password" class="form-control" required></td></tr>
<td>Confirm Password:*</td>
<td><input type="password" name="cpassword" class="form-control" required></td></tr>
<tr><td></td>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Register</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>