<?php
$con=mysqli_connect("localhost", "root", "", "ayurhome");
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
                                    <li><a href='shopping.php?cat_id=$cat_id'>$cat_title</li>";
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
                $run_product = mysqli_query($con,$get_product); 

                while($row_product = mysqli_fetch_array($run_product))
                {
                    $product_id=$row_product['product_id'];
                    $product_name = $row_product['product_name'];
                    $product_price = $row_product['product_price'];
                    $product_image = $row_product['product_img'];
                    echo "
                        <div class='col-sm-12 col-md-4'>
                                <img src='./product_image/$product_image'><br>
                                <form method='post' action='../smart_ayurveda_home/add_cart.php'>

                                name:<input type='text'
                                 name='name' value='$product_name'>

                                price:<input type='number' name='price' value='$product_price'>
                                quantity:<input type='text'

                                 name='quantity'>

                                <button><a href='c_login.php'>addcart</a></button>
                                
                           </form></div>
                           ";
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
                      <div class='col-sm-12 col-md-4'>
                                <img src='./product_image/$product_image'><br>
                                <form method='post' action='../smart_ayurveda_home/add_cart.php'>

                                name:<input type='text'
                                 name='name' value='$product_name'>

                                price:<input type='number' name='price' value='$product_price'>
                                quantity:<input type='text' name='quantity'>

                                <button><a href='c_login.php'> addcart</a></button>
                           </form></div>
                           ";       
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
                           <div class='col-sm-12 col-md-4'>
                                <img src='./product_image/$product_image'><br>
                                <form method='post' action='../smart_ayurveda_home/add_cart.php'>
                                name:<input type='text'
                                 name='name' value='$product_name'>
                                price:<input type='number' name='price' value='$product_price'>
                                quantity:<input type='text' name='quantity'>
                                <button><a href='c_login.php'>addcart</a></button>
                                
                           </form></div>       
                           ";   
                         }
                         }
              }
  function add_cart()
    {
      global $con;
      if(!isset($_SESSION['customer_email']))
                {
                  header('location:c_login.php');  
                }
      //if(isset($_GET['add_cart']))
      // {  
       //     $p_id=$_GET['add_cart'];
       //     $ip_add= getRealIpAddr();
          $check_pro="select * from cartcart  ";
           $run_check=mysqli_query($con,$check_pro);
          $row_check = mysqli_num_rows($run_check);
           if($row_check>0)
            {
              echo "";
           }
              else
           {
              $q = "insert into cartcart (pro_id) values ('$p_id')";
              $run_q = mysqli_query($con,$q);
            }
     
        }
                 
      
                              


      function items()
                {
                    if(isset($_GET['add_cart']))
                    {
                        global $con;
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
                     $p_price=array($row_product['product_price']);
                      $value=array_sum($p_price);
                       $total+=$value;  
                  }
                }
                echo $total;

              } 
            }     
}
 ?>