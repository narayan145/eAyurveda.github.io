<?php 
include("includes/db.php");
  if(isset($_GET['delete_id']))
  { 
  	$delete_id = $_GET['delete_id'];
  	$delete_customer = "delete from customers where customer_id='$delete_id'";
  	$run_customer = mysqli_query($con,$delete_customer);
  	if($run_customer)
  	{
  		echo "<script> alert ('One customer is delete')</script>";
  		echo "<script>window.open('view_customer.php','_self')</script>";
  	}
  	else
  	{
  		echo "<script>alert ('please try again')</script>";
  	}
  }
 ?>