<?php require_once 'functions/functions.php'; ?>
<!DOCTYPE>
<html>
  <head>
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
  </head>
  <body>
    <div class="main_wrapper">

      <div class="header_wrapper">
        <img id="logo" src="images/logo.gif">
        <img id="banner" src="images/ad_banner.gif">
      </div>

      <div class="menubar">
        <ul id="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">All Products</a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="#">Shopping Cart</a></li>
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
          <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding:5px; line-height:40px;">Welcome Guest! <b style="color:yellow">Shopping Cart - </b>Total Items: Total Price: <a href='cart.php'>Go to Cart</a></span>
          </div>
          <div id="product_box">
            <?php getPro(); ?>
          </div>
        </div>
      </div>

      <div id="footer">
        <h2 style="text-align:center; padding-top:30px;">&copy; 2017 by Parv Jain</h2>
      </div>

    </div>
  </body>
</html>
