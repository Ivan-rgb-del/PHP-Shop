<?php

  require_once('./includes/header.php');
  require_once('./app/classes/Product.php');
  require_once('./app/classes/Cart.php');

  $product = new Product();
  $product = $product->readProduct($_GET['product_id']);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $product['product_id'];
    $user_id = $_SESSION['user_id'];
    $quantity = $_POST['quantity'];

    $cart = new Cart();  
    $cart->addToCart($user_id, $product_id, $quantity);

    $_SESSION['message']['type'] = "success"; // danger ili success
    $_SESSION['message']['text'] = "Majica je dodata u vasu korpu!"; // danger ili success

    header("Location: cart.php");
    exit();
  }

?>

<link rel="stylesheet" href="product.css">
<div class="item-card">
  <div class="item-img">
    <img
      src="./public/product_images/<?= $product['image']; ?>"
      alt="<?= $product['name'] ?>">
  </div>

  <div class="info">
    <h2><?= $product['name']; ?></h2>
    <p>Size: <?= $product['size']; ?></p>
    <p>Price: <?= $product['price']; ?></p>
    <form action="" method="POST">
      <input type="number" name="quantity">
      <button class="add-cart-btn" type="submit">Add to Cart</button>
    </form>
  </div>
</div>

<?php require_once('./includes/footer.php');