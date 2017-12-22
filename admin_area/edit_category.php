<?php
include("includes/db.php");
if(isset($_GET['edit_cat'])){
  $cat_id = $_GET['edit_cat'];
  $get_cat = "select * from categories where cat_id = '$cat_id'";
  $run_cat = mysqli_query($con,$get_cat);
  $row_cat = mysqli_fetch_assoc($run_cat);
  $cat_title = $row_cat['cat_title'];
}
?>
<form action="" method="post" style="padding:40px;">
  <b>Edit Category</b>
  <input type="text" name="cat" value="<?php echo $cat_title; ?>" required>
  <input type="submit" name="edit_cat">
</form>
<?php
if(isset($_POST['edit_cat'])){
  echo $cat_title = $_POST['cat'];
  $update_category = "update categories set cat_title = '$cat_title' where cat_id = '$cat_id'";

  $update_cat = mysqli_query($con, $update_category);

  if($update_cat){
    echo "<script>alert('Category has been updated');</script>";
    echo "<script>window.open('index.php?view_categories','_self');</script>";
  }
}
?>
