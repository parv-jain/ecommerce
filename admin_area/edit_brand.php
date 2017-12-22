<?php
include("includes/db.php");
if(isset($_GET['edit_brand'])){
  $brand_id = $_GET['edit_brand'];
  $get_brand = "select * from brands where brand_id = '$brand_id'";
  $run_brand = mysqli_query($con,$get_brand);
  $row_brand = mysqli_fetch_assoc($run_brand);
  $brand_title = $row_brand['brand_title'];
}
?>
<form action="" method="post" style="padding:40px;">
  <b>Edit Brand</b>
  <input type="text" name="brand" value="<?php echo $brand_title; ?>" required>
  <input type="submit" name="edit_brand">
</form>
<?php
include("includes/db.php");
if(isset($_POST['edit_brand'])){
  $brand = $_POST['brand'];
  $update_brand = "update brands set brand_title = '$brand' where brand_id = '$brand_id'";
  $run_brand = mysqli_query($con, $update_brand);
  if($run_brand){
    echo "<script>alert('Brand has been updated');</script>";
    echo "<script>window.open('index.php?view_brands','_self');</script>";
  }
}
?>
