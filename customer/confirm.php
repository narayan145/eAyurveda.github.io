<?php 
  include('header.php');
   session_start();
   include("includes/db.php");
    if(isset($_GET['order_id']))
    {
   	  $order_id = $_GET['order_id'];
    }
 ?>
<body>
<div class="container" method="post" style="margin:100px; color:green;">
  <div class="row">
    <div class="col-sm-6 col-md-3"></div>
    <div class="col-sm-6 col-md-6">
    <h2> Please Confirm Your Payment </h2>
      <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
      Inovice No:<input type="text" name="invoice_no" class="form-control" required><br>
      Amount Send :<input type="text" name="amount" class="form-control" required><br>
       Payment Date:<input type="date" name="date" class="form-control" required><br>
        Select Payment Mode:<select name="payment_method" class="form-control">
        <option>E-Sewa Online Payment</option>
      </select><br>
      <!--
      Transation/Refference ID:<input type="text" name="tr" class="form-control" required><br>
      Easypaisa/UBL OMNI code:<input type="text" name="code" class="form-control" required><br> -->
      <button type="submit" name="confirm" value="confirm_payment" style="color:white; background-color: green; border:2px solid green; height:35px; width:180px;">Confirm</button>
      </form>
    </div>
    <div class="col-sm-6 col-md-3"></div>
  </div>
</div>
</body>
</html>
<?php 
  if (isset($_POST['confirm']))
  {
  	$update_id = $_GET['update_id'];
    echo "";
  	$invoice =$_POST['invoice_no'];
  	$amount = $_POST['amount'];
  	$payment_method = $_POST['payment_method'];
  	//$ref_no = $_POST['tr'];
  	//$code = $_POST['code'];
  	$date = $_POST['date'];
  	$complet= 'complet';
  	$insert_payment = "insert into payment (invoic_no,amount,payment_mode,payment_date) VALUES ('$invoice','$amount','$payment_method','$date')";
  	$run_payment = mysqli_query($con,$insert_payment);
  	$update_order = "update customer_order set order_status='$complet' where invoice_no='$invoice'";
  	$run_order = mysqli_query($con,$update_order);
  	if($run_payment)
  	{
  		echo "<h2 style='text-align:center; color:white;'>Payment received, your order will be complete within 24 hours </h2>";
  	}	
  }
 ?>
 <?php 
 include('footer.php');
 ?>