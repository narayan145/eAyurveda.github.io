<?php
	session_start();
    include ("includes/db.php");
    include ("function/function.php");

    // getting customer ID

   // if(isset($_GET['c_id']))
   // {
    	//$customer_id =$_GET['c_id'];
      	$total_sum = $_SESSION['total'];
       $customer_email=$_SESSION['customer_email'];
    	$get_c_email = "select * from customers where customer_email='$customer_email'";
    	$run_email = mysqli_query($con,$get_c_email);
    	$row_email =mysqli_fetch_array($run_email);
    	$customer_email= $row_email['customer_email'];
    	$id=$row_email['customer_id'];

   // }

    //getting products price and number of items

     $ip_add = getRealIpAddr();
    // $total = 0;
     $sel_price = "select * from cart where ip_add='$ip_add'";
     $run_price = mysqli_query($con,$sel_price);
    $status = 'pending';
    $invoice_no = mt_rand();
     $count_pro = mysqli_num_rows($run_price);
    while ($record = mysqli_fetch_array($run_price))

	 {
	 	$product_id=$record['pro_id'];
	 	echo $product_id;
	// 	$pro_price = "select * from products where product_id='$pro_id'";
	// 	$run_price = mysqli_query($con,$pro_price);
	// 	while($row_price = mysqli_fetch_array($run_price))
	// 	{
	// 		$product_name = $row_price['product_name'];
	// 		$product_price =array($row_price['product_price']);
	// 		$values = array_sum($product_price);
	// 		$total+=$values;

	// 	}
	 }

   //getting quantity from the cart
	// $get_cart = "select * from cart ";
	// $run_cart = mysqli_query($con,$get_cart);
	// $row_qty = mysqli_fetch_array($run_cart);
	// $qty = $row_qty['qty'];
	// // if($qty==1)
	// // {
	// // 	$qty=1;
	// // 	$sub_total=$total;
	// // }
	// //else
	// //{
	// //	$qty= $qty;
	// 	$sub_total=$total*$qty;

	//}

	$insert_order = "insert into customer_order(customer_id,due_amount,invoice_no,total_product,order_status,customer_email) values('$id','$total_sum','$invoice_no','$count_pro','$status','$customer_email')";
	$run_order = mysqli_query($con,$insert_order);

	echo "<script>alert('order successfully submitted, thanks')</script>";
    echo "<script>window.open('customer/my_account.php','_self')</script>";


	$insert_to_pending_orders = "insert into pending_order(customer_id,invoice_no,product_id,qty,order_status,customer_email) values ('$id','$invoice_no','$product_id','$qty','$status','$customer_email')";
	
	     $ip_add = getRealIpAddr();
      	$run_pending_order = mysqli_query($con,$insert_to_pending_orders);
      	$empty_cart = "delete from cart where ip_add='$ip_add'";
      	$run_empty = mysqli_query($con,$empty_cart);  	


 ?>