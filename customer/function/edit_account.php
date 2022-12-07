<?php 
 
include("includes/db.php");
include("function/function.php");
 if(isset($_GET['edit_account']))
  {
 $c_email=$_SESSION['customer_email'];
 $get_email= "select * from customer where customer_email=$c_email";
 $run_email = mysqli_query($con,$c_email);
 $row_email = mysqli_fetch_array($run_email)
 $customer_id = $row_email['customer_id'];
 $customer_email=$row_email['customer_email'];
 $name = $row['customer_name'];
      $pass = $row['customer_pass'];
      $country = $row['customer_country'];
      $city = $row['customer_city'];
      $contact = $row['customer_contact'];
      $address = $row['customer_address'];
      $edit_image = $row['customer_image'];
 }	


 ?>

 <!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="style/form.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="col_sm_12">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" value="<?php echo $customer_name; ?>" name="Username" placeholder="Username" required="">
					<input class="text email" type="email"  value=<?php echo $customer_email; ?> name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" value="$pass" placeholder="Password" required="">
					<input class="text w3lpass" type="text" name="address" value="$address" placeholder="inter address" required="">
					<input type="text" name="phone" value="<?php echo $contact ?>" required="required">

					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="#"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		
	</div>
</div>
	<!-- //main -->
</body>
</html>


 	