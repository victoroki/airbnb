<?php
include("header.php");



$query5="SELECT * FROM `contact`";
$run5=mysqli_query($con,$query5);



?>

<br>
<h2 style="text-align: center;"><span class="badge badge-primary">Contact US Quries</span></h2>





  <table align="center" class="table table-striped">
<tr>
<th>Customer Name</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php 
       if ($run5==TRUE)
         {
       while($data=mysqli_fetch_array($run5))
       {

        ?>
            <tr>
         
         
         <td><?php echo $data['name']; ?></td>
         <td><?php echo $data['email']; ?></td>
         <td><?php echo $data['subject']; ?></td>
         <td><?php echo $data['message']; ?></td>
<?php
         if ($data['status']=="Answered") {
           ?>
           <td><a href="#" class="btn btn-success">Answered</a></td>
           <td></td>
          
          
           <?php
         }else{
          ?>
          <td><a href="#" class="btn btn-warning">Pending</a></td>
          <td><a href="reply_query.php?query_id=<?php echo $data['id']; ?>" class="btn btn-success">Answer</a></td>
          
          
           <?php

         }
         ?>
         
         
         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
    
    


</body>
</html>