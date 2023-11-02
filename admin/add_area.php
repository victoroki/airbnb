<?php
include("header.php");

$query2="SELECT * FROM `cities`";
$run2=mysqli_query($con,$query2);

if(isset($_POST['submit']))
{
$area=$_POST['area'];
$city=$_POST['city'];
$query1="SELECT * FROM `areas` WHERE `area`='$area' AND `city`='$city'";
$run1=mysqli_query($con,$query1);
$row1=mysqli_num_rows($run1);
if($row1<1)
{
$query="INSERT INTO `areas`(`area`, `city`) VALUES ('$area', '$city')";
  $run=mysqli_query($con,$query);
  if(isset($run)){
    echo "<script>alert('Successfully Area Added!')</script>";
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
  <h2><span class="badge badge-danger">Add Specific Area For City</span></h2>
<table class="table table-striped">
<tr><td>Select City*</td><td>
	<?php
	if (isset($_GET['city'])) {
		$city=$_GET['city'];
		
		?>
		<input type="text" name="city" class="form-control" readonly value="<?php echo $city; ?>">
		<?php

	}else{
	?>

	<select name="city" title="city" required="" class="form-control">
    <option value="">-- Select Select City --</option>
<?php
if ($run2==TRUE)
         {
       while($data2=mysqli_fetch_array($run2))
       {
?>
    <option value="<?php echo $data2['city']; ?>"><?php echo $data2['city']; ?></option>
<?php  
       }
     }
     ?>
    
</select>
<?php 
}
?>

</td></tr>
<tr><td>Enter Area Name:*</td>
	<td><input type="text" name="area" class="form-control" required style="height: 50px;font-size: 24px;font-weight: bold"></td></tr>

<tr><td></td>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>