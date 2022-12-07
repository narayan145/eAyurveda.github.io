<?php 	
   include("includes/db.php");
   if (isset($_GET['edit_id']))
   {
   	$cat_id = $_GET['edit_id'];
   	$edit_cat = "select * from category where cat_id='$cat_id'";
   	$run_cat = mysqli_query($con,$edit_cat);
   	$row_cat = mysqli_fetch_array($run_cat);
   	$cat_title = $row_cat['cat_title'];
   	$cat_edit_id = $row_cat['cat_id'];
   }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

 </head>
 <body>
 <div class="row">
   <div class="col-sm-12 col-md-4"></div>
   <div class="col-sm-12 col-md-4" style="background-color: #e8e8e8; margin-top: 40px; padding:40px;">
      <form action="" method="post">
  <h2><b>Edit This Category</b></h2><br>
Category name:<br><br>
  <input type="text" name="cat_title1" value="<?php echo $cat_title; ?>" class="form-control"><br>
  <input type="submit" name="update_cat" value="Update Category" class="btn btn-primary">
 </form>
   </div>
   <div class="col-sm-12 col-md-4"></div>
 </div>
 
 </body>
 </html>
 <?php 	
    if(isset($_POST['update_cat']))
    {
    	$cat_title123 = $_POST['cat_title1'];
    	$update_cat = "update category set cat_title='$cat_title123' where cat_id='$cat_edit_id' ";
    	$run_cat = mysqli_query($con,$update_cat);
    	if($run_cat)
    	{
    		echo " update is done sucessfully";
    		header('location:view_category.php');
      }
    	else
    	{
    		echo "<script> alert'update is not done sucessfully' </script>";
    		//echo "<script>window.open('index.php?view_cat','_self')</script>";
    	}
   }
  ?>