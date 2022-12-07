<?php 
  session_start();
  include("includes/db.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min">
  <link rel="stylesheet" type="text/css" href="css/login.css">
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
          <form method="post">
            <input type="email" name="email" placeholder="Enter admin Email" required class="form-control"><br><br>
            <input type="password" name="password" placeholder="Enter password" required class="form-control"><br><br>
            <div class="checkbox">
              <!-- <label><input type="checkbox"> Remember me</label> -->
             </div>
           <button type="submit" class="btn btn-default" name="login">Submit</button><br><br>
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
   if(isset($_POST['login']))
   {
    $admin_email=$_POST['email'];
    $admin_pass = $_POST['password'];
    $get_admin = "SELECT * FROM `admin` WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_num_rows($run_admin);
    $check_admin = mysqli_fetch_array($run_admin);
    $email=$check_admin['admin_email'];
    if($row_admin==1)
    {
      $_SESSION['email'] = $email;
      echo "<script>window.open('index.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('email or password is incorrect please retry')</script>";
    }
   }
 ?>