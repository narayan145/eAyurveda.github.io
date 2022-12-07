<?php 
    include ("header.php");   
?>
<div class="container">
	<div class="row" style="padding:80px; background-color:#a6981f; margin:0 -179px;">
		<div class="col-sm-12 col-md-6 contacta" style="padding:80px; font-size: 15px;">
			<h1>Message Us</h1><br>
			<p>
				If you want some knowledge about Ayurvedic Product than you can contact with us or give message to us from the right side of the page.
			</p>
		</div>
		<div class="col-sm-12 col-md-6 contactb" style="padding:40px; font-size: 20px; ">
			<form method="post" action="contact.php">
				Name<br>
				<input type="text" name="name" required pattern="[A-Za-z]+" class="form-control" required><br>
				Email<br>
				<input type="email" name="email" class="form-control" required><br>
				Message<br>
				<textarea name="message" rows="10" cols="50" class="form-control" required>	
				</textarea><br><br>
				<button type="submit" name="submit" class="btn">Submit</button>
			</form>
		</div>
	</div>
<div class="row" style="margin:0 -179px">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7064.502550216621!2d83.46257638959607!3d27.709527020160337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399686f71446a4b1%3A0x712e7c86b3c8d75!2sButwal+Multiple+Campus!5e0!3m2!1sen!2snp!4v1564503422980!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>
<?php
    require_once ("includes/db.php");
    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      echo $name;
      $email=$_POST['email'];
      $comment=$_POST['message'];
      $insert_contact="insert into contact (name, email, comment) values ('$name','$email','$comment') ";
      $run_cat = mysqli_query($con,$insert_contact);
      if($run_cat)
        {
          echo"<script> alert ('Information inserted sucessfully')</script>";
        }
        else
        {
          echo "Error: could not able to execute $insert_contact.".mysqli_error($con);
        }
        mysqli_close($con);
    }
 ?>
<?php 
	include ("footer.php");
?>
