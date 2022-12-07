<?php session_start(); 
 error_reporting(0);
?>
<!DOCTYPE html>
		<html>
		<head>
			<title>view cart</title>
		</head>
		<body>
			<center>
			<div class="container">
			<h1>Shopping Site</h1>
				<a href="Shopping.php" class="btn btn-warning col-lg-2">Home</a>
				<a href="viewcart.php" class="btn-warning col-lg-2">Cart</a>
			<br><br>
			<h2 align="center">your cart products</h2>
		</div></center>
		<center>
		<table border="1px;" width="800px;">
			<tr>
				<th>SNo</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>UPDATE</th>
				<th>DELETE</th>
			</tr>
		<?php 
          $sno = 1;
         // $sum=0;
          foreach($_SESSION as $product)
          {
          	 $p =0;
          	 $q = 0;
          	 $count=0;
          	 echo"<tr>";
          	 echo "<td>".($sno++)."</td>";
          	 echo "<form action='edit_cart.php' method='post'>";
          	 foreach ($product as $key => $value) {
          	 	# code...
          	 	if($key == 2)
          	 	{
          	 		echo "<td><input type='text' name='name$key' class='form-control' value='".$value."'></td>";
          	 		$q=$value;
          	 	}
          	   	else if ($key == 1) {
          	 		# code...
          	 		echo "<td><input type='text' name='name$key' class='form-control' value='".$value."'></td>";
          	 	//	echo"<td>".$value."</td>";
          	 		$p = $value;
          	 	}
          	 	else if ($key == 0) {
          	 	    echo "<td><input type='text' name='name$key' class='form-control' value='".$value."'></td>";
          	 	}
          	 }
          	 $bill = ($q * $p);
          	 echo "<td>" .($bill)."</td>"; 
          	 echo "<td><input type='submit' name='event' value='update'></td>";
          	 echo "<td><input type='submit' name='event' value='Delete'></td>";
          	 $count++;
          	    $sum+=($q*$p)-$count;
          	    $sum++;
          	 echo "</form>";

          	 echo "</tr>";
          	}
          	echo"<tr>";
          	echo "<td colspan=4><h3>Total</h3></td>";

          	echo "<td colspan=3><h3>$sum</h3></td>";
          	echo "</tr>";
		 ?>	
		</table>
	    </center>
		 </body>
		</html>	