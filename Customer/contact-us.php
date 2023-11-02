<?php
include("header.php");











if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$query="INSERT INTO `contact`(`user_id`, `name`, `email`, `subject`, `message`) VALUES ('$user_id','$name','$email','$subject','$message')";
  $run=mysqli_query($con,$query);
  if(isset($run)){
    echo "<script>alert('Your Query Sent Successfully!')</script>";
    echo "<script>window.open('index.php','self')</script>";
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
<h2 style="text-align: center;font-size: 48px"><span class="badge badge-danger">Contact US</span></h2>
<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-danger">
 
<table class="table table-striped">
<tr><td>Name:*</td>
<td><input type="text" name="name" value="<?php echo $data4['f_name']; ?> <?php echo $data4['l_name']; ?>" class="form-control" readonly></td></tr>
<tr><td>UserID/Email:*</td>
<td><input type="email" name="email" class="form-control" readonly value="<?php echo $data4['email']; ?>"></td></tr>
<td>Subject:*</td>
<td><input type="text" name="subject" class="form-control" required></td></tr>
<td>Message:*</td>
<td><textarea name="message" class="form-control"></textarea></td></tr>
<tr><td></td>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Send</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>






</body>
</html>