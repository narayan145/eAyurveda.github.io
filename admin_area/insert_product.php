<?php 
  require_once ("includes/db.php");
  require_once("layout/header.php");
?>
<div class="row">
  <div class="col-sm-12 col-md-3"></div>
   <div class="col-sm-12 col-md-6">
   <h2 style="text-align:center;">Insert New Product</h2><br>
      <form method="post" action="insert_product.php" enctype="multipart/form-data">
          <input type="text" name="product_name" required="required" class="form-control" placeholder="Insert Product Name" style="border:1px solid black; "><br><br>
          <select name="product_cat" class="form-control" style="border:1px solid black; ">
            <option>Select The Category</option>
            <?php 
             $get_category = "select * from category";
             $run_category = mysqli_query($con,$get_category);
             while($row_category = mysqli_fetch_array($run_category))
             {
               $cat_id = $row_category['cat_id'];
               $cat_name = $row_category['cat_title'];

               echo "<option value='$cat_id'>$cat_name</option>";
             } 
            ?>
             </select><br><br>
           <input type="file" name="product_img1" required="required" class="form-control" placeholder="Upload Image" style="border:1px solid black;"><br><br>
           <input type="number" name="product_price" required="required" class="form-control" placeholder="Insert Product Price" style="border:1px solid black;"><br><br>
           <input type="text" name="product_desc" required="required" class="form-control" placeholder=" Insert Product Description" style="border:1px solid black;"><br><br>
           <input type="text" name="product_keyword" required="required" class="form-control" placeholder="Insert Product Keyword" style="border:1px solid black; "><br><br>
           <input type="text" name="disease" required="required" class="form-control" placeholder="disease" style="border:1px solid black; "><br><br>
           <input type="submit" name="submit" value="submit" required="required" style="border:1px solid blue;" class="btn btn-primary"><br><br>
      </form>
   </div>
    <div class="col-sm-12 col-md-3"></div>
</div>

</body>
</html>
<?php 
  if(isset($_POST['submit']))
  {
  	$product_name=$_POST['product_name'];
  	$product_cat=$_POST['product_cat'];
  	$product_price=$_POST['product_price'];
  	$product_desc=$_POST['product_desc'];
    $product_keyword=$_POST['product_keyword'];
    $disease=$_POST['disease'];
  	$status='on';
  	//image name
  	$product_img1 = $_FILES['product_img1']['name'];
     //image temp names
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    move_uploaded_file($temp_name1,"product_image/$product_img1");
    $insert_product = "INSERT INTO products(category_id, product_name, product_desc, product_price, product_img,product_keyword,disease) VALUES ('$product_cat','$product_name','$product_desc','$product_price','$product_img1','$product_keyword','$disease')";
    $run_product = mysqli_query($con,$insert_product);
    if($run_product)
     {
      echo"insert was done";
     }  
     else
     {
      echo "please try again";
     }
 }

?>
