<?php
include_once('functions/functions.php');
?>
<div>
  <form method="post" action="">
    <table width="500" align="center" bgcolor="skyblue">
      <tr align="center">
        <td colspan="2"><h2>Login to buy!</h2></td>
      </tr>
      <tr>
        <td align="right"><b>Email:</b></td>
        <td><input type="text" name="email" required></td>
      </tr>
      <tr>
        <td align="right"><b>Password:</b></td>
        <td><input type="password" name="pass" required></td>
      </tr>
      <tr align="center">
        <td colspan="2"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
      </tr>
      <tr align="center">
        <td colspan="2"><input type="submit" name="login" value="Login"></td>
      </tr>
      <tr align="right">
        <td colspan="2"><a href="customer_register.php">New User? Register Here</a></td>
      </tr>
    </table>
  </form>

</div>
<?php
if(isset($_POST['login'])){
  $ip = getIp();
  $c_email = mysqli_real_escape_string($con,$_POST['email']);
  $c_pass = mysqli_real_escape_string($con,$_POST['pass']);
  $sel_c = "select * from customers where customer_email='$c_email' and customer_pass = '$c_pass'";
  $run_c = mysqli_query($con,$sel_c);
  $check_customer = mysqli_num_rows($run_c);
  if($check_customer == 0){
    echo "<script>alert('Password or email is incorrect!');</script>";
  }
  else{
    $sel_cart = "select * from cart where ip_add = '$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_cart==0){
      $_SESSION['customer_email']=$c_email;
      echo "<script>alert('You logged in successfully. Thanks!');</script>";
      echo "<script>window.open('customer/my_account.php','_self');</script>";
    }
    else{
      $_SESSION['customer_email']=$c_email;
      echo "<script>alert('You logged in successfully. Thanks!');</script>";
      echo "<script>window.open('checkout.php','_self');</script>";
    }
  }
}
?>
