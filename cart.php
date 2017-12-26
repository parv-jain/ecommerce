<?php
session_start();
require_once 'functions/functions.php';
?>
<!DOCTYPE>
<html>
  <head>
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
  </head>
  <body>
    <div class="main_wrapper">

      <div class="header_wrapper">
        <img id="logo" src="">
        <img id="banner" src="">
      </div>

      <div class="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="all_products.php">All Products</a></li>
          <li><a href="customer/my_account.php">My Account</a></li>
          <li><a href="customer_register.php">Sign Up</a></li>
          <li><a href="cart.php">Shopping Cart</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>

        <div id="form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a Product">
            <input type="submit" name="search" value="Search">
          </form>
        </div>
      </div>

      <div class="content_wrapper">
        <div id="sidebar">

          <div id="sidebar_title">Category</div>
          <ul id="cats">
            <?php getCats(); ?>
          </ul>

          <div id="sidebar_title">Brands</div>
          <ul id="cats">
            <?php getBrands(); ?>
          </ul>

        </div>
        <div id="content_area">
          <?php cart(); ?>
          <div id="shopping_cart">
            <div id="shopping_cart">
              <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
                <?php
                if(!isset($_SESSION['customer_email'])){
                  echo 'Welcome Guest!';
                }
                else{
                  echo 'Welcome '.$_SESSION['customer_email'];
                }
                ?>
                <b style="color:yellow">Shopping Cart - </b>Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>
                <a href='cart.php' style="color:yellow">Go to Cart</a>
                <?php
                  if(!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php' style='color:orange'>Login</a>";
                  }
                  else{
                    echo "<a href='logout.php' style='color:orange'>Logout</a>";
                  }
                ?>
              </span>
            </div>
          </div>
          <div id="product_box">
            <form action="cart.php" method="post" enctype="multipart/form-data">
              <table align="center" width="700" bgcolor="skyblue" border="2">
                <tr align="center">
                  <th>Remove</th>
                  <th>Product(s)</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
                <?php
                  $ip = getIp();
                  $sel_price = "select * from cart where ip_add = '$ip'";
                  $run_price = mysqli_query($con,$sel_price);
                  $tot_price = 0;
                  while($p_price = mysqli_fetch_assoc($run_price)){
                    $pro_id = $p_price['p_id'];
                    $qty = $p_price['qty'];
                    $pro_price = "select * from products where product_id = '$pro_id'";
                    $run_pro_price = mysqli_query($con,$pro_price);
                    $pro_row = mysqli_fetch_assoc($run_pro_price);
                    $product_price = $pro_row['product_price'];
                    $product_title = $pro_row['product_title'];
                    $product_image = $pro_row['product_image'];
                    $tot_price += ($product_price)*$qty;
                    ?>
                    <tr align="center">
                      <td><input type="checkbox" value="<?php echo $pro_id; ?>" name="remove[]"></td>
                      <td>
                        <?php
                          echo $product_title;
                          echo "<br><img src='admin_area/product_images/$product_image' width='60' height='60'>";
                        ?>
                      </td>
                      <td><input type="number" name="<?php echo $pro_id; ?>" value="<?php echo $qty; ?>" min="1"></td>
                      <td><?php echo $product_price; ?></td>
                    </tr>
                  <?php
                  } ?>
                  <tr align="right">
                    <td colspan="4"><?php echo 'Total: '.$tot_price; ?></td>
                  </tr>
                  <tr align="center">
                    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
                    <td><input type="submit" name="continue" value="Continue Shopping"></td>
                    <td><a href="checkout.php">Checkout</a></td>
                  </tr>
              </table>
            </form>
            <?php
              $ip = getIp();

              if(isset($_POST['update_cart'])) {
                  $cart_pro = "select * from cart where ip_add='$ip'";
                  $run_cart_pro = mysqli_query($con,$cart_pro);
                  while($cart_row = mysqli_fetch_assoc($run_cart_pro)){
                    $id = $cart_row['p_id'];
                    $pro_qty = $_POST[$id];
                    $update_qty = "update cart set qty = $pro_qty where p_id = '$id' and ip_add = '$ip'";
                    $run_update_qty = mysqli_query($con,$update_qty);
                  }
                  echo "<script>window.open('cart.php','_self');</script>";
              }
              if(isset($_POST['update_cart']) && !empty($_POST['remove'])){
                foreach($_POST['remove'] as $remove_id){
                  $delete_product = "delete from cart where p_id = '$remove_id' and ip_add = '$ip'";
                  $run_delete = mysqli_query($con, $delete_product);
                  if($run_delete){
                    echo "<script>window.open('cart.php','_self');</script>";
                  }
                }
              }

              if(isset($_POST['continue'])){
                echo "<script>window.open('all_products.php','_self');</script>";
              }
            ?>
          </div>
        </div>
      </div>

      <div id="footer">
        <h2 style="text-align:center; padding-top:30px;">&copy; 2017 by Parv Jain</h2>
      </div>

    </div>
  </body>
</html>
