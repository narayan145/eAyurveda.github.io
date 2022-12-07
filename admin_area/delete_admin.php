<?php 
include("includes/db.php");
  if(isset($_GET['delete_admin']))
  { 
  	$delete_id = $_GET['delete_admin'];
  	$delete_admin = "delete from admin where admin_id='$delete_id'";
  	$run_admin = mysqli_query($con,$delete_admin);
  	if($run_admin)
  	{
  		echo "<script> alert ('One admin is delete')</script>";
  		echo "<script>window.open('view_admin.php','_self')</script>";
  	}
  	else
  	{
  		echo "<script>alert ('please try again')</script>";
  	}	
  }
 ?>