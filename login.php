<?php 
include("header.php"); 

?>

<style>
body {
  background-image: url('bg8.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>



<div style="width:400px;background-color:#d44d84;margin: auto;margin-top:200px;color:white;height:400px;padding:30px;">
  <form method="post">
    <h2 style="text-align: center;">Log In</h2>
<table align="center" class="table-responsive-sm">
<tr><td><br>Email:</td></tr>
<tr></tr>
<tr><td><input type="email" name="email" required style="height:30px;font-size:14pt" size="30"  class="form-control"></td></tr>
<tr><td><br>Password:</td></tr>
<tr><td><input type="password" name="psw" required style="height:30px;font-size:14pt" size="30"  class="form-control"></td></tr>

<tr><td><br><br><div align="center"><button name="done" required  class="form-control">Log In</button></div><br></td></tr>
</table>
</form>



</div>









</body>
</html>

<?php
if(isset($_POST["done"])){
  $email=$_POST["email"];
    $pass=$_POST["psw"];
    $query1="SELECT * FROM `users` WHERE  email='$email' AND password='$pass'";
    $run1=mysqli_query($con,$query1);
    $row1=mysqli_num_rows($run1);
  
  if($row1>0){
    $data1=mysqli_fetch_assoc($run1);
    $id1=$data1['id'];
    $account_type=$data1['account_type'];
    if ($account_type=="Customer") {
      $_SESSION['uid1']=$id1;
      header("location:Customer/index.php");
    }elseif ($account_type=="Admin") {
      $_SESSION['uid2']=$id1;
      header("location:admin/index.php");
    }else{
      echo "<script>alert('User name OR Password is invalid')</script>";
    }
  }
  else{
    echo "<script>alert('User name OR Password is invalid')</script>";
  }



}
?>