<?php
include("header.php");

$query2="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
$run2=mysqli_query($con,$query2);






if(isset($_GET['cart']))
{
$house_id=$_GET['cart'];


$query1="DELETE FROM `cart` WHERE `house_id`='$house_id'";
$run1=mysqli_query($con,$query1);

if(isset($run1)){
    echo "<script>alert('Successfully Removed From Cart!')</script>";
    echo "<script>window.open('mycart.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('index.php','self')</script>";
    exit();
  }


}

?>




<br>
<h2 style="text-align: center;font-size: 48px"><span class="badge badge-danger">MY CART</span></h2>



<form method="post" enctype="multipart/form-data">
<!-- <div class="container alert alert-dark">
  <table style="display:hidden;" class="" style="margin-left: ">
    <tr>
      <th>Rooms</th>
      <th>Price</th>
      <th>City</th>
      <th>Area</th>
    </tr>
    <tr>
      <td><input type="number" name="s_Rooms" class="form-control"></td>
      <td><input type="number" name="s_Price" class="form-control" placeholder="Max Price"></td>
      <td><input type="text" name="s_City" class="form-control"></td>
      <td><input type="text" name="s_Area" class="form-control" placeholder="10 Marla"></td>
      <td><input type="submit" name="search" value="Search" class="btn btn-success"></td>
    </tr>
  </table>
</div> -->
</form>

<div class="row">
<?php 
       if ($run2==TRUE)
         {
       while($data2=mysqli_fetch_array($run2))
       {
       	$house_id=$data2['house_id'];
       	$query1="SELECT * FROM `houses` WHERE `id`='$house_id'";
		$run1=mysqli_query($con,$query1);
		

		if (isset($_POST['search'])) {
  $s_Rooms = $_POST['s_Rooms'];
  $s_Price = $_POST['s_Price'];
  $s_City = $_POST['s_City'];
  $s_Area = $_POST['s_Area'];

  if ($s_Rooms!="") {
    if ($s_Price!="") {
     if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `Price`<='$s_Price' AND `Room_Area`='$s_Area' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `Price`<='$s_Price' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }
    }else
    {
      if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `Room_Area`='$s_Area' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);

     }
    }
  }else
  {
    if ($s_Price!="") {
     if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Price`<='$s_Price' AND `Room_Area`='$s_Area' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Price`<='$s_Price' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }
    }else
    {
      if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Room_Area`='$s_Area' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `id`='$house_id'";
       $run1=mysqli_query($con,$query1);
     }
    }
  } 
  
}
$data1=mysqli_fetch_array($run1);
if (isset($data1)) {
	

       	?>
       	
<div class="col-sm-6 col-md-4 col-lg-3">
<div class="card">
<div style="weidth:300px;height:200px; margin:auto">
<img src="<?php echo "../houses/".$data1['image']; ?>" alt="Planted Trees" style="width:100%;height:100%">
</div>
<p>
  <b>Rooms:</b> <?php echo $data1['Rooms']; ?><br>
  <b>Area:</b> <?php echo $data1['Room_Area']; ?><br>
  <b>Price:</b> <?php echo $data1['Price']; ?><br>
  <b>City:</b> <?php echo $data1['City']; ?><br>
  <b>Status:</b> <?php
  if($data1['status']<>"in_use"){
    echo "Free For Rent";
  }else{
    echo "In Use";
  }
   ?><br>
</p>

<p>
<a class="btn btn-success" href="house-detail.php?view=<?php echo $data1['id']; ?>">View</a>
<?php
if($data1['status']<>"in_use"){
?>
<a class="btn btn-primary" href="checkout.php?checkout=<?php echo $data1['id']; ?>">Buy</a>
<?php
}
?>
<a class="btn btn-danger" href="mycart.php?cart=<?php echo $data1['id']; ?>">Remove From Cart</a></p>
</div>
</div>
<?php 
} 
       }
     }else{
      echo "<h1> NO items to display </h1>";
     }
     ?>









</div>






</body>
</html>