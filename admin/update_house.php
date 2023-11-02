<?php
include("header.php");

if (isset($_GET['house_id'])) {
	$house_id=$_GET['house_id'];
	$query2="SELECT * FROM `houses` WHERE id='$house_id'";
	$run2=mysqli_query($con,$query2);
	$data=mysqli_fetch_assoc($run2);
}





if(isset($_POST['submit']))
{
$Area=$_POST['Area'];
$Address=$_POST['Address'];
$Type=$_POST['Type'];
$Rooms=$_POST['Rooms'];
$Room_Area=$_POST['Room_Area'];
$Price=$_POST['Price'];
$Detail=$_POST['Detail'];
$query1="UPDATE `houses` SET `Area`='$Area',`Address`='$Address',`Type`='$Type',`Rooms`='$Rooms',`Room_Area`='$Room_Area',`Price`='$Price',`Detail`='$Detail' WHERE `id`='$house_id'";
    $run1=mysqli_query($con,$query1);
if(isset($run1)){
  echo "<script>alert('Record has been Successfully Updated!')</script>";
  echo "<script>window.open('update_house.php?house_id=$house_id','self')</script>";
  //exit();
}
else{
  echo "<script>alert('unknown error!')</script>";
  echo "<script>window.open('update_house.php?house_id=$house_id','self')</script>";
  //exit();
}
}
if(isset($_POST['submit1']))
{
$filename=$_FILES["uploadimg"]["name"];
$tempname=$_FILES["uploadimg"]["tmp_name"];
$folder="../houses/".$filename;
move_uploaded_file($tempname,$folder);
$query2="UPDATE `houses` SET `image`='$filename' WHERE `id`='$house_id'";
    $run2=mysqli_query($con,$query2);
if(isset($run2)){
  echo "<script>alert('Picture has been Successfully Updated!')</script>";
  echo "<script>window.open('update_house.php?house_id=$house_id','self')</script>";
  exit();
}
else{
  echo "<script>alert('unknown error!')</script>";
  echo "<script>window.open('update_house.php?house_id=$house_id','self')</script>";
  //exit();
}
}


?>

<div class="container">
<h1><span class="badge badge-danger">Update House / Apartment</span></h1>
<div class="row">
<div class="col-sm-6 col-md-6 col-lg-4">
<form method="post" enctype="multipart/form-data">
<table>
<tr><td>
<div class="card" style="width:300px">
<div class="alert alert-success">
    <img id="blah" class="card-img-top" src='<?php echo "../houses/".$data['image']; ?>' alt="Card image">
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
<tr><td>City:*</td>
<td><input type="text" name="City" class="form-control" readonly value="<?php echo $data['City']; ?>"></td></tr>
<tr><td>Select Area*</td>
	<td>
	<select name="Area" title="Area" required="" class="form-control">
    <option value="<?php echo $data['Area']; ?>"><?php echo $data['Area']; ?></option>
<?php
$City=$data['City'];
$query2="SELECT * FROM `areas` WHERE `city`='$City'";
$run2=mysqli_query($con,$query2);
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
<tr><td>Address*</td><td><textarea name="Address" class="form-control"><?php echo $data['Address']; ?></textarea></td></tr>
<tr><td>Type*</td><td><select name="Type" title="Type" required="" class="form-control">
  <option value="<?php echo $data['Type']; ?>"><?php echo $data['Type']; ?></option>
  <option value="House">House</option>
    <option value="Apartment">Apartment</option>
</select></td></tr>
<td>Rooms:*</td>
<td><input type="number" name="Rooms" value="<?php echo $data['Rooms']; ?>" class="form-control" required></td></tr>
<td>Room Area:*</td>
<td><input type="text" name="Room_Area" value="<?php echo $data['Room_Area']; ?>" class="form-control" required></td></tr>
<td>Price:*</td>
<td><input type="number" name="Price" value="<?php echo $data['Price']; ?>" class="form-control" required></td></tr>
<tr><td>Detail*</td><td><textarea name="Detail" class="form-control"><?php echo $data['Detail']; ?></textarea></td></tr>
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