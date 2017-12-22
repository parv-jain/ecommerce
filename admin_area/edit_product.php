<?php
include("includes/db.php");
if(isset($_GET['edit_pro'])){
  $pro_id = $_GET['edit_pro'];
  $get_pro = "select * from products where product_id = '$pro_id'";
  $run_pro = mysqli_query($con,$get_pro);
  $row_pro = mysqli_fetch_assoc($run_pro);
  $pro_id = $row_pro['product_id'];
  $pro_title = $row_pro['product_title'];
  $pro_price = $row_pro['product_price'];
  $pro_image = $row_pro['product_image'];
  $pro_cat = $row_pro['product_cat'];
  $pro_brand = $row_pro['product_brand'];
  $pro_desc = $row_pro['product_desc'];
  $pro_keywords = $row_pro['product_keywords'];
}
?>
<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="600" border="2" bgcolor="#3973ac" style="margin:auto">
    <tr align="center">
      <td colspan="2"><h2>Edit Product Here</h2></td>
    </tr>
    <tr>
      <td align="right"><b>Product Title:</b></td>
      <td><input type="text" name="product_title" value="<?php echo $pro_title; ?>" required></td>
    </tr>
    <tr>
      <td align="right"><b>Product Category:</b></td>
      <td>
        <select name="product_cat" required>
          <?php
            $get_cat = "select * from categories where cat_id = '$pro_cat'";
            $run_cat = mysqli_query($con, $get_cat);
            $row_cat = mysqli_fetch_assoc($run_cat);
          ?>
          <option value="<?php echo $pro_cat; ?>"><?php echo $row_cat['cat_title']; ?></option>
          <?php
          $get_cats = "select * from categories";
          $run_cats = mysqli_query($con, $get_cats);
          while($row_cats = mysqli_fetch_assoc($run_cats)){
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];
            echo "<option value='$cat_id'>$cat_title</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right"><b>Product Brand</b></td>
      <td>
        <select name="product_brand" required>
          <?php
            $get_brand = "select * from brands where brand_id = '$pro_brand'";
            $run_brand = mysqli_query($con, $get_brand);
            $row_brand = mysqli_fetch_assoc($run_brand);
          ?>
          <option value="<?php echo $pro_brand; ?>"><?php echo $row_brand['brand_title']; ?></option>
          <?php
          $get_brands = "select * from brands";
          $run_brands = mysqli_query($con, $get_brands);
          while($row_brands = mysqli_fetch_assoc($run_brands)){
            $brand_id = $row_brands['brand_id'];
            $brand_title = $row_brands['brand_title'];
            echo "<option value='$brand_id'>$brand_title</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right"><b>Product Image</b></td>
      <td><input type="file" name="product_image"><img src='product_images/<?php echo $pro_image; ?>' height='50' width='40px'></td>
    </tr>
    <tr>
      <td align="right"><b>Product Price:</b></td>
      <td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"required></td>
    </tr>
    <tr>
      <td align="right"><b>Product Description:</b></td>
      <td><textarea name="product_desc" cols="40" rows="5"><?php echo $pro_desc; ?></textarea>
    </tr>
    <tr>
      <td align="right"><b>Product Keywords:</b></td>
      <td><input type="text" name="product_keywords" value="<?php echo $pro_keywords; ?>" required></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" name="edit_post" value="Edit Now"></td>
    </tr>

  </table>
</form>
<?php
if(isset($_POST['edit_post'])){
  $product_title = $_POST['product_title'];
  $product_cat = $_POST['product_cat'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  $product_keywords = $_POST['product_keywords'];

  if(!empty($_FILES['product_image']['name'])){
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
    $update_product = "update products set product_cat = '$product_cat', product_brand = '$product_brand', product_title = '$product_title', product_price = '$product_price', product_desc = '$product_desc', product_image = '$product_image', product_keywords = '$product_keywords' where product_id = '$pro_id'";
  }
  else{
    $update_product = "update products set product_cat = '$product_cat', product_brand = '$product_brand', product_title = '$product_title', product_price = '$product_price', product_desc = '$product_desc', product_keywords = '$product_keywords' where product_id = '$pro_id'";  
  }

  $update_pro = mysqli_query($con, $update_product);

  if($update_pro){
    echo "<script>alert('Product has been updated');</script>";
    echo "<script>window.open('index.php?view_products','_self');</script>";
  }
}
?>
