<table align="center" width="795" bgcolor="pink" style="margin:auto">
  <tr align="center">
    <td colspan="7"><h2>View all orders here</h2></td>
  </tr>
  <tr align="center">
    <th>Product(s)</th>
    <th>Customer Email</th>
    <th>Quantity</th>
    <th>Invoice No.</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_order = "select * from orders";
    $run_order = mysqli_query($con,$get_order);
    while($row_order = mysqli_fetch_assoc($run_order)){
      $order_id = $row_order['order_id'];
      $qty = $row_order['qty'];
      $invoice_no = $row_order['invoice_no'];
      $order_date = $row_order['order_date'];
      $status = $row_order['status'];
      $pro_id = $row_order['p_id'];
      $c_id = $row_order['c_id'];

      $get_pro = "select * from products where product_id = '$pro_id'";
      $run_pro = mysqli_query($con,$get_pro);
      $row_pro = mysqli_fetch_assoc($run_pro);
      $pro_title = $row_pro['product_title'];
      $pro_image = $row_pro['product_image'];

      $get_c = "select * from customers where customer_id = '$c_id'";
      $run_c = mysqli_query($con,$get_c);
      $row_c = mysqli_fetch_assoc($run_c);
      $c_email = $row_c['customer_email'];

      echo "<tr align='center'>
        <td>
          $pro_title <br>
          <img src='product_images/$pro_image' height='50' width='40px'>
        </td>
        <td>$c_email</td>
        <td>$qty</td>
        <td>$invoice_no</td>
        <td>$order_date</td>
        <td>$status</td>
        <td><a href='index.php?confirm_order=$order_id'>Complete Order</a></td>
      </tr>";
    }
  ?>
</table>
