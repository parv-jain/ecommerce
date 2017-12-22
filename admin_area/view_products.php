<table align="center" width="600" bgcolor="#3973ac" style="margin:auto">
  <tr align="center">
    <td colspan="5"><h2>View All Products</h2></td>
  </tr>
  <tr align="center">
    <th>Title</th>
    <th>Image</th>
    <th>Price</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_pro = "select * from products";
    $run_pro = mysqli_query($con,$get_pro);
    while($row_pro = mysqli_fetch_assoc($run_pro)){
      $pro_id = $row_pro['product_id'];
      $pro_title = $row_pro['product_title'];
      $pro_price = $row_pro['product_price'];
      $pro_image = $row_pro['product_image'];
      echo "<tr align='center'>
        <td>$pro_title</td>
        <td><img src='product_images/$pro_image' height='50' width='40px'></td>
        <td>$pro_price</td>
        <td><a href='index.php?edit_pro=$pro_id'>Edit</a></td>
        <td><a href='index.php?delete_pro=$pro_id'>Delete</a></td>
      </tr>";
    }
  ?>
</table>
