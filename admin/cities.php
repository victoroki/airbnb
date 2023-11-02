<?php
include("header.php");



$query5="SELECT * FROM `cities`";
$run5=mysqli_query($con,$query5);

if (isset($_GET['city'])) {
	$city=$_GET['city'];
	$query6="DELETE FROM `cities` WHERE `city`='$city'";
    $run6=mysqli_query($con,$query6);
    $query7="DELETE FROM `areas` WHERE `city`='$city'";
    $run7=mysqli_query($con,$query7);
    if(isset($run6) & isset($run7)){
       echo "<script>alert('Successfully deleted!')</script>";
       echo "<script>window.open('cities.php','self')</script>";
     }
     else{
       echo "<script>alert('unknown error!')</script>";
       echo "<script>window.open('cities.php','self')</script>";
     }
}

if (isset($_GET['area'])) {
	$area=$_GET['area'];
    $query7="DELETE FROM `areas` WHERE `area`='$area'";
    $run7=mysqli_query($con,$query7);
    if(isset($run7)){
       echo "<script>alert('Successfully deleted!')</script>";
       echo "<script>window.open('cities.php','self')</script>";
     }
     else{
       echo "<script>alert('unknown error!')</script>";
       echo "<script>window.open('cities.php','self')</script>";
     }
}




?>

<br>
<h2 style="text-align: center;"><span class="badge badge-primary">Repository</span></h2>



			
		
<div class="container">
  <table align="center" class="table table-bordered">
<thead class="thead-dark">
<tr>
<th>City Name</th>
<th>Area Name</th>
</tr>
</thead>

<?php 
       if ($run5==TRUE)
         {
       while($data=mysqli_fetch_array($run5))
       {
        $city=$data['city'];
        $query8="SELECT * FROM `areas` WHERE `city`='$city'";
        $run8=mysqli_query($con,$query8);
        $row8=mysqli_num_rows($run8);
        if ($row8>0) {}

        ?>
            <tr>

         <td><?php echo $data['city']; ?>
         	<span style="float: right;">
          	<a href="update_city.php?city=<?php echo $data['city']; ?>" class="btn btn-warning btn-sm">Update</a>
          	<a href="cities.php?city=<?php echo $data['city']; ?>" class="btn btn-danger btn-sm">Delete</a>
          	</span>
         </td>
         <td><?php 
         if ($run8==TRUE)
         {
       while($data8=mysqli_fetch_array($run8))
       {
          ?>
          <div>
          <span><?php echo $data8['area']; ?></span>
          <span style="float: right;">
          	<a href="update_area.php?area=<?php echo $data8['area']; ?>&city=<?php echo $data['city']; ?>" class="btn btn-warning btn-sm">Update</a>
          	<a href="cities.php?area=<?php echo $data8['area']; ?>" class="btn btn-danger btn-sm">Delete</a>
          	</span>
          	</div>
          	<br>
<?php  
       }
     }
     ?>


          </td>
         
         
         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
        </div>

</body>
</html>