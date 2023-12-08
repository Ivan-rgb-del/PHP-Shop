<?php

  require_once('./app/config/config.php');
  require_once('./app/classes/User.php');
  require_once('./app/classes/Cart.php');
  require_once('./app/classes/Product.php');

  $user = new User();

  if ($user->isLoggedIn()) :
    $product = new Product();
    $cart = new Cart();

    $product_id = $_GET['id'];

    $cart->deleteItemFromCart($product_id);
    header("Location: cart.php");
  endif;

?>