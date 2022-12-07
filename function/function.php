<?php
$con=mysqli_connect("localhost","root","","ayurhome");
//getting ip address
function getRealIpAddr()
{
  if (!empty($_SERVER["HTTP_CLIENT_IP"]))
    {
    //check for ip from share internet
    $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
    // Check for the Proxy User
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    else
    {
    $ip = $_SERVER["REMOTE_ADDR"];
    }
// This will print user's real IP Address
// does't matter if user using proxy or not.
  return $ip;
}
function getDefault()
{
  global $con;
  if(!isset($_GET['view_order']))
  {
    if(!isset($_GET['edit_account']))
    {
      if(!isset($_GET['change_pass']))
      {
        if(!isset($_GET['delete_account']))
        {
          $c = ($_SESSION['customer_email']);
          $get_c ="select * from customers where customer_email='$c'";
          $run_c = mysqli_query($con,$get_c);
          $row_c = mysqli_fetch_array($run_c);
          $customer_id = $row_c['customer_id'];
          $get_orders = "select * from customer_order where customer_id='$customer_id' AND order_status= 'pending'";
          $run_orders = mysqli_query($con,$get_orders);  
          $count_orders = mysqli_num_rows($run_orders);
          if($count_orders>0)
          {
            echo "<div style='padding:10px;'>
            <h1 style='color:red;'>important!</h1>
            <h2>You have ($count_orders) pending orders</h2>
            <h3>please see your orders details by clicking this <a href='my_account.php?view_order'>
            LINK </a><br> or you can choose left side option
            </h3>
            </div>
            ";
          }
          else
          {
            echo"
              <div style='padding:10px;'>
              <h1 style='color:red; text-decoration:underline;'>Important!</h1>
              <h2>you have no pending orders!</h2>
              <h3>you can see your orders history by clicking this <a href='my_account.php?view_order'>LINK</a></h3></div>";
          }
        }
      }
    }
  }
}
function getcategory()
{  
  global $con;  
    $get_category = "select * from category";
    $run_category = mysqli_query($con,$get_category);
    while( $row_category = mysqli_fetch_array($run_category))
    {
      $cat_title=$row_category['cat_title'];
      $cat_id=$row_category['cat_id'];
      echo"
      <li><a href='shopping.php?cat_id=$cat_id' style='color:white; text-decoration: none;'>$cat_title</a></li>";
    }
}
function getallproduct()
{    
  global $con;
  if(isset($_GET['cat_id']))
    {
      $id=$_GET['cat_id'];
      $get_product = "select * from products where category_id='$id'  ";
      $run_product =mysqli_query($con,$get_product);
      $check_product =  mysqli_num_rows($run_product);
      if($check_product==0)
      {
        $id=$_GET['cat_id'];
        $get_product = "select * from products  ";
        $run_product =mysqli_query($con,$get_product);
        while($row_product = mysqli_fetch_array($run_product))
        {
          $product_id=$row_product['product_id'];
          $product_name = $row_product['product_name'];
          $product_price = $row_product['product_price'];
          $product_image = $row_product['product_img'];
          echo "                  
         <div class='col-sm-12 col-md-4' style=' border:2px solid #ece3e3; padding:10px; border-radius:15px;' >
          <img src='admin_area/product_image/$product_image' class='img-responsive'><br>
          <h4><b>$product_name</b></h4><br>
          <p style='color:#84a929;'>Rs.$product_price</p>
          <b><button class='btn btn-primary' style='background-color:green;'><a href='shopping.php?add_cart=$product_id' style='color:white; text-decoration: none;'>Add cart</a></button></b>
        </div>";
        }
     } 
  else
    {
    while($row_product = mysqli_fetch_array($run_product))
    {
      $product_id=$row_product['product_id'];
      $product_name = $row_product['product_name'];
      $product_price = $row_product['product_price'];
      $product_image = $row_product['product_img'];
      echo "
        <div class='col-sm-12 col-md-4' style=' border:2px solid #ece3e3; padding:10px; border-radius:15px;' >
          <img src='admin_area/product_image/$product_image' class='img-responsive'><br>
          <h4><b>$product_name</b></h4><br>
          <p style='color:#84a929;'>Rs.$product_price</p>
          <b><button class='btn btn-primary' style='background-color:green;'><a href='shopping.php?add_cart=$product_id' style='color:white;'>Add cart</a></button></b>
        </div>";
      }  
    } 
  }
}
function getproduct()
{    
  global $con;
  if(!isset($_GET['cat_id']))
  {
    $get_product = "select * from products  ";
    $run_product =mysqli_query($con,$get_product); 
    while($row_product = mysqli_fetch_array($run_product))
    {
      $product_id=$row_product['product_id'];
      $product_name = $row_product['product_name'];
      $product_price = $row_product['product_price'];
      $product_image = $row_product['product_img'];
      echo "                
        <div class='col-sm-12 col-md-4' style=' border:2px solid #ece3e3; padding:10px; border-radius:15px;' >
          <img src='admin_area/product_image/$product_image' class='img-responsive'><br>
          <h4><b>$product_name</b></h4><br>
          <p style='color:#84a929;'>Rs.$product_price</p>
          <b><button class='btn btn-primary' style='background-color:green;'><a href='shopping.php?add_cart=$product_id' style='color:white;'>Add cart</a></button></b>
        </div>";
    }
  }
}
function add_cart()     
{
  global $con;
  if (isset($_GET['add_cart']))
  {          
    $pro_id=$_GET['add_cart'];
    $ip_add= getRealIpAddr();
    $check_pro="select * from cart where ip_add='$ip_add' AND pro_id='$pro_id'";
    $run_check=mysqli_query($con,$check_pro);
    if(mysqli_num_rows($run_check)>0)
    {
      echo "";
    }
    else
    {
      $q = "insert into cart (pro_id,ip_add) values ('$pro_id','$ip_add')";
      $run_q = mysqli_query($con,$q);
    }
  }
}

function items()
{
  if(isset($_GET['add_cart']))
  {
    global $con;
    $count_items=0;
    $ip_add= getRealIpAddr();
    $get_items = "select * from cart where ip_add='$ip_add'";
    $run_items = mysqli_query($con,$get_items);
    $count_items = mysqli_num_rows($run_items);
  }
  else
  {
    global $con;
    $ip_add= getRealIpAddr();
    $get_item= "select *from cart where ip_add='$ip_add'";
    $run_items = mysqli_query($con,$get_item);
    $count_items = mysqli_num_rows($run_items); 
  }
  echo $count_items;
}

function total()
{
  if(isset($_GET['add_cart']))
  {
    global $con;
    $total=0;
    $p_id=$_GET['add_cart'];
    $ip_add = getRealIpAddr();
    $get_item = "select * from cart where ip_add='$ip_add'";
    $run_item = mysqli_query($con,$get_item);
    while($row_item = mysqli_fetch_array($run_item))
    {
      $p_id = $row_item['pro_id'];
      $get_product = "select * from products where product_id='$p_id'";
      $run_product = mysqli_query($con,$get_product);
      while($row_product = mysqli_fetch_array($run_product))
      {
            $p_price = $row_product['product_price'];
           // $value=array_sum($p_price);
            $total=$row_product['product_price']+$total;
      }
  }
    echo $total;
} 
}     
?>