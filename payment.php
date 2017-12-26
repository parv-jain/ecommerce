<?php
require_once 'functions/functions.php';
$ip = getIp();
$sel_price = "select * from cart where ip_add = '$ip'";
$run_price = mysqli_query($con,$sel_price);
$tot_price = 0;
$product_name_array = array();
$product_qty_array = array();
$product_id_array = array();
while($p_price = mysqli_fetch_assoc($run_price)){
  $pro_id = $p_price['p_id'];
  $pro_price = "select * from products where product_id = '$pro_id'";
  $run_pro_price = mysqli_query($con,$pro_price);
  $pro_row = mysqli_fetch_assoc($run_pro_price);
  array_push($product_id_array,$pro_row['product_id']);
  array_push($product_name_array,$pro_row['product_title']);
  $product_price = $pro_row['product_price'];
  $qty = $p_price['qty'];
  array_push($product_qty_array,$qty);
  $tot_price += ($product_price);
}

?>
<div>
  <h2>Pay now with Paypal</h2>
  <p style="text-align">
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

      <!-- Identify your business so that you can collect the payments. -->
      <input type="hidden" name="business" value="merchant@parv.com">

      <!-- Specify a Buy Now button. -->
      <input type="hidden" name="cmd" value="_xclick">

      <!-- Specify details about the item that buyers will purchase. -->
      <input type="hidden" name="item_name" value="<?php echo implode(',',$product_name_array); ?>">
      <input type="hidden" name="item_number" value="<?php echo implode(',',$product_id_array); ?>">
      <input type="hidden" name="quantity" value="<?php echo implode(',',$product_qty_array); ?>">
      <input type="hidden" name="amount" value="<?php echo $tot_price; ?>">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="return" value="http://localhost/ecommerce/paypal_success.php">
      <input type="hidden" name="cancel_return" value="http://localhost/ecommerce/paypal_cancel.php">

      <!-- Display the payment button. -->
      <input type="image" name="submit" border="0"
      src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
      alt="Buy Now">
      <img alt="" border="0" width="1" height="1"
      src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

    </form>
  </p>
</div>
