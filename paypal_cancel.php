<?php session_start(); ?>
<html>
  <head>
    <title>Payment Cancel</title>
  </head>
  <body>
    <h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
    <h3>Your Payment was cancelled, go back to our shop and try again.</h3>
    <a href="cart.php">Go back</a>

  </body>
</html>
