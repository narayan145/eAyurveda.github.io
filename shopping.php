<?php
error_reporting(0);
	session_start(); 
	include("includes/db.php");
	include("function/function.php");
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/shopping.css">
	<link rel="stylesheet" href="bootstrap/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
    <nav class="navbar">
  		<div class="container-fluid">
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
        		 echo"<li><a href='checkout.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
        		}
      			else 
      			{
        		 echo"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
      			}
       			?>
      	<?php 
        if(!isset($_SESSION['customer_email']))
        {
          echo "<b>WelcomeGuest</b>";
        }
         else
         {
          echo "<b>Welcome:". "<span style='color:green'>" .$_SESSION['customer_email']."</b>";
        }
        ?>
    </ul>
  </div>
</nav>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<div class="category">
					<h2 style="color:white; font-size: 25px;">Categories</h2><br>
					<ul type="none">
						<?php echo getcategory(); ?>
					</ul>
				</div>


<div class="row" style="margin-top:30px;">
	<div class="col-sm-12 col-md-12">
<?php 
   include("recommendation.php");
   $product=mysqli_query($con,"select * from products");
   $matrix= array();
   while($run_product=mysqli_fetch_array($product))
   {
	   	$product_id=$run_product['product_id'];
	   	$users = mysqli_query($con,"select * from pending_order where product_id='$product_id'");
	   $username = mysqli_fetch_array($users);
	   $matrix[$username['customer_email']][$run_product['product_name']]=$run_product['product_ratting'];
   }
   $email=$_SESSION['customer_email'];
   $users = mysqli_query($con,"select * from pending_order where customer_email='$email'");
   $username = mysqli_fetch_array($users);
   $uname=$username['customer_email'];
 ?>
    <table boarder="0px;">
      <h2 style="color:white; font-size: 25px;">Recommended Item</h2>
    <?php 
         $recommendation=array();
         $recommendation=getRecommendation($matrix,$username['customer_email']);
         foreach(($recommendation) as $product=>$ratting)
         {  ?>      	 
 </table>
 <form method="post">
  <input type="text" name="product" value="<?php echo $product; ?>">
  <button type="submit" name="submit_product" style="color:white; background-color: green;">More Details</button><br><br>
</form>
  <?php } ?>
        <?php 
    if(isset($_POST['submit_product']))
    {
      $product=$_POST['product'];
      //$ratting=$_POST['ratting'];

    }
             $insert="INSERT INTO `recommendation`(`product_name`, `ratting`) VALUES ('$product','$ratting')";
              $run_insert=mysqli_query($con,$insert);
              if($run_insert)
              {
                //echo "insert sucessfully";
              }
              else
              {
                //echo "error";
              }
              $select_product="select * from recommendation ";
              $row_product=mysqli_query($con,$select_product);
              while($run_product=mysqli_fetch_array($row_product))
              {
                $product=$run_product['product_name'];
              }
              $select="select * from products where product_name='$product'";
              $row=mysqli_query($con,$select);
              while($run=mysqli_fetch_array($row))
              {
               $image=$run['product_img'];
               $a = "/ayurhome/admin_area/product_image/" . $image;
               echo "<img src=" . $a .">";  
          } ?>     
</div>
</div>











			</div>
			<div class="col-sm-12 col-md-7 ">
				<h1 style="font-size: 20px; padding:15px;">Content</h1>
				<div class="row" style="display: flex;
 					 flex-wrap: wrap;
 					 padding: 5 10 px;">
					 <?php 
					   
                        echo getallproduct();
                        echo  getproduct();
                        echo add_cart();
					  ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-2">
				<h2><a href="cart.php" style="color:white; text-decoration: none; font-size: 20px;"> GoToCart </a><span class="fa fa-cart-plus" style="color:white; text-transform: lowercase; font-size: 20px;"><?php echo items(); ?></span></h2>
				<h3 style="color:white; background-color: green; font-size:20px;">Items: <?php echo items(); ?></h3>
				<h3 style="color:white; background-color: green; font-size:20px;">Total Price: <?php echo total(); ?></h3>
				<h3 style="color:white; background-color: green; font-size:20px;"><a href="checkout.php" style="color:white; text-decoration: none;">Check Out</a></h3>
			</div>
		</div>
</div>
</div>



<div class="footer">
<div class="container-fluid">
	<div class="row"  style="color:white;">
		<div class="col-sm-12 col-md-1"></div>
		<div class="col-sm-12 col-md-2">
			<h4>About Ayurveda</h4>
			About us<br>Contact us<br>Newsroom<br>Carrers<br>
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Support</h4>
			Product Support<br>Community<br>Report Abuse
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Resources</h4>
			Webmail<br>Site Map
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Account</h4>
			My Account<br>My Renewals <br>Create Account
		</div>
		<div class="col-sm-12 col-md-2">
			<h4>Shopping</h4>
			Product Catalog<br>Find a Domain<br>Resseler Programs
		</div>
		<div class="col-sm-12 col-md-1"></div>
	</div>
	<div class="foota"  style="color:white;">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				Copyright © 2022 E-Ayurveda
			</div>
			<div class="col-sm-12 col-md-6"></div>
			<div class="col-sm-12 col-md-3">
			Follow us : 
				<a href="www.facebook.com" ><span class="fa fa-facebook" style="color:white;"> </span> </a>
				<a href="www.facebook.com"  ><span class="fa fa-twitter" style="color:white;"> </span></a>
				<a href="www.facebook.com"  ><span class="fa fa-youtube" style="color:white;"> </span></a>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>