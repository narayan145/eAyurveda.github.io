<?php
    include("includes/db.php");
    include("function/function.php");
    //error_reporting(0);
    include('header.php');
 ?>
<body>
    <div class="cart">
      <div class="container">
        <br><br><br><br><br><br>
          <div class="row" style="border:black solid 1px; font-size: 20px; color:green;">
            <div class="col-sm-3 col-md-3" style="border-right:black solid 1px;">Product</div>
            <div class="col-sm-3 col-md-2" style="border-right:black solid 1px;">Quantity</div>
            <div class="col-sm-3 col-md-2" style="border-right:black solid 1px;">Total</div>
             <div class="col-sm-3 col-md-2" style="border-right:black solid 1px;">Rating</div>
            <div class="col-sm-3 col-md-3">Action</div>
          </div>
    <?php 
      $total=0;
      $sum=0;
      $ip_add = getRealIpAddr();
      $get_ip = "select * from cart where ip_add='$ip_add'";
      $run_ip = mysqli_query($con,$get_ip);
        while($row_ip = mysqli_fetch_array($run_ip))
        {
          $p_id = $row_ip['pro_id'];
          $qty = $row_ip['qty'];
          $get_product = "select * from products where product_id='$p_id'";
          $run_product = mysqli_query($con,$get_product);
          while($row_product = mysqli_fetch_array($run_product))
          {
            $product_id = $row_product['product_id'];
            $product_price = array($row_product['product_price']);
            $sum=array_sum($product_price);
            $product_image = $row_product['product_img'];
            $product_name = $row_product['product_name'];
            $only_price=$row_product['product_price']*$qty;
            $total+= $only_price;
        ?>

  <div class="rate" style="position:absolute;right: 230px;">
    <form method="post">
     <span class="rat" style="margin-right:68px;"><input type="number" name="ratting" placeholder="Rating"></span>
      <input type="checkbox" name="remove[]" value="<?php echo $product_id ?>">
      <button type="submit" name="update_shop" class="btn" style="background-color:green; color:white;">Delete</button>
    </form>
  </div>
  <form method="post" action="checkout.php">
    <div id="products" class="row" style="border:black solid 1px;">
      <div class="col-sm-3 col-md-3">
        <h2><?php echo $product_name ?></h2><br>
          <img src="admin_area/product_image/<?php echo $product_image?>" class='img-responsive'>
      </div>
      <div class="col-sm-3 col-md-3">
        <input type="number" value="1" name="quantity" min="1" onchange="updateSubTotal(this.value, <?php echo $product_id . ', '; echo $only_price; ?>)">
      </div>
      <div class="col-sm-3 col-md-2" class="price">Rs. <span class="subtotal" id="subtotal<?php echo $product_id; ?>"><?php echo $only_price; ?></span></div>
      <div class="col-sm-3 col-md-3">
      </div>
    </div>
      <?php } } ?>

    <div class="row" style="border:black solid 1px; padding: 3px;">
      <div class="col-sm-6 col-md-6" style="border-right:black solid 1px;">Sum Total</div>
        <div class="col-sm-3 col-md-3" style="border-right:black solid 1px;">Rs. <input name="totalsum" value="<?php echo $total; ?>" id="totalsum"></div>
      <div class="col-sm-3 col-md-3"></div>
    </div>
    <div class="row" style="border:black solid 1px; padding:10px;">
      <div class="col-sm-9 col-md-9">
        <a href="shopping.php" class="btn btn-success">Continue Shopping</a>
      </div>
      <div class="col-sm-3 col-md-3">
        <a href="checkout.php"><input name="totalSubmit" type="submit" class="btn btn-success" value="checkbox"></a>
      </div>
    </div>
  </form>
</div>
  <?php 
    if(isset($_POST['update_shop']))
    {
      foreach($_POST['remove'] as $remove_id)
      {
        $delete_products ="delete from cart where pro_id='$remove_id'" ;
        $run_delete = mysqli_query($con,$delete_products);
        if($run_delete)
        {
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }
  ?>
<?php 
  if(isset($_POST['update_shop'])){
    $ratting=$_POST['ratting'];
    $update_ratting ="UPDATE `products` SET `product_ratting`='$ratting' WHERE product_id = '$product_id' "; 
    $run_ratting = mysqli_query($con,$update_ratting);
      if($run_ratting)
      {
       // echo "update sucessfully";
     } 
     else
     {
      echo "error";
     }
  }        
 ?>
<script>
  function updateSubTotal(quantity, id, unitPrice) {
    let subtotalEl = document.querySelector('#subtotal'+id);
    let subTotal = unitPrice * quantity;
    subtotalEl.innerHTML = subTotal;
    calculateTotal();
  }
  // function calculateTotal(subTotal, id) {
  //   let total1 = document.querySelector("#subtotal2").innerHTML;
  //   let total2 = document.querySelector("#subtotal11").innerHTML;
  //   let total = parseInt(total1) + parseInt(total2);
  //   document.querySelector("#totalsum").textContent = total;                                            
  // }
function calculateTotal(){
  var total=0;
  let subtotalEl = document.querySelectorAll('.subtotal');
  for(let subtotalItem of subtotalEl) {
    console.log(typeof +subtotalItem.innerHTML);
    total += +subtotalItem.innerHTML; 
  } 
  document.getElementById('totalsum').value = total;
}
</script>
<?php include('footer.php'); ?>