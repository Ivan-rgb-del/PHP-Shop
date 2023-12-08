<?php

  require_once('../app/config/config.php');
  require_once('../app/classes/User.php');
  require_once('../app/classes/Product.php');

  $user = new User();

  if ($user->isLoggedIn() && $user->isAdmin()) :
    $product_obj = new Product();
    $product = $product_obj->readProduct($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product_id = $_GET['id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $size = $_POST['size'];
      $image = $_POST['image'];

      $product_obj->updateProduct($product_id, $name, $price, $size, $image);

      header("Location: edit_product.php?id=".$product_id);
    }
  endif;

?>

<link rel="stylesheet" href="edit.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<div class="container">
  <?php
    require_once('admin_header.php');
  ?>

  <div class="edit_product">
    <form action="" method="POST" class="edit_product-form">
      <input type="text" name="name" value="<?php echo $product['name']; ?>">
      <input type="text" name="price" value="<?php echo $product['price']; ?>">
      <input type="text" name="size" value="<?php echo $product['size']; ?>">
      <input type="text" name="image" value="<?php echo $product['image']; ?>">

      <input type="submit" value="Update Product" class="edit-btn">
    </form>
  </div>
</div>