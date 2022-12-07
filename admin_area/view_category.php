<?php include("layout/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<style type="text/css">
    th,tr{border:3px groove black;}
  </style>
</head>
<body>
	<div class="cat">
	<table width="789" align="center"  bgcolor="pink" border="3px" style="margin-top:60px;">

      <tr align="center">
      <td colspan="8"><h2>View All Category</h2></td>
    </tr>
	<tr>
		<th style="padding:20px;">CAtegory ID</th>
		<th style="padding:20px;">Category Title</th>
		<th style="padding:20px;">Edit</th>
		<th style="padding:20px;">Delete</th>
	</tr>
<?php 
  include ("includes/db.php");
       $get_cat = "select * from category";
       $run_cat = mysqli_query($con,$get_cat);
       $row_cat = mysqli_fetch_array($run_cat);
       while($row_cat = mysqli_fetch_array($run_cat))
       {
       	$cat_id = $row_cat['cat_id'];
       	$cat_title = $row_cat['cat_title'];
       	?>
       <tr>
       	   <td style="padding:20px;"><?php echo $cat_id; ?></td>
       	   <td style="padding:20px;"><?php echo $cat_title; ?></td>
       	   <td style="padding:20px;"><a href="edit_category.php?edit_id=<?php echo $cat_id; ?>" class="btn btn-primary">edit</a> </td>
       	   <td style="padding:20px;"><a href="delete_category.php?delete_cat=<?php echo $cat_id; ?>" class="btn btn-primary">delete</a></td>
       </tr>
        <?php } ?> 
    </table>
</div>
</body>