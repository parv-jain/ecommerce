<br><br>
<h2 style="text-align:center">Do you really want to DELETE your account?</h2>
<form action="" method="post">
  <br><br>
  <input type="submit" name="yes" value="Yes I want">
  <input type="submit" name="no" value="No I was Joking">
</form>
<?php
  $user = $_SESSION['customer_email'];
  if(isset($_POST['yes'])){
    $delete_customer = "delete from customers where customer_email = '$user'";
    $run_delete_customer = mysqli_query($con,$delete_customer);
    echo "<script>alert('Your account is deleted!');</script>";
    header('location:../logout.php');
  }
  if(isset($_POST['no'])){
    echo "<script>alert('Oh! Do not joke again!');</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
  }
?>
