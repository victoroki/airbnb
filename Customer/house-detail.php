<?php
include("header.php");


if(isset($_GET['view'])){
    $id=$_GET['view'];
    $query2="SELECT * FROM `houses` WHERE id='$id'";
    $run2=mysqli_query($con,$query2);
    $data2=mysqli_fetch_assoc($run2);
}




?>



<h2><span class="badge badge-info">House/Apartment Detail</span></h2>


<form method="post" enctype="multipart/form-data" action="index.php">
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


<div class="container">
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

</p>
<br>
<br>
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