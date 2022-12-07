<?php 	
  session_start();
  $_SESSION['customer_email'];
  session_destroy();
  echo "<script>window.open('login.php','_self')</script>";
 ?>