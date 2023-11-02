<?php
include("header.php");



$query5="SELECT * FROM `cloths` WHERE `status`='Approved'";
$run5=mysqli_query($con,$query5);

$query6="SELECT * FROM `cloths` WHERE `status`='Pending'";
$run6=mysqli_query($con,$query6);

$query7="SELECT * FROM `cloths` WHERE `status`='Rejected'";
$run7=mysqli_query($con,$query7);



?>

<br>
<h2 style="text-align: center;"><span class="badge badge-primary">Manage Donation Requests</span></h2>


<!-- Nav pills -->
  <ul class="container nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home">Approved Requests</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">Pending Requests</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2">Rejected Requests</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="tab-pane active"><br>
      <table align="center" class="table table-striped">
<!-- <caption>List of Registered User</caption> -->
<tr>
<th>Doner Image</th>
<th>Doner Name</th>
<th>Cloth Type</th>
<th>No. of Cloth</th>
<th>Detail</th>
<th>Date</th>
<th>Cloth Image</th>
<th>Coupon No.</th>
<th>Address</th>
<th>Status</th>
<th>Action</th>
<th>Donated To</th>
<th>City</th>
</tr>

<?php 
       if ($run5==TRUE)
         {
       while($data=mysqli_fetch_array($run5))
       {
        $user_id1=$data['user_id'];
        $query8="SELECT * FROM `users` WHERE `id`='$user_id1'";
        $run8=mysqli_query($con,$query8);
        $data8=mysqli_fetch_array($run8);

        $cloth_id=$data['id'];
        $query11="SELECT * FROM `coupons` WHERE `cloth_id`='$cloth_id'";
        $run11=mysqli_query($con,$query11);
        $data11=mysqli_fetch_array($run11);

        $query12="SELECT * FROM `donees` WHERE `cloth_id`='$cloth_id'";
        $run12=mysqli_query($con,$query12);
        $data12=mysqli_fetch_array($run12);

        ?>
            <tr>
         
         <td><img src='<?php echo "../profiles/".$data8['image']; ?>' style="width:100px;height:100px;border-radius:50%;"></td>
         <td><?php echo $data8['f_name']; ?> <?php echo $data8['l_name']; ?></td>
         <td><?php echo $data['type']; ?></td>
         <td><?php echo $data['number']; ?></td>
         <td><?php echo $data['detail']; ?></td>
         <td><?php echo $data['date']; ?></td>
         <td><img src='<?php echo "../Cloth_img/".$data['image']; ?>' style="height:100px;"></td>
         <td><?php echo $data11['coupon_no']; ?></td>
         <td><?php echo $data11['address']; ?></td>
         <?php
         if ($data11['status']=="Donated") {
           ?>
           <td><a href="#" class="btn btn-success">Donated</a></td>
          <td></td>
          <td><?php echo $data12['name']; ?></td>
          <td><?php echo $data12['City']; ?></td>
           <?php
         }else{
          ?>
          <td><a href="#" class="btn btn-warning">In NGO’s
repository</a></td>
          <td><a href="donate.php?cloth_id=<?php echo $data['id']; ?>" class="btn btn-primary">Donate</a></td>
          <td></td>
          <td></td>
           <?php

         }
         ?>
         
         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
    
    </div>
    <div id="menu1" class="tab-pane fade"><br>
      <table align="center" class="table table-striped">
<!-- <caption>List of Registered User</caption> -->
<tr>
<th>Doner Image</th>
<th>Doner Name</th>
<th>Cloth Type</th>
<th>No. of Cloth</th>
<th>Detail</th>
<th>Date</th>
<th>Cloth Image</th>
<th>Action</th></tr>
</tr>


<?php 
       if ($run6==TRUE)
         {
       while($data6=mysqli_fetch_array($run6))
       {
        $user_id2=$data6['user_id'];
        $query9="SELECT * FROM `users` WHERE `id`='$user_id2'";
        $run9=mysqli_query($con,$query9);
        $data9=mysqli_fetch_array($run9);
        ?>
            <tr>
         
         
         <td><img src='<?php echo "../profiles/".$data9['image']; ?>' style="width:100px;height:100px;border-radius:50%;"></td>
         <td><?php echo $data9['f_name']; ?> <?php echo $data9['l_name']; ?></td>
         <td><?php echo $data6['type']; ?></td>
         <td><?php echo $data6['number']; ?></td>
         <td><?php echo $data6['detail']; ?></td>
         <td><?php echo $data6['date']; ?></td>
         <td><img src='<?php echo "../Cloth_img/".$data6['image']; ?>' style="height:100px;"></td>
         <td><a href="request-approve.php?Approved=<?php echo $data6['id']; ?>" class="btn btn-primary">Approve</a><a href="request-reject.php?Rejected=<?php echo $data6['id']; ?>" class="btn btn-danger">Reject</a>
       </td>
         
         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
    
    </div>
    <div id="menu2" class="tab-pane fade"><br>
      <table align="center" class="table table-striped">
<!-- <caption>List of Registered User</caption> -->
<tr>
<th>Doner Image</th>
<th>Doner Name</th>
<th>Cloth Type</th>
<th>No. of Cloth</th>
<th>Detail</th>
<th>Date</th>
<th>Cloth Image</th>
<th>Status</th></tr>


<?php 
       if ($run7==TRUE)
         {
       while($data7=mysqli_fetch_array($run7))
       {
        $user_id3=$data7['user_id'];
        $query10="SELECT * FROM `users` WHERE `id`='$user_id3'";
        $run10=mysqli_query($con,$query10);
        $data10=mysqli_fetch_array($run10);
        ?>
            <tr>
         
         <td><img src='<?php echo "../profiles/".$data10['image']; ?>' style="width:100px;height:100px;border-radius:50%;"></td>
         <td><?php echo $data10['f_name']; ?> <?php echo $data10['l_name']; ?></td>
         <td><?php echo $data7['type']; ?></td>
         <td><?php echo $data7['number']; ?></td>
         <td><?php echo $data7['detail']; ?></td>
         <td><?php echo $data7['date']; ?></td>
         <td><img src='<?php echo "../Cloth_img/".$data7['image']; ?>' style="height:100px;"></td>
         <td><a class="btn btn-danger">Rejected</a></td>
         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
    
    </div>
    
  </div>


</body>
</html>