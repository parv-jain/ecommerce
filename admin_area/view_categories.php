<table align="center" width="600" bgcolor="#3973ac" style="margin:auto">
  <tr align="center">
    <td colspan="3"><h2>View All Categories</h2></td>
  </tr>
  <tr align="center">
    <th>Category</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_cat = "select * from categories";
    $run_cat = mysqli_query($con,$get_cat);
    while($row_cat = mysqli_fetch_assoc($run_cat)){
      $cat_id = $row_cat['cat_id'];
      $cat_title = $row_cat['cat_title'];
      echo "<tr align='center'>
        <td>$cat_title</td>
        <td><a href='index.php?edit_cat=$cat_id'>Edit</a></td>
        <td><a href='index.php?delete_cat=$cat_id'>Delete</a></td>
      </tr>";
    }
  ?>
</table>
