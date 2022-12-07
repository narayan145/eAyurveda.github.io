<?php 
  $c = $_SESSION['customer_email'];
  $get_c = "select * from customers where customer_email='$c'";
  $run_c = mysqli_query($con,$get_c);
  $row_c = mysqli_fetch_array($run_c);
  $customer_id = $row_c['customer_id'];
?>
 <h3 style="text-align: center;">All Order Details</h3>
 <table width="750"align="center" border="2px;" style="margin-bottom: 100px;">
 	<tr>
 		<th>Order no</th>
 		<th>Due Amount</th>
 		<th>Invoice Number</th>
 		<th>Total Products</th>
    <th>Status</th>
 		<th>Paid/Unpaid</th>
 	</tr>
 	<?php 
      $i=1;
     $get_orders = "select * from customer_order where customer_id = '$customer_id'";
     $run_orders = mysqli_query($con,$get_orders);
     while($row_orders = mysqli_fetch_array($run_orders))
     {
     	$i=0;
     	$order_id = $row_orders['order_id'];
     	$due_amount = $row_orders['due_amount'];
     	$invoice_no = $row_orders['invoice_no'];
     	$products = $row_orders['total_product'];
     	$status = $row_orders['order_status'];
     	$i++;
     	if($status =='pending')
     	{
     		$status = 'unpaid';
     	}
     	else
     	{
     		$status = 'paid';
     	}
     	echo"
          <tr align='center'>
          <td>$i</td>
          <td>$due_amount</td>
          <td>$invoice_no</td>
          <td>$products</td>
          <td>$status</td>
          <td><a href='confirm.php?order_id=$order_id' target='_blank' style='color:green;'>Confirm if Paid</td>
          </tr>
        ";
     }
 	 ?>
   </table>