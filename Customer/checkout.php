<?php
include("header.php");


if(isset($_GET['checkout'])){
    $id=$_GET['checkout'];
    $query2="SELECT * FROM `houses` WHERE id='$id'";
    $run2=mysqli_query($con,$query2);
    $data2=mysqli_fetch_assoc($run2);
}



if(isset($_POST['order']))
{
$card_name=$_POST['card_name'];
$card_num=$_POST['card_num'];
$exp_month=$_POST['exp_month'];
$cvv=$_POST['cvv'];
$exp_year=$_POST['exp_year'];
$order_date=date("Y-m-d");

$query3="SELECT * FROM `dum_card` WHERE `card_name`='$card_name' AND `card_num`='$card_num' AND `exp_month`='$exp_month' AND `cvv`='$cvv' AND `exp_year`='$exp_year'";
  $run3=mysqli_query($con,$query3);
  $row3=mysqli_num_rows($run3);
  if ($row3>0) {
    $query="INSERT INTO `orders`(`card_name`, `card_num`, `exp_month`, `cvv`, `exp_year`, `userid`, `house_id`, `date`) VALUES ('$card_name','$card_num','$exp_month','$cvv','$exp_year','$user_id','$id','$order_date')";
  $run=mysqli_query($con,$query);

 $query5="UPDATE `houses` SET `status`='in_use' WHERE `id`='$id'";
$run5=mysqli_query($con,$query5);


  if(isset($run5)){
    echo "<script>alert('Successfully Orderd!')</script>";
    echo "<script>window.open('index.php,'self')</script>";
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('index.php','self')</script>";
  }
  }else
  {
    echo "<script>alert('Enter Correct Card Credentials!')</script>";
  }


}




?>



<h2><span class="badge badge-danger">Checkout</span></h2>


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
	<div class="row">
		<div class="col-md-6">
			<form method="post" enctype="multipart/form-data">
<div class="alert alert-primary">
  <h2><span class="badge badge-primary">Checkout Form</span></h2>
              <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;font-size: 36px;"></i>
              <i class="fa fa-cc-amex" style="color:blue;font-size: 36px;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;font-size: 36px;"></i>
              <i class="fa fa-cc-discover" style="color:orange;font-size: 36px;"></i>
            </div>
<table class="table table-striped">
<tr><td>Name on Card:*</td></tr>
<tr><td><input type="text" name="card_name" class="form-control" required placeholder="Asad Ali"></td></tr>
<tr><td>Credit card number:</td></tr>
<tr><td><input type="text" name="card_num" class="form-control" placeholder="1111-2222-3333-4444"></td></tr>
<tr><td>Exp Month:</td></tr>
<tr><td><input type="text" name="exp_month" class="form-control" placeholder="September"></td></tr>
<tr><td>CVV:</td></tr>
<tr><td><input type="text" name="cvv" class="form-control" placeholder="352"></td></tr>
<tr><td>Exp Year:</td></tr>
<tr><td><input type="text" name="exp_year" class="form-control" placeholder="2022"></td></tr>


<tr>
<td><br><div ><button type="submit" name="order" class="btn btn-primary">Order</button></div><br><br></td></tr>
</table>
</div>
</form>
		</div>
		<div class="col-md-6">
			
		
<div align="center" class="bg bg-dark" style="margin:auto;padding: 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);">
<img src="<?php echo "../houses/".$data2['image']; ?>" alt="" style="width:100%;">
</div>
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







</div>
</div>

<br>
<br>
<br>
<br>





</body>
</html>