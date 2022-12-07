<?php 	
   session_start();
   $name = $_POST['name'];
   $price = $_POST['price'];
   $qty = $_POST['quantity'];
   $product = array($name,$price,$qty);
   //print_r($product);
   $_SESSION[$name]= $product;
   header('location:shopping.php');
 ?>