<?php 
include("includes/db.php");
  if(isset($_GET['delete_id']))
  { 
  	$delete_id = $_GET['delete_id'];
  	$delete_pro = "delete from products where product_id='$delete_id'";
  	$run_pro = mysqli_query($con,$delete_pro);
  	if($run_pro)
  	{
  		echo "<script> alert ('One product is delete')</script>";
  		echo "<script>window.open('listproduct.php','_self')</script>";
  	}
  	else
  	{
  		echo "<script>alert ('please try again')</script>";
  	}
  }
?>