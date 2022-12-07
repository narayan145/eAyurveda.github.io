<?php 
    include ("header.php");  
    include("includes/db.php"); 
?>
<div class="login">
  <div class="loginc">
    <img src="image/ayurveda.jpg">
  </div>
  <div class="loginb">
    <div class="row">
      <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4">
          <div class="logina" style="margin-top: -650px; background-color:#30a428; padding:50px; text-align: center; border-radius: 10px;">
            <h2>Search the product according to diseases</h2><br>
            <form method="post" action="diseasea.php">
                <a class="btn btn-sm animated-button thar-three"><input type="text" name="search" required pattern="[A-Za-z]+" placeholder=" please search the diseases" style="height:34px; width:250px; padding:0px; border-radius: 0px; "> 
                </a>
                <button type="submit" name="submit" style="border-radius: 0px; height:35px; width:50px; margin-left: -17px; border:none;" ><i class="fa fa-search" style="color: black;"></i></button>
                <br><br>
            </form>
          </div>
        </div>
      <div class="col-sm-12 col-md-4"></div>
    </div>
  </div>
</div>
<?php 
	include ("footer.php");
?>