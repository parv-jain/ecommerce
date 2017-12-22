<form action="" method="post" style="padding:40px;">
  <b>Insert New Category</b>
  <input type="text" name="cat" required>
  <input type="submit" name="insert_cat">
</form>
<?php
include("includes/db.php");
if(isset($_POST['insert_cat'])){
  $cat = $_POST['cat'];
  $insert_cat = "insert into categories (cat_title) values ('$cat')";
  $run_cat = mysqli_query($con, $insert_cat);
  if($run_cat){
    echo "<script>alert('New category inserted');</script>";
    echo "<script>window.open('index.php?view_categories','_self');</script>";
  }
}
?>
