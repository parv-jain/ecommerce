<table align="center" width="795" bgcolor="pink" style="margin:auto">
  <tr align="center">
    <td colspan="6"><h2>View all payments here</h2></td>
  </tr>
  <tr align="center">
    <th>Product(s)</th>
    <th>Customer Email</th>
    <th>Paid Amount</th>
    <th>Transaction Id.</th>
    <th>Payment Date</th>
    <th>Currency</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_payment = "select * from payments";
    $run_payment = mysqli_query($con,$get_payment);
    while($row_payment = mysqli_fetch_assoc($run_payment)){
      $payment_id = $row_payment['payment_id'];
      $amount = $row_payment['amount'];
      $c_id = $row_payment['customer_id'];
      $pro_id = $row_payment['product_id'];
      $t_id = $row_payment['transaction_id'];
      $payment_date = $row_payment['payment_date'];
      $currency = $row_payment['currency'];

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
        <td>$amount</td>
        <td>$t_id</td>
        <td>$payment_date</td>
        <td>$currency</td>
      </tr>";
    }
  ?>
</table>
