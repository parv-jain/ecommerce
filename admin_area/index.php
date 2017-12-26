<!DOCTYPE>
<html>
  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
  </head>
  <body>
    <div class="main-wrapper">
      <div id="header"></div>
      <div id="right">
        <h2 style="text-align:center;">Manage Content</h2>
        <a href="index.php?insert_product">Insert New Product</a>
        <a href="index.php?view_products">View All Products</a>
        <a href="index.php?insert_category">Insert New Category</a>
        <a href="index.php?view_categories">View All Categories</a>
        <a href="index.php?insert_brand">Insert New Brand</a>
        <a href="index.php?view_brands">View All Brands</a>
        <a href="index.php?view_customers">View Customers</a>
        <a href="index.php?view_orders">View Orders</a>
        <a href="index.php?view_payments">View Payments</a>

      </div>
      <div id="left">
        <?php
          if(isset($_GET['insert_product'])){
            include("insert_product.php");
          }
          if(isset($_GET['view_products'])){
            include("view_products.php");
          }
          if(isset($_GET['edit_pro'])){
            include("edit_product.php");
          }
          if(isset($_GET['delete_pro'])){
            include("delete_product.php");
          }
          if(isset($_GET['insert_category'])){
            include("insert_category.php");
          }
          if(isset($_GET['view_categories'])){
            include("view_categories.php");
          }
          if(isset($_GET['delete_cat'])){
            include("delete_category.php");
          }
          if(isset($_GET['edit_cat'])){
            include("edit_category.php");
          }
          if(isset($_GET['insert_brand'])){
            include("insert_brand.php");
          }
          if(isset($_GET['view_brands'])){
            include("view_brands.php");
          }
          if(isset($_GET['delete_brand'])){
            include("delete_brand.php");
          }
          if(isset($_GET['edit_brand'])){
            include("edit_brand.php");
          }
          if(isset($_GET['view_customers'])){
            include("view_customers.php");
          }
          if(isset($_GET['delete_cust'])){
            include("delete_customers.php");
          }
          if(isset($_GET['view_orders'])){
            include("view_orders.php");
          }
          if(isset($_GET['view_payments'])){
            include("view_payments.php");
          }

          if(isset($_GET['confirm_order'])){
            include("includes/db.php");
            $order_id = $_GET['confirm_order'];
            $status = 'Completed';
            echo $update_order = "update orders set status = '$status' where order_id = '$order_id'";
            $run_update = mysqli_query($con,$update_order);
            if($run_update){
              echo "<script>alert('Order was updated');</script>";
              echo "<script>window.open('index.php?view_orders','_self');</script>";
            }
          }

        ?>
      </div>
    </div>
  </body>
</html>
