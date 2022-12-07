<!DOCTYPE html>
<html>
<head>
	<title>list of admin	</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<center>
	<div class="view_admin">
	<table boarder="1px" width="700px" height="200" background="pink">
		<tr>
			<td colspan="7"><h1 style=align:center;>List of admin</h1></td>
		</tr>
		<tr>
			<th>admin_id</th>
			<th>admin_name</th>
			<th>admin_email</th>
			<th>admin_pass</th>
			<th>admin_address</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		   include("layout/header.php");	
           include("includes/db.php");
           $get_admin = "select * from admin ";
           $run_admin = mysqli_query($con,$get_admin);
          while($row_admin = mysqli_fetch_array($run_admin))
           {
           	 $admin_id = $row_admin['admin_id'];
           	 $admin_name = $row_admin['admin_name'];
           	 $admin_email = $row_admin['admin_email'];
           	 $admin_pass = $row_admin['admin_pass'];
           	 $admin_address = $row_admin['admin_address'] ;
		 ?>
		 <tr>
		 	<td><?php echo $admin_id ?></td>
		 	<td><?php echo $admin_name ?></td>
		 	<td><?php echo $admin_email ?></td>
		 	<td><?php echo $admin_pass ?></td>
		 	<td><?php echo $admin_address ?></td>
		 	<td><a href="edit_admin.php?edit_admin=<?php echo $admin_id ?>">edit</td>
		 	<td><a href="delete_admin.php?delete_admin=<?php echo $admin_id ?>">delete</td>
		 </tr>
		<?php } ?>
	</table>
	</div>
	<?php 
       if(isset($_GET['edit_admin']))
       {
       	// require_once("edit_admin.php");
       }
	 ?>
</center>
</body>
</html>