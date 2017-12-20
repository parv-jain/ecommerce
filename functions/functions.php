<?php

$con = mysqli_connect("localhost","root","parv1608","ecommerce");

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}

function cart(){
  if(isset($_GET['add_cart'])){
    $ip = getIp();
    $pro_id = $_GET['add_cart'];
    $check_pro = "select * from cart where ip_add = '$ip' and p_id = '$pro_id'";
  }
}

function getCats(){
  global $con;
  $get_cats = "select * from categories";
  $run_cats = mysqli_query($con, $get_cats);
  while($row_cats = mysqli_fetch_assoc($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  }
}

function getBrands(){
  global $con;
  $get_brands = "select * from brands";
  $run_brands = mysqli_query($con, $get_brands);
  while($row_brands = mysqli_fetch_assoc($run_brands)){
    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];
    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
  }
}

function getPro(){
  global $con;
  if(!isset($_GET['cat'])){
    if(!isset($_GET['brand'])){
      $get_pro = "select * from products order by rand() limit 0,6";
      $run_pro = mysqli_query($con,$get_pro);

      while($row_pro = mysqli_fetch_assoc($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        $pro_keywords = $row_pro['product_keywords'];

        echo "
              <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                <p><b>Rs. $pro_price </b></p>

                <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
              </div>
        ";
      }
    }
    else{
      $brand_id=$_GET['brand'];
      $get_brand_pro = "select * from products where product_brand='$brand_id'";
      $run_brand_pro = mysqli_query($con,$get_brand_pro);
      $count_brand_pro = mysqli_num_rows($run_brand_pro);
      if($count_brand_pro==0){
        echo '<h2>There is no product in this brand!</h2>';
      }
      else{
        while($row_pro = mysqli_fetch_assoc($run_brand_pro)){
          $pro_id = $row_pro['product_id'];
          $pro_cat = $row_pro['product_cat'];
          $pro_brand = $row_pro['product_brand'];
          $pro_title = $row_pro['product_title'];
          $pro_price = $row_pro['product_price'];
          $pro_desc = $row_pro['product_desc'];
          $pro_image = $row_pro['product_image'];
          $pro_keywords = $row_pro['product_keywords'];

          echo "
                <div id='single_product'>
                  <h3>$pro_title</h3>
                  <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                  <p><b>Rs. $pro_price </b></p>

                  <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                  <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
                </div>
          ";
        }
      }
    }
  }
  else{
    $cat_id=$_GET['cat'];
    $get_cat_pro = "select * from products where product_cat='$cat_id'";
    $run_cat_pro = mysqli_query($con,$get_cat_pro);
    $count_cat_pro = mysqli_num_rows($run_cat_pro);
    if($count_cat_pro==0){
      echo '<h2>There is no product in this category!</h2>';
    }
    else{
      while($row_pro = mysqli_fetch_assoc($run_cat_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_desc = $row_pro['product_desc'];
        $pro_image = $row_pro['product_image'];
        $pro_keywords = $row_pro['product_keywords'];

        echo "
              <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                <p><b>Rs. $pro_price </b></p>

                <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
              </div>
        ";
      }
    }
  }
}
?>
