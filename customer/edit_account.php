<?php 
 
include("includes/db.php");
//include("function/function.php");
 if(isset($_GET['edit_account']))
  {
 $c_email=$_SESSION['customer_email'];

 $get_email= "select * from customers where customer_email=$c_email";
 	$run_admin = mysqli_query($con,$get_email);
   $row_email = mysqli_fetch_array($run_admin);
   
 $customer_id = $row_email['customer_id'];
 $customer_email=$row_email['customer_email'];
 $name = $row_email['customer_name'];

      $pass = $row_email['customer_pass'];
      $contact = $row_email['customer_contact'];
      $address = $row_email['customer_address'];
      $image = $row_email['customer_image'];
     
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
	<title></title>
</head>
<body>




  <h2 style="text-align: center;">Edit account</h2><br>
	
	<form method="POST" enctype="">

		
		<b>Customer_Name</b>
			<input type="text" name="name" value="<?php echo $name; ?>">
		<br>
		<b>Customer_Pass</b>
		
			<input type="password" name="pass" value="<?php echo $pass; ?>">
		<br>
		<b>Contact</b>
		
			<input type="number" name="contact" value="<?php echo $contact; ?>">
		<br>
		<b>Address</b>
		
			<input type="text" name="price" value="<?php echo $address; ?>">
		<br>
		
			<button type="submit" name="update_account">Edit User</button>
			<a href="listproduct.php" class="btn btn-primary">Back</a>
		</div>
	</form>


</body>
</html>
 	<?php 
        
    	
    if(isset($_POST['update_account']))
    {
    	
    	$name = $_POST['name'];
    	$pass = $_POST['pass'];
    	$address = $_POST['address'];
    	$contact= $_POST['contact'];
    	$insert_account = "UPDATE `customers` SET `customer_name`='$name',`customer_pass`='$pass',`customer_address`='$address',`customer_phone`='$contact' WHERE customer_id='$customer_id'";
    	$run_account = mysqli_query($con,$insert_account);
    	if($run_account)
    	{
    		echo " update is done sucessfully";
    		header('location:listproduct.php');
      }
  
    	else
    	{
    		echo "<script> alert'update is not done sucessfully' </script>";
    		//echo "<script>window.open('index.php?view_cat','_self')</script>";
    	}
   }
 

 	 ?>