<?php
session_start();
require_once 'functions/functions.php';
$user = $_SESSION['customer_email'];
$cust = "select * from customers where customer_email = '$user'";
$run_c = mysqli_query($con,$cust);
$row_c = mysqli_fetch_assoc($run_c);
$c_id = $row_c['customer_id'];
?>
<table align="center" width="600" style="margin:auto">
  <tr align="center">
    <td colspan="5"><h2>Your Orders</h2></td>
  </tr>
  <tr align="center">
    <th>Product(s)</th>
    <th>Quantity</th>
    <th>Invoice No.</th>
    <th>Order Date</th>
    <th>Status</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_order = "select * from orders where c_id = '$c_id'";
    $run_order = mysqli_query($con,$get_order);
    while($row_order = mysqli_fetch_assoc($run_order)){
      $order_id = $row_order['order_id'];
      $qty = $row_order['qty'];
      $invoice_no = $row_order['invoice_no'];
      $order_date = $row_order['order_date'];
      $status = $row_order['status'];
      $pro_id = $row_order['p_id'];
      $get_pro = "select * from products where product_id = '$pro_id'";
      $run_pro = mysqli_query($con,$get_pro);
      $row_pro = mysqli_fetch_assoc($run_pro);
      $pro_title = $row_pro['product_title'];
      $pro_image = $row_pro['product_image'];
      echo "<tr align='center'>
        <td>
          $pro_title <br>
          <img src='../admin_area/product_images/$pro_image' height='50' width='40px'>
        </td>
        <td>$qty</td>
        <td>$invoice_no</td>
        <td>$order_date</td>
        <td>$status</td>
      </tr>";
    }
  ?>
</table>
