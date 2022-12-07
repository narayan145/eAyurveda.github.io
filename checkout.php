<?php
     session_start();
      include("includes/db.php");
      include("function/function.php");
     // error_reporting(0);
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/shopping.css">
  <link rel="stylesheet" type="text/css" href="style/checkout.css">
	<link rel="stylesheet" href="bootstrap/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $money = $_POST['totalsum'];
    if(isset($money)) {
      $_SESSION['total'] = $money;
    }
  ?>
 <div class="header" >
    <nav class="navbar">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">E-Ayurveda <br> System</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="customer/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
       <?php   
        
      if(!isset($_SESSION['customer_email']))
       {
          // echo"<li><a href='checkout.php'><span class='glyphicon glyphicon-log-in'></span> Login </a></li>";
        }
      else 
      {
        echo"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
      }
       ?>
  </div>
</nav>
</div>
<?php 
  if(!isset($_SESSION['customer_email']))
  {
    include ("c_login.php");
  }
  else
  {
    include("order.php");
  }
 ?>
 <div class="a" style="height: 58px;"></div>
<?php include('footer.php'); ?>