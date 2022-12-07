<?php 
    include ("header.php");  
    include("includes/db.php"); 
?>
<div class="container" style="padding:100px;">
<div class="row" style="display: flex;flex-wrap: wrap;padding: 10 20px;font-family:sans-serif;">
  <?php 
      if(isset($_POST['submit']))
      {
        $user_keyword = $_POST['search'];
        $get_product = "select * from products where disease like'%$user_keyword%' ";
        $run_products =  mysqli_query($con,$get_product);
        while($row_products=mysqli_fetch_array($run_products))
        {
          $pro_id = $row_products['product_id'];
          $pro_title= $row_products['product_name'];
          $pro_desc = $row_products['product_desc'];
          $pro_price = $row_products['product_price'];
          $pro_image = $row_products['product_img'];
            echo"
             <div class='col-sm-12 col-md-3 content'style=' border:2px solid #ece3e3; padding:10px; border-radius:15px; text-align:center;'>
                <img src='admin_area/product_image/$pro_image' class='img-responsive'><br>
                <h4 style='color:black'><b> $pro_title</b></h4>
                <p style='color: #84a929;'>Rs:$pro_price</p>
                <p style='color:black;'>$pro_desc</p>
                <b><button class='btn' style='background-color:#a6981f;'><a href='shopping.php?add_cart=$pro_id' style='color:green;'>Add cart</a></button></b>               
              </div>
            ";                                   
        }
      }
  ?>
  </div>
</div>
<?php 
	include ("footer.php");
?>