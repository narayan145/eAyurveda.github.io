<?php 
   session_start();
   include("includes/db.php");
   include("function/function.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.qrc{
			height:20px;
			width:20px;
			position:absolute;
			left:630px;
			top:350px;
			background-size: 100% 100%;
		}
		.esewa{
			height:20px;
			width:20px;
			position:absolute;
			left:380px;
			top:390px;
			background-size: 100% 100%;

		}
		
	</style>
<title></title>
</body>
</html>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">
<link rel="stylesheet" type="text/css" href="style/myaccount.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<div class="esewa">
		<img src='../admin_area/images/esewa qr3.jpg'>
	</div>
	<div class="qrc">
		<img src='../admin_area/images/esewa qr2.jpg'>
	</div>
<div class="header">
	
    <nav class="navbar">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#">E-Ayurveda <br> System</a>
    		</div>
    	<ul class="nav navbar-nav">
      		<li class="active"><a href="#"></a></li>
    	</ul>
    	<ul class="nav navbar-nav navbar-right" style="margin-right: 30px;">
      		<!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
		<?php 	 
	        if(!isset($_SESSION['customer_email']))
	        {
	         	echo"<li><a href='../checkout.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
	        }
	      	else 
	      	{
	        	echo"<li><a href='../logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
	      	}
    	?>
    	</ul>
 		 </div>
	</nav>
</div>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar" style="margin-top: 30px;">
				 <?php 
				 $customer_email=$_SESSION['customer_email'];
                  $get_profile="select * from customers where customer_email='$customer_email' ";
                  $run_profile = mysqli_query($con,$get_profile);
                 while($row_profile = mysqli_fetch_array($run_profile))
                 {
                 	$image=$row_profile['customer_image'];

                  echo"
				 <div class='profile-userpic'>
				 <img src='customer_photo/$image' class='img-responsive'>
				 </div>";
				}
			        if(!isset($_SESSION['customer_email']))
			        {
			          echo "<b>WelcomeGuest</b>";
			        }
			         else
			         {
			          echo "<b>Welcome:". "<span style='color:green'>" .$_SESSION['customer_email']."</b>";
			        }
				?>  
				<br><br>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					</div>
				</div>
				<div class="profile-usermenu" style="background-color: green;">
					<ul class="nav">
						<li class="active">
							<a href="my_account.php?view_order" style="color:white;" onMouseOver="this.style.color='red'>
							<i class="glyphicon glyphicon-home"></i>
							View Order </a>
						</li>
						<li>
							<a href="my_account.php?change_pass" target="_blank" style="color:white;">
							<i class="glyphicon glyphicon-edit"></i>
							Change Password </a>
						</li>
						<li>
							<a href="my_account.php?delete_account" style="color:white;">
							<i class="glyphicon glyphicon-user"></i>
							Delete Account </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   <?php echo getDefault();

                  if(isset($_GET['view_order']))
                  {
                  	include("view_order.php");
                  }
                  if(isset($_GET['change_pass']))
                  {
                  	include("change_password.php");
                  }
                  if(isset($_GET['delete_account']))
                  {
                  	include("delate.php");
                  }
			    ?>
            </div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
