<?php
include("dbconnection.php");

session_start();
if(isset($_SESSION['uid2']))
{
  header("location:admin/index.php");
    exit();
}
if(isset($_SESSION['uid1']))
{
  header("location:Customer/index.php");
    exit();
}

?>
<!doctype html>
<html lang="en">
<html>
<head>
<title>MOREL Corp BNB</title>
  <link rel="stylesheet" href="style.css">

<!-- Bootstrap links -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- for icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>


<nav class="navbar navbar-expand-md navbar-light" style="background-color: #d44d84">
  <a class="navbar-brand" href="index.php"><div style="font-size:24px;text-align: center;font-weight: 800;color:#fff;margin-top:-8px;margin-bottom: -8px;">MOREL Corp BNB</div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <div style="margin:px 0px 0px 0px;">
    <div class="topnav">
  <div class="navbar-nav">
    <a href="index.php">Home</a>
  </div>
</div>

</div>

</div>
<div class="topnav" style="float:right;"> 
<a class="active" href="login.php">Login</a>
<a class="active" style="background-color: red" href="sign_up.php">Register</a>
</div>

</nav>