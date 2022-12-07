<?php 
include("includes/db.php");
  if(isset($_GET['delete_cat']))
  { 
  	$delete_id = $_GET['delete_cat'];
  	$delete_cat = "delete from category where cat_id='$delete_id'";
  	$run_cat = mysqli_query($con,$delete_cat);
  	if($run_cat)
  	{
  		echo "<script> alert ('One category is delete')</script>";
  		echo "<script>window.open('view_category.php','_self')</script>";
  	}
  	else
  	{
  		echo "<script>alert ('please try again')</script>";
  	}
  }
 ?>