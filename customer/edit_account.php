<?php
  $user = $_SESSION['customer_email'];
  $get_cust = "select * from customers where customer_email = '$user'";
  $run_cust = mysqli_query($con, $get_cust);
  $row_cust = mysqli_fetch_assoc($run_cust);
  $id = $row_cust['customer_id'];
  $name = $row_cust['customer_name'];
  $email = $row_cust['customer_email'];
  $pass = $row_cust['customer_pass'];
  $image = $row_cust['customer_image'];
  $country = $row_cust['customer_country'];
  $city = $row_cust['customer_city'];
  $contact = $row_cust['customer_contact'];
  $address = $row_cust['customer_address'];
?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="c_id" value="<?php echo $id; ?>">
  <table align="center" width="750">
    <tr>
      <td align="center" colspan="2"><h2>Update your Account</h2></td>
    </tr>
    <tr>
      <td align="right"><b>Customer Name:</b></td>
      <td><input type="text" name="c_name" value="<?php echo $name; ?>" required></td>
    </tr>
    <tr>
      <td align="right"><b>Customer Email:</b></td>
      <td><input type="email" name="c_email" value="<?php echo $email; ?>" required></td>
    </tr>
    <tr>
      <td align="right"><b>Customer Password:</b></td>
      <td><input type="password" name="c_pass" value="<?php echo $pass; ?>" required></td>
    </tr>
    <tr>
      <td align="right"><b>Customer Image:</b></td>
      <td>
        <input type="file" name="c_image" value="<?php echo $image; ?>">
        <img src="customer_images/<?php echo $image; ?>" width="50" height="50">
      </td>
    </tr>
    <tr>
      <td align="right"><b>Customer Country:</b></td>
      <td>
        <select name="c_country" disabled required>
          <option><?php echo $country; ?></option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right"><b>Customer City:</b></td>
      <td><input type="text" name="c_city" value="<?php echo $city; ?>" required></td>
    </tr>
    <tr>
      <td align="right"><b>Customer Contact:</b></td>
      <td><input type="text" name="c_contact" value="<?php echo $contact; ?>" required></td>
    </tr>
    <tr>
      <td align="right"><b>Customer Address:</b></td>
      <td><input type="text" name="c_address" value="<?php echo $address; ?>" required></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="update" value="Update Account"></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['update'])){
  $ip = getIp();
  $c_id = $_POST['c_id'];
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];


  if(!empty($_FILES['c_image']['name'])){
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    move_uploaded_file($c_image_tmp,"customer_images/$c_image");
    $update_c = "update customers set customer_ip = '$ip', customer_name = '$c_name', customer_email = '$c_email', customer_pass = '$c_pass', customer_city = '$c_city', customer_contact = '$c_contact', customer_address = '$c_address', customer_image = '$c_image' where customer_id = '$c_id'";
  }
  else{
    $update_c = "update customers set customer_ip = '$ip', customer_name = '$c_name', customer_email = '$c_email', customer_pass = '$c_pass', customer_city = '$c_city', customer_contact = '$c_contact', customer_address = '$c_address' where customer_id = '$c_id'";
  }
  $run_update_c = mysqli_query($con,$update_c);
  if(run_update_c){
    echo "<script>alert('Your account Updated');</script>";
    echo "<script>window.open('my_account.php','_self');</script>";
  }
}
?>
