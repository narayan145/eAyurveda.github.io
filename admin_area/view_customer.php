<?php include("layout/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>view customer</title>
</head>
<body>
  <center>
  <table border="1px;" width="900px;">
    <tr>
         <tr align="center">
      <td colspan="8"><h2>View All Customer</h2></td>
    </tr>
    </tr>
  	<tr>
  		<th>
  			SN.NO
  		</th>
  		<th>Customer name</th>
  		<th>Customer email</th>
  		<th>Customer Contact</th>
  		<th>Customer Image</th>
  		<th>Customer address</th>
  		<th>Delete</th>
  	</tr>
  	<?php 
  	  include("includes/db.php");
       $get_customer = "SELECT * FROM `customers` ";
       $run_customer = mysqli_query($con,$get_customer);
       while($row_customer = mysqli_fetch_array($run_customer))
         {
           $customer_id= $row_customer['customer_id'];
	       $customer_name=$row_customer['customer_name'];
	       $customer_email = $row_customer['customer_email'];
	       //$customer_country = $row_customer['customer_country'];
	       $customer_contact = $row_customer['customer_phone'];
	       $customer_images = $row_customer['customer_image'];
	       $customer_address = $row_customer['customer_address'];
  	 ?>
  	 <tr>
  	 	<td> <?php echo $customer_id; ?></td>
  	 	<td><?php echo $customer_name; ?></td>
  	 	<td><?php echo $customer_email; ?></td>
  	 	<td><?php echo $customer_contact; ?></td>
  	 	<td><img src="../customer/customer_photo/<?php echo $customer_images; ?>" width="60px" height="60px"></td>
  	 	<td><?php echo $customer_address; ?></td>
  	 		<td><a href="delete_customer.php?delete_id=<?php echo $customer_id ?>">delete</td>
  	 </tr>
  	<?php } ?>
  </table>
</center>
</body>
</html>