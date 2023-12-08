<?php

  require_once('./includes/header.php');
  require_once('./app/classes/Cart.php');

  if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
  }

  $cart = new Cart();
  $cart_items = $cart->get_cart_items();

?>

<link rel="stylesheet" href="cart.css">
<div class="cart">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($cart_items as $item) : ?>
        <tr>
          <td><?php echo $item['name']; ?></td>
          <td><?php echo $item['size']; ?></td>
          <td>$ <?php echo $item['price']; ?></td>
          <td><?php echo $item['quantity']; ?></td>
          <td>
            <img
              src="./public/product_images/<?php echo $item['image']; ?>"
              height="50">
          </td>
          <td>
            <a href="delete_cart_product.php?id=<?php echo $item['product_id']; ?>" class="cart-btn">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<a href="checkout.php" class="cart-btn">Checkout</a>

<?php require_once('./includes/footer.php'); ?>