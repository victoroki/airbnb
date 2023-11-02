<?php
include("header.php");

$query1="SELECT * FROM `houses`";
$run1=mysqli_query($con,$query1);






if(isset($_GET['cart']))
{
$house_id=$_GET['cart'];


$query1="SELECT * FROM `cart` WHERE `house_id`='$house_id'";
$run1=mysqli_query($con,$query1);
$row1=mysqli_num_rows($run1);
if($row1<1)
  {
    $query="INSERT INTO `cart`(`user_id`, `house_id`) VALUES ('$user_id','$house_id')";
  $run=mysqli_query($con,$query);
  if(isset($run)){
    echo "<script>alert('Successfully Added to Cart!')</script>";
    echo "<script>window.open('index.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('index.php','self')</script>";
    exit();
  }

  }
else
{
  echo "<script>alert('Already Added to Cart')</script>";
}

}



if (isset($_POST['search'])) {
  $s_Rooms = $_POST['s_Rooms'];
  $s_Price = $_POST['s_Price'];
  $s_City = $_POST['s_City'];
  $s_Area = $_POST['s_Area'];

  if ($s_Rooms!="") {
    if ($s_Price!="") {
     if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `Price`<='$s_Price' AND `Room_Area`='$s_Area'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `Price`<='$s_Price'";
       $run1=mysqli_query($con,$query1);
     }
    }else
    {
      if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms' AND `Room_Area`='$s_Area'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Rooms`='$s_Rooms'";
       $run1=mysqli_query($con,$query1);

     }
    }
  }else
  {
    if ($s_Price!="") {
     if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Price`<='$s_Price' AND `Room_Area`='$s_Area'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Price`<='$s_Price'";
       $run1=mysqli_query($con,$query1);
     }
    }else
    {
      if ($s_Area!="") {
       $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%' AND `Room_Area`='$s_Area'";
       $run1=mysqli_query($con,$query1);
     }else
     {
      $query1="SELECT * FROM `houses` WHERE `City` LIKE '%$s_City%'";
       $run1=mysqli_query($con,$query1);
     }
    }
  } 
  
}



if (isset($_GET['house_id'])) {
  $house_id=$_GET['house_id'];
    $query7="DELETE FROM `houses` WHERE `id`='$house_id'";
    $run7=mysqli_query($con,$query7);
    if(isset($run7)){
       echo "<script>alert('Successfully deleted!')</script>";
       echo "<script>window.open('houses.php','self')</script>";
     }
     else{
       echo "<script>alert('unknown error!')</script>";
       echo "<script>window.open('houses.php','self')</script>";
     }
}



?>




<br>
<h2 style="text-align: center;font-size: 48px"><span class="badge badge-danger">Houses/Apartments</span></h2>


<form method="post" enctype="multipart/form-data">
<div class="container alert alert-dark">
  <table class="" style="margin-left: ">
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
</div>
</form>

<div class="row">
<?php 
       if ($run1==TRUE)
         {
       while($data1=mysqli_fetch_array($run1))
       {?>
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
<a class="btn btn-success" href="house-detail.php?view=<?php echo $data1['id']; ?>">View</a><a class="btn btn-warning" href="update_house.php?house_id=<?php echo $data1['id']; ?>">Update</a><a class="btn btn-danger" href="houses.php?house_id=<?php echo $data1['id']; ?>">Delete</a></p>
</div>
</div>
<?php  
       }
     }
     ?>









</div>






</body>
</html>