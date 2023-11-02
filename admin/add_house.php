<?php
include("header.php");

if(isset($_POST['submit_city']))
{
$city=$_POST['city'];
$query2="SELECT * FROM `areas` WHERE `city`='$city'";
$run2=mysqli_query($con,$query2);
}

if(isset($_POST['submit']))
{
$City=$_POST['City'];
$Area=$_POST['Area'];
$Address=$_POST['Address'];
$Type=$_POST['Type'];
$Rooms=$_POST['Rooms'];
$Room_Area=$_POST['Room_Area'];
$Price=$_POST['Price'];
$Detail=$_POST['Detail'];
$filename=$_FILES["uploadimg"]["name"];
$tempname=$_FILES["uploadimg"]["tmp_name"];
$folder="../houses/".$filename;
move_uploaded_file($tempname,$folder);

$query="INSERT INTO `houses`(`City`, `Area`, `Address`, `Type`, `Rooms`, `Room_Area`, `Price`, `Detail`, `image`) VALUES ('$City','$Area','$Address','$Type','$Rooms','$Room_Area','$Price','$Detail','$filename')";
  $run=mysqli_query($con,$query);
  if(isset($run)){
    echo "<script>alert('Successfully Added!')</script>";
    echo "<script>window.open('houses.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('houses.php','self')</script>";
    exit();
  }

}
?>



<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-danger">
  <h2><span class="badge badge-danger">Add House / Apartment</span></h2>
<table class="table table-striped">
<tr><td>City:*</td>
<td><input type="text" name="City" class="form-control" readonly value="<?php echo $city; ?>"></td></tr>
<tr><td>Select Area*</td>
	<td>
	<select name="Area" title="Area" required="" class="form-control">
    <option value="">-- Select Select Area --</option>
<?php
if ($run2==TRUE)
         {
       while($data2=mysqli_fetch_array($run2))
       {
?>
    <option value="<?php echo $data2['area']; ?>"><?php echo $data2['area']; ?></option>
<?php  
       }
     }
     ?>
    
</select>
</td></tr>
<tr><td>Address*</td><td><textarea name="Address" class="form-control"></textarea></td></tr>
<tr><td>Type*</td><td><select name="Type" title="Type" required="" class="form-control">
  <option value="">-- Select Type --</option>
  <option value="House">House</option>
    <option value="Apartment">Apartment</option>
</select></td></tr>
<td>Rooms:*</td>
<td><input type="number" name="Rooms" class="form-control" required></td></tr>
<td>Room Area:*</td>
<td><input type="text" name="Room_Area" class="form-control" required></td></tr>
<td>Price:*</td>
<td><input type="number" name="Price" class="form-control" required></td></tr>
<tr><td>Detail*</td><td><textarea name="Detail" class="form-control"></textarea></td></tr>
<tr><td>Image:</td>
<td><input type="file" name="uploadimg" value="Chosse File" class="form-control"></td></tr>
<tr><td></td>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>