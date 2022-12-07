<?php 
	session_start();
   include("includes/db.php");
   include("function/function.php");
   include("header.php");
?>
<html>
	<head>
		<title>
		 	<link rel="stylesheet" type="text/css" href="style/payment.css">
		</title>	
	</head>
	<body>
		<div class="payment" align="center" style="padding: 20px; margin-top: 120px; margin-bottom: 54px;">
			<h1>payment option for you</h1>
			<?php 
			    $ip = getRealIpAddr();
			    $get_customer = "select * from customers where customer_ip='$ip'";
			    $run_customer = mysqli_query($con,$get_customer);
			    $row_customer = mysqli_fetch_array($run_customer);
			    if($row_customer)
			    {
			        $customer_id = $row_customer['customer_id'];
			    }
		    ?>
			<!-- <b>pay with</b><img src="image/images.png"> or  --><a href="order.php?c_id=<?php echo $customer_id; ?>" ><b><h3>Pay Online</h3></b></a>
			<b> if you select "pay online" option then please check your email or account to find the involve no for your order </b>
		</div>
	</body>
</html>
<?php include("footer.php"); ?>