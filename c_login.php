<html>
<head>
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta charset="utf-8">
  <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min">
  <link rel="stylesheet" type="text/css" href="style/c_login.css">
</head>
<body>
<div class="login container-fluid">
  <div class="loginc">
    <img src="image/ayurveda.jpg">
  </div>
  <div class="loginb">
    <div class="row">
      <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4">
          <div class="logina">
          <h2>E-Ayurveda System</h2>
            <h2>User Login</h2><br><br>
            <form method="post">
              <input type="email" name="email" placeholder="Enter User Email" required class="form-control"><br><br>
              <input type="password" name="pwd" placeholder="Enter password" required class="form-control"><br><br>
              <div class="checkbox">
                <!-- <label><input type="checkbox"> Remember me</label> -->
               </div>
             <button type="submit" class="btn btn-default" name="submit">Submit</button><br><br>
            <div><a href="customer/register.php" style="color:white;">New Register</div>
            </form>
          </div>
        </div>
      <div class="col-sm-12 col-md-4"></div>
    </div>
  </div>
</div>
</body>
</html>
<?php
    include('includes/db.php');
    if(isset($_POST['submit']))
    {
    	$u_email = $_POST['email'];
    	$u_pass = md5($_POST['pwd']);
    	$get_customer = "select * from customers where customer_email='$u_email' AND customer_pass='$u_pass'";
    	$run_customer = mysqli_query($con, $get_customer);
    	$row_customer = mysqli_fetch_array($run_customer);
      $customer_email = $row_customer['customer_email'];
    	$check_customer = mysqli_num_rows($run_customer);
    	//$ip_add = getRealIpAddr();
    	$sel_cart = "select * from cart";
    	$run_cart = mysqli_query($con,$sel_cart);
    	// $row_customer =mysqli_fetch_array($run_cart);
    	$check_cart = mysqli_num_rows($run_cart);
    	if( $check_customer==0)
    	{
    		echo" <script>alert(' Email address or Password doesn't matches, try again')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
    	}
    	else
    	{
    	  $_SESSION['customer_email']=$customer_email;
        
    		echo "<script>window.open('payment.php','_self')</script>";	
    	}
    }
 ?>
