<?php
include("header.php");

if(isset($_GET['query_id']))
{
$query_id=$_GET['query_id'];
$query2="SELECT * FROM `contact` WHERE `id`='$query_id'";
$run2=mysqli_query($con,$query2);
$data2=mysqli_fetch_array($run2);
}

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$Answer=$_POST['Answer'];

$query="UPDATE `contact` SET `status`='Answered' WHERE `id`='$query_id'";
$run=mysqli_query($con,$query);

$to_email = $email;
$subject = "Reply of ".$subject;

$body ='<html>
<body>
<h3>Your Query</h3>
<p>'.$message.'</p>
<br>
<br>
<h3>Answer</h3>
<p>'.$Answer.'</p>
</body>
</html>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: test@gmail.com";
mail($to_email, $subject, $body, $headers);


  if(isset($run)){
    echo "<script>alert('Quer Answer Submited!')</script>";
    echo "<script>window.open('contact_quries.php','self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('contact_quries.php','self')</script>";
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
  <h2><span class="badge badge-danger">Answer The Query</span></h2>
<table class="table table-striped">
<tr><td>Customer Name:*</td>
<td><input type="text" name="name" class="form-control" readonly  value="<?php echo $data2['name']; ?>"></td></tr>
<tr><td>Email:*</td>
<td><input type="text" name="email" class="form-control" readonly value="<?php echo $data2['email']; ?>"></td></tr>
<tr><td>Subject:*</td>
<td><input type="text" name="subject" class="form-control"  readonly value="<?php echo $data2['subject']; ?>"></td></tr>
<tr><td>Message*</td><td><textarea name="message" readonly class="form-control"><?php echo $data2['message']; ?></textarea></td></tr>

<tr><td>Answer*</td><td><textarea name="Answer" class="form-control"></textarea></td></tr>

<tr><td></td>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>