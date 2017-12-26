<?php session_start();
require_once 'functions/functions.php';
//about product details
$ip = getIp();
$sel_price = "select * from cart where ip_add = '$ip'";
$run_price = mysqli_query($con,$sel_price);
$tot_price = 0;
$product_id_array = array();
$product_qty_array = array();
while($p_price = mysqli_fetch_assoc($run_price)){
  $pro_id = $p_price['p_id'];
  $pro_price = "select * from products where product_id = '$pro_id'";
  $run_pro_price = mysqli_query($con,$pro_price);
  $pro_row = mysqli_fetch_assoc($run_pro_price);
  array_push($product_id_array,$pro_row['product_id']);
  $product_price = $pro_row['product_price'];
  $qty = $p_price['qty'];
  array_push($product_qty_array,$qty);
  $tot_price += ($product_price*$qty);
}
//about customer
$user = $_SESSION['customer_email'];
$get_c = "select * from customers where customer_email = '$user'";
$run_c = mysqli_query($con, $get_c);
$row_c = mysqli_fetch_assoc($run_c);
$c_id = $row_c['customer_id'];
//payment details from paypal
$amount = $_GET['amt'];
$currency = $_GET['cc'];
$transaction_id = $_GET['tx'];

$pid = implode(',',$product_id_array);
$q = implode(',',$product_qty_array);

$invoice_no = mt_rand();
?>
<html>
  <head>
    <title>Payment Success</title>
  </head>
  <body>
    <?php
      if($amount == $tot_price){

        $insert_payment = "insert into payments (amount,customer_id,product_id,transaction_id,currency) values ('$amount','$c_id','$pid','$transaction_id','$currency')";
        $run_payments = mysqli_query($con,$insert_payment);
        $insert_order = "insert into orders (p_id,c_id,qty,invoice_no,status) values('$pid','$c_id','$q','$invoice_no','In Progress')";
        $run_order = mysqli_query($con,$insert_order);
        $empty_cart = "delete from cart where ip_add = '$ip'";
        $run_empty_cart = mysqli_query($con,$empty_cart);
        ?>
        <h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
        <h3>Your Payment was successful, please go to your account</h3>
        <a href="customer/my_account.php">Go to your account</a>
        <?php
      }
      else{
        ?>
        <h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
        <h3>Your Payment was failed.</h3>
        <a href="cart.php">Go back</a>
        <?php
      }
    ?>

  </body>
</html>
