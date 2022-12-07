 <?php 
  include("layout/header.php");
   include("includes/db.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/add_admin.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="login container-fluid">
<div class="loginc">
  <img src="images/ayurveda.jpg">
</div>
<div class="loginb">
  <div class="row">
    <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4">
        <div class="logina">
        <h2>E-Ayurveda System</h2>
          <h2>Admin Login</h2><br><br>      
          <form method="post" action="view_admin.php">
            <input type="text" name="name" placeholder="Enter Admin Name" required class="form-control"><br><br>
            <input type="email" name="email" placeholder="Enter Admin Email" required class="form-control"><br><br>
            <input type="password" name="password" placeholder="Enter Password" required class="form-control"><br><br>
            <input type="text" name="address" placeholder="Enter Admin Address" required class="form-control"><br><br>
            <button type="submit" name="admin_submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    <div class="col-sm-12 col-md-4"></div>
  </div>
</div>
</div>
</body>
</html>
<?php
    require_once ("includes/db.php");
    if(isset($_POST['admin_submit']))
    {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=md5($_POST['password']);
      $address=$_POST['address'];
      $insert_admin="insert into admin (admin_name, admin_email,admin_pass,admin_address) values ('$name','$email','$password','$address')";
      $run_cat = mysqli_query($con,$insert_admin);
      if($run_cat)
        {
          echo"<script> alert ('admin insert sucessfully')</script>";
        }
        else
        {
          echo "Error: could not able to execute $insert_admin.".mysqli_error($con);
        }
        mysqli_close($con);
    }
 ?>