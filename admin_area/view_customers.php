<table align="center" width="795" bgcolor="pink" style="margin:auto">
  <tr align="center">
    <td colspan="8"><h2>View All Customers</h2></td>
  </tr>
  <tr align="center">
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Country</th>
    <th>City</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Delete</th>
  </tr>
  <?php
    include("includes/db.php");
    $get_c = "select * from customers";
    $run_c = mysqli_query($con,$get_c);
    while($row_c = mysqli_fetch_assoc($run_c)){
      $c_id = $row_c['customer_id'];
      $c_name = $row_c['customer_name'];
      $c_email = $row_c['customer_email'];
      $c_image = $row_c['customer_image'];
      $c_country = $row_c['customer_country'];
      $c_city = $row_c['customer_city'];
      $c_contact = $row_c['customer_contact'];
      $c_address = $row_c['customer_address'];
      echo "<tr align='center'>
        <td>$c_name</td>
        <td>$c_email</td>
        <td><img src='../customer/customer_images/$c_image' height='50' width='40px'></td>
        <td>$c_country</td>
        <td>$c_city</td>
        <td>$c_contact</td>
        <td>$c_address</td>
        <td><a href='index.php?delete_cust=$c_id'>Delete</a></td>
      </tr>";
    }
  ?>
</table>
