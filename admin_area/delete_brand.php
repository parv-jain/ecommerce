<?php
include("includes/db.php");
if(isset($_GET['delete_brand'])){
  $brand_id = $_GET['delete_brand'];

  $delete_brand = "delete from brands where brand_id = '$brand_id'";
  $run_del_brand = mysqli_query($con,$delete_brand);
  if($run_del_brand){
    echo "<script>alert('Brand has been deleted');</script>";
    echo "<script>window.open('index.php?view_brands','_self');</script>";
  }
}
?>
