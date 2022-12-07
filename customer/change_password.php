<div class="container">
  <form class="well form-horizontal" action=" " method="post"  id="contact_form">
  <fieldset>
  <legend><center><h2><b>Change Password</b></h2></center></legend><br>

  <div class="form-group">
    <label class="col-md-4 control-label">Old_Password</label>  
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input  name="old_pass"  class="form-control"  type="text" required>
     </div>
    </div>
  </div>


<div class="form-group">
  <label class="col-md-4 control-label" >New_Password</label> 
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="new_pass"  class="form-control"  type="text" required>
    </div>
  </div>
</div>

 
<div class="form-group">
  <label class="col-md-4 control-label">Confirm_pass</label>  
  <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  name="confirm_pass"  class="form-control"  type="text" required>
   </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    <button type="submit" class="btn btn-warning" name="submit" >UPDATE/<span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->

<?php 
@session_start();
$c_email=$_SESSION['customer_email'];

 if(isset($_POST['submit']))
 {
 	$old_pass = md5($_POST['old_pass']);
 	$new_pass = md5($_POST['new_pass']);
 	$confirm_pass = md5($_POST['confirm_pass']);
 	$get_pass = "select * from customers where customer_pass='$old_pass'";
 	$run_pass = mysqli_query($con,$get_pass);
 	$row_pass = mysqli_num_rows($run_pass);
 	if($row_pass==0)
 	{
 		echo "<script>alert('your current password is not valid')</script>";
 		exit();

 	}
 	if ($new_pass!=$confirm_pass)
 	{
 		echo "<script>alert('try again password was not match')</script>";
 		exit();
 	}
 	else
 	{
 		$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";
 		$run_pass = mysqli_query($con,$update_pass);
 			echo "<script>alert('your password has been sucessfully changed')</script>";
 			echo "<script>window.open('my_account.php')</script>";	
 	}
 }
 ?>