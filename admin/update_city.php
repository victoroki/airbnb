<?php
include("header.php");

if (isset($_GET['city'])) {
	$cityname=$_GET['city'];
	

}

if(isset($_POST['submit']))
{
$city=$_POST['city'];
$query1="SELECT * FROM `cities` WHERE `city`='$city'";
$run1=mysqli_query($con,$query1);
$row1=mysqli_num_rows($run1);
if($row1<1)
{
$query="UPDATE `cities` SET `city`='$city' WHERE `city`='$cityname'";
  $run=mysqli_query($con,$query);
  $query2="UPDATE `areas` SET `city`='$city' WHERE `city`='$cityname'";
  $run2=mysqli_query($con,$query2);
  if(isset($run) & isset($run2)){
    echo "<script>alert('Successfully City Updated!')</script>";
    echo "<script>window.open('cities.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('cities.php','self')</script>";
    exit();
  }
  }else{
  	echo "<script>alert('This City Already Exist.')</script>";
  }
}
?>



<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-danger">
  <h2><span class="badge badge-danger">Update City</span></h2>
<table class="table table-striped">

<tr><td>Enter City Name:*</td></tr>
<tr><td><input type="text" name="city" class="form-control" required style="height: 50px;font-size: 24px;font-weight: bold" value="<?php echo $cityname; ?>"></td></tr>

<tr>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>