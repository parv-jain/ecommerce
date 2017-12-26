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
          <li><a href="../index.php">Home</a></li>
          <li><a href="../all_products.php">All Products</a></li>
          <li><a href="my_account.php">My Account</a></li>
          <li><a href="../customer_register.php">Sign Up</a></li>
          <li><a href="../cart.php">Shopping Cart</a></li>
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

          <div id="sidebar_title">My Account</div>
          <ul id="cats">
            <?php
              $user = $_SESSION['customer_email'];
              $get_img = "select * from customers where customer_email = '$user'";
              $run_img = mysqli_query($con, $get_img);
              $row_img = mysqli_fetch_assoc($run_img);
              $c_image = $row_img['customer_image'];
              $c_name = $row_img['customer_name'];
              echo "<img src='customer_images/$c_image' height='150' width='150' style='border:2px solid white; padding:2px;'>";
            ?>
            <li><a href="my_account.php?my_orders">My orders</a></li>
            <li><a href="my_account.php?edit_account">Edit Account</a></li>
            <li><a href="my_account.php?delete_account">Delete Account</a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>

        </div>
        <div id="content_area">
          <?php cart(); ?>
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
              <a href='../cart.php' style="color:yellow">Go to Cart</a>
              <?php
                if(!isset($_SESSION['customer_email'])){
                  echo "<a href='../checkout.php' style='color:orange'>Login</a>";
                }
                else{
                  echo "<a href='../logout.php' style='color:orange'>Logout</a>";
                }
              ?>
            </span>
          </div>
          <div id="product_box">
            <?php
              if(isset($_GET['my_orders'])){
                include("my_orders.php");
              }
              else if(isset($_GET['edit_account'])){
                include("edit_account.php");
              }
              else if(isset($_GET['delete_account'])){
                include("delete_account.php");
              }
              else{
                echo "<h2 style='padding:20px;'>Welcome: $c_name</h2>";
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
