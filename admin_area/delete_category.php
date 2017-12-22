<?php
include("includes/db.php");
if(isset($_GET['delete_cat'])){
  $cat_id = $_GET['delete_cat'];

  $delete_cat = "delete from categories where cat_id = '$cat_id'";
  $run_del_cat = mysqli_query($con,$delete_cat);
  if($run_del_cat){
    echo "<script>alert('Category has been deleted');</script>";
    echo "<script>window.open('index.php?view_categories','_self');</script>";
  }
}
?>
