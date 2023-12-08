<?php

  require_once('./includes/header.php');
  require_once('./app/classes/Cart.php');
  require_once('./app/classes/Order.php');

  if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $delivery_address = $_POST['country'] . ", " . $_POST['city'] . ", " . $_POST['zip'] . ", " . $_POST['address'];

    $order = new Order();
    $order = $order->createOrder($delivery_address);

    $_SESSION['message']['type'] = "success"; // danger ili success
    $_SESSION['message']['text'] = "Uspesno narucene majice!"; // danger ili success
    header("location: orders.php");
    exit();
  }

?>

<link rel="stylesheet" href="checkout.css">
<div class="checkout">
  <form action="" method="POST" class="checkout-form">
    <div class="form-group mb-3">
      <label for="country">Drzava</label>
      <input type="text" class="form-control" id="country" name="country" required>
    </div>
    <div class="form-group mb-3">
      <label for="city">Grad</label>
      <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="form-group mb-3">
      <label for="zip">Postanski broj</label>
      <input type="text" class="form-control" id="zip" name="zip" required>
    </div>
    <div class="form-group mb-3">
      <label for="address">Adresa</label>
      <input type="text" class="form-control" id="address" name="address" required>
    </div>
  
    <button type="submit" class="checkout-btn">Order</button>
  </form>
</div>

<?php require_once('./includes/footer.php'); ?>