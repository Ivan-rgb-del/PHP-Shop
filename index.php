<?php

  require_once('./includes/header.php');
  require_once('./app/classes/Product.php');

  $products = new Product();
  $products = $products->fetchAll();

?>

<link rel="stylesheet" href="index.css">
<div class="grid">
  <?php foreach($products as $product) : ?>
    <div class="kutija">
      <div class="kartica">
        <img src="public/product_images/<?= $product['image'] ?>" class="img" alt="<?= $product['name'] ?>">

        <div class="info">
          <h5> <?= $product['name'] ?> </h5>
          <p class="size"> <?= $product['size'] ?> </p>
          <p class="price"> $ <?= $product['price'] ?> </p>
          <a href="product.php?product_id=<?= $product['product_id'] ?>" class="btn">View Product</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once('./includes/footer.php'); ?>