
<form action="" method="post">
	<table align="center" width="600">
	   <tr>
	   	<td colspan="2">
	   		<h2>Do You really wants to delete your account?</h2>
	   	</td>
	   </tr>
	   <tr><th><br></th>
           <th><br></th>
	   </tr>
	   <tr>
	   	<td>
	   		<input type="submit" name="yes" value="Yes,I Want to Delete">&nbsp &nbsp &nbsp
	   		<input type="submit" name="no"   value="No,I Do not want to delete">
	   	</td>
	   </tr>	

	</table>

	<?php 
     include ("includes/db.php");
     $c = $_SESSION['customer_email'];
       if(isset($_POST['yes']))
       {
       	$delete_customer = "delete from customers where customer_email = '$c'";
       	$run_delete = mysqli_query($con,$delete_customer);


       if($run_delete)
       {
       	echo"<script>alert('your account has been deleted, good bye!' ')</script>";
       	echo "<script>window.open('../index.php','_self')</script>";
       }

       if(isset($_POST['no']))
       {
       	echo "<script>window.open('my_account.php')</script>";
       }
   }


	 ?>