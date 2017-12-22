<?php
include("includes/db.php");
if(isset($_GET['delete_pro'])){
  $pro_id = $_GET['delete_pro'];

  echo $delete_pro = "delete from products where product_id = '$pro_id'";
  $run_del_pro = mysqli_query($con,$delete_pro);
  if($run_del_pro){
    echo "<script>alert('Product has been deleted');</script>";
    echo "<script>window.open('index.php?view_products','_self');</script>";
  }
}
?>
