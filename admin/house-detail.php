<?php
include("header.php");


if(isset($_GET['view'])){
    $id=$_GET['view'];
    $query2="SELECT * FROM `houses` WHERE id='$id'";
    $run2=mysqli_query($con,$query2);
    $data2=mysqli_fetch_assoc($run2);
}




?>


<div class="container">
<h2><span class="badge badge-danger">House/Apartment Detail</span></h2>






<div align="center" class="bg bg-dark" style="margin:auto;padding: 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);">
<img src="<?php echo "../houses/".$data2['image']; ?>" alt="" style="height:400px;border:10px solid #0099D3">
</div>
<br>
<div class="row">
<div class="col-12">
<div class="alert alert-danger">

<h4 style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);padding: 5px;background-color: white"><b><?php echo $data2['Type']; ?></b></h4>
<p>
  <b>Rooms:</b> <?php echo $data2['Rooms']; ?><br>
  <b>Area:</b> <?php echo $data2['Room_Area']; ?><br>
  <b>Price:</b> <?php echo $data2['Price']; ?><br>
  <b>City:</b> <?php echo $data2['City']; ?><br>
  <b>Address:</b> <?php echo $data2['Address']; ?><br><br>
  <b>Detail:</b> <?php echo $data2['Detail']; ?><br>
<br>
  <a class="btn btn-warning" href="update_house.php?house_id=<?php echo $data2['id']; ?>">Update</a><a class="btn btn-danger" href="houses.php?house_id=<?php echo $data2['id']; ?>">Delete</a>

</p>


</div>
</div>












</div>
</div>

<br>
<br>
<br>
<br>





</body>
</html>