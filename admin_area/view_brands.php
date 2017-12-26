<table align="center" width="795" bgcolor="pink" style="margin:auto">
  <tr align="center">
    <td colspan="3"><h2>View All Brands</h2></td>
  </tr>
  <tr align="center">
    <th>Brand</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_brand = "select * from brands";
    $run_brand = mysqli_query($con,$get_brand);
    while($row_brand = mysqli_fetch_assoc($run_brand)){
      $brand_id = $row_brand['brand_id'];
      $brand_title = $row_brand['brand_title'];
      echo "<tr align='center'>
        <td>$brand_title</td>
        <td><a href='index.php?edit_brand=$brand_id'>Edit</a></td>
        <td><a href='index.php?delete_brand=$brand_id'>Delete</a></td>
      </tr>";
    }
  ?>
</table>
