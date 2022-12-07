<?php include("layout/header.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		th,tr{border:3px groove black;}
	</style>
</head>
<body>
<div class="product">
  <table align="center" width="794" bgcolor="pink">
  	<tr align="center">
  		<td colspan="8"><h2>View All Products</h2></td>
  	</tr>
  	<tr>
  		<th>Product ID</th>
  		<th>Title</th>
  		<th>Image</th>
  		<th>Price</th>
  		<th>Status</th>
  		<th>Edit</th>
  		<th>Delete</th>
  	</tr>
  	<?php 
     include("includes/db.php");
     $get_pro = "select * from products ";
     $run_pro = mysqli_query($con,$get_pro);
     while( $row_pro = mysqli_fetch_array($run_pro))
     {
     	$pro_id = $row_pro['product_id'];
     	$pro_title = $row_pro['product_name'];
     	$pro_image = $row_pro['product_img'];
     	$pro_price = $row_pro['product_price'];
  	 ?>
     <?php 
      if(isset($_POST['delete'])){
          $sql = 'DELETE FROM table product where product_id=$product_id';
           mysqli_query($con,$sql);
      }
     ?>
     <form method="POST">
  	<tr align="center" >
  		<td><?php echo $pro_id; ?></td>
  		<td><?php echo $pro_title; ?></td>
  		<td><img src="product_image/<?php echo $pro_image; ?>" width="50" height="50"></td>
  		<td><?php echo $pro_price; ?></td>
  		<td><b>active</b></td>
  		
  	
  		<td><a href="editproduct.php?edit_id=<?php echo $pro_id ?>" class="btn btn-success">Update</a></td>
  		<td><a href="deleteproduct.php?delete_id=<?php echo $pro_id ?>" class="btn btn-danger">Delete</a></td>
  	</tr>
  </form>
  <?php } ?>
  </table>
</div>
</body>
</html>