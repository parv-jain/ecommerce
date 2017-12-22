<form action="" method="post" style="padding:40px;">
  <b>Insert New Brand</b>
  <input type="text" name="brand" required>
  <input type="submit" name="insert_brand">
</form>
<?php
include("includes/db.php");
if(isset($_POST['insert_brand'])){
  $brand = $_POST['brand'];
  $insert_brand = "insert into brands (brand_title) values ('$brand')";
  $run_brand = mysqli_query($con, $insert_brand);
  if($run_brand){
    echo "<script>alert('New brand inserted');</script>";
    echo "<script>window.open('index.php?view_brands','_self');</script>";
  }
}
?>
