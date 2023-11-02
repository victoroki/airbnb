<?php
include("header.php");

if (isset($_GET['area'])) {
	$areaname=$_GET['area'];
	$city=$_GET['city'];
	

}

if(isset($_POST['submit']))
{
$area=$_POST['area'];
$query1="SELECT * FROM `areas` WHERE `area`='$area' AND `city`='$city'";
$run1=mysqli_query($con,$query1);
$row1=mysqli_num_rows($run1);
if($row1<1)
{
$query="UPDATE `areas` SET `area`='$area' WHERE `area`='$areaname'";
  $run=mysqli_query($con,$query);

  if(isset($run)){
    echo "<script>alert('Successfully Area Updated!')</script>";
    echo "<script>window.open('cities.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('cities.php','self')</script>";
    exit();
  }
  }else{
  	echo "<script>alert('This Area Already Exist.')</script>";
  }
}
?>



<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-danger">
  <h2><span class="badge badge-danger">Update Area</span></h2>
<table class="table table-striped">

<tr><td>Enter Area Name:*</td></tr>
<tr><td><input type="text" name="area" class="form-control" required style="height: 50px;font-size: 24px;font-weight: bold" value="<?php echo $areaname; ?>"></td></tr>

<tr>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>