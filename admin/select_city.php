<?php
include("header.php");

$query2="SELECT * FROM `cities`";
$run2=mysqli_query($con,$query2);

?>



<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" action="add_house.php">
<div class="alert alert-danger">
  <h2><span class="badge badge-danger">Select City</span></h2>
<table class="table table-striped">
<tr><td>Select City*</td><td>
	

	<select name="city" title="city" required="" class="form-control">
    <option value="">-- Select Select City --</option>
<?php
if ($run2==TRUE)
         {
       while($data2=mysqli_fetch_array($run2))
       {
?>
    <option value="<?php echo $data2['city']; ?>"><?php echo $data2['city']; ?></option>
<?php  
       }
     }
     ?>
    
</select>
</td></tr>

<tr><td></td>
<td><br><div ><button type="submit" name="submit_city" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>