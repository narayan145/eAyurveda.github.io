<?php 	
  session_start();
  $_SESSION['customer_email'];
  session_destroy();
  echo "<script>window.open('shopping.php','_self')</script>";
 ?>