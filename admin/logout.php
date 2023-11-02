<?php 
session_start();
$user_id=$_SESSION["uid2"];
if(isset($user_id))
{
   session_destroy();
   header("location:../index.php");
}
else{
    header("location:../index.php");
    exit();
}

 ?>