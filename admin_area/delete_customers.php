<?php
include("includes/db.php");
if(isset($_GET['delete_cust'])){
  $c_id = $_GET['delete_cust'];

  echo $delete_cust = "delete from customers where customer_id = '$c_id'";
  $run_del_cust = mysqli_query($con,$delete_cust);
  if($run_del_cust){
    echo "<script>alert('Customer has been deleted');</script>";
    echo "<script>window.open('index.php?view_customers','_self');</script>";
  }
}
?>
